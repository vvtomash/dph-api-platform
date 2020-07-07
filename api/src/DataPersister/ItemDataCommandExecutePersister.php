<?php
namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Command\Command;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

class ItemDataCommandExecutePersister implements ContextAwareDataPersisterInterface
{
    /** @var MessageBusInterface  */
    private $commandBus;

    public function __construct(MessageBusInterface $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function supports($data, array $context = []): bool
    {
        return $data instanceof Command;
    }

    public function persist($data, array $context = [])
    {
        $envelope = $this->commandBus->dispatch($data);
        $handledStamp = $envelope->last(HandledStamp::class);
        if ($handledStamp instanceof HandledStamp) {
            return $handledStamp->getResult();
        }
        return $data->getEntity();
    }

    public function remove($data, array $context = [])
    {
        // TODO: Implement remove() method.
    }
}
