<?php
namespace App\DataTransformer;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;

class InputDataToCommandTransformer implements DataTransformerInterface
{
    public function transform($object, string $to, array $context = [])
    {
        error_log($context);
        $entity = $context['object_to_populate'];
        return $entity;
    }

    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        $resourceClass = $context['resource_class'];
        if ($data instanceof $resourceClass) {
            return false;
        }

        return $resourceClass === $to && null !== ($context['input']['class'] ?? null);
    }
}
