<?php
namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use ApiPlatform\Core\Metadata\Resource\Factory\ResourceMetadataFactoryInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class ItemDataPersister implements ContextAwareDataPersisterInterface
{
    public function __construct(ResourceMetadataFactoryInterface $resourceMetadataFactory, MessageBusInterface $messageBus)
    {
        $this->resourceMetadataFactory = $resourceMetadataFactory;
        $this->messageBus = $messageBus;
    }

    public function supports($data, array $context = []): bool
    {
        $resourceClass = $context['resource_class'];
        $command = $context['item_operation_name'];
//        $resourceCommandClass = $this->findCommandClassForApiResource($resourceClass, $command);
//        $resourceQueryClass = $this->findQueryClassForApiResource($resourceClass);
        error_log(print_r($data, 1));
        error_log(print_r($context, 1));
//        if (!is_a($resourceQueryClass, ItemQuery::class, true)) {
//            return false;
//        }
//        if (!class_exists($resourceQueryClass)) {
//            return false;
//        }
        return true;
    }

    public function persist($data, array $context = [])
    {
        error_log(__METHOD__);
        error_log(print_r($data, 1));
        error_log(print_r($context, 1));
        //$data->setId(1123);
        return $data;
    }

    public function remove($data, array $context = [])
    {
        // TODO: Implement remove() method.
    }

    private function findCommandClassForApiResource($resourceClass, $data, $command)
    {
        $commandDir = 'Command';
        $commandSuffix = ucfirst($command);
        $reflection = new \ReflectionClass($resourceClass);
        $resourceCommandClass = sprintf("%s\%s\%s%s", $reflection->getNamespaceName(), $commandDir, $reflection->getShortName(), $commandSuffix);
        return $resourceCommandClass;
    }
}
