<?php
namespace App\DataProvider;

use ApiPlatform\Core\Bridge\Symfony\Validator\Exception\ValidationException;
use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Query\ItemQuery;
use Symfony\Component\Messenger\Exception\ValidationFailedException;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

class ItemDataProvider implements ItemDataProviderInterface, RestrictedDataProviderInterface
{
    /** @var MessageBusInterface  */
    private $queryBus;

    public function __construct(MessageBusInterface $queryBus)
    {
        $this->queryBus = $queryBus;
    }

    public function getItem(string $resourceClass, $id, string $operationName = null, array $context = [])
    {
        $resourceQueryClass = $this->findQueryClassForApiResource($resourceClass);
        try {
            $envelope = $this->queryBus->dispatch(new $resourceQueryClass($id));
        } catch (ValidationFailedException $e) {
            throw new ValidationException($e->getViolations());
        }
        $handledStamp = $envelope->last(HandledStamp::class);
        return $handledStamp->getResult();

    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        $resourceQueryClass = $this->findQueryClassForApiResource($resourceClass);
        if (!is_a($resourceQueryClass, ItemQuery::class, true)) {
            return false;
        }
        if (!class_exists($resourceQueryClass)) {
            return false;
        }
        return true;
    }

    private function findQueryClassForApiResource($resourceClass)
    {
        $queryNamespace = 'App\Query';
        $querySuffix = 'Query';
        $reflection = new \ReflectionClass($resourceClass);
        $resourceQueryClass = sprintf("%s\%s%s", $queryNamespace, $reflection->getShortName(), $querySuffix);
        return $resourceQueryClass;
    }
}
