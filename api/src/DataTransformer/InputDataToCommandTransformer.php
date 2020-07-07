<?php
namespace App\DataTransformer;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\CommandFactory\CommandFactory;
use http\Exception\RuntimeException;
use Psr\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\ServiceLocator;

class InputDataToCommandTransformer implements DataTransformerInterface
{
    /** @var ContainerInterface  */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function transform($object, string $to, array $context = [])
    {
        error_log(__METHOD__);
        error_log(print_r($object, 1));
        error_log(print_r($to, 1));
        error_log(print_r($context, 1));
        $entity = $context['object_to_populate'];
        $resourceClass = $context['resource_class'];
        $commandFactory = $this->findCommandFactory($resourceClass);
        $operationName = $context['item_operation_name'];

        $command = $commandFactory->instanceCommand($operationName, $object, $entity);
        if (!$command) {
            throw new \ErrorException("$operationName for $resourceClass is not supported");
        }
        return $command;
    }

    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        $resourceClass = $context['resource_class'];
        if ($data instanceof $resourceClass) {
            return false;
        }
        $commandFactory = $this->findCommandFactory($resourceClass);
        return $commandFactory !== null;
    }

    private function findCommandFactory($resourceClass): ?CommandFactory
    {
        $resourceClass = new \ReflectionClass($resourceClass);
        $commandFactoryClass = sprintf('App\CommandFactory\%sCommandFactory', $resourceClass->getShortName());
        if ($this->container->has($commandFactoryClass)) {
            $commandFactory = $this->container->get($commandFactoryClass);
            if ($commandFactory instanceof CommandFactory) {
                return $commandFactory;
            }
        } elseif (class_exists($commandFactoryClass)) {
            return new $commandFactoryClass;
        }
        return null;
    }
}
