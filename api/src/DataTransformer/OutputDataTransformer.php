<?php
namespace App\DataTransformer;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;

class OutputDataTransformer implements DataTransformerInterface
{
    public function transform($object, string $to, array $context = [])
    {
        error_log(__METHOD__);
        error_log(print_r($object, 1));
        error_log(print_r($to, 1));
        error_log(print_r($context, 1));
        return $object;
    }

    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        error_log(__METHOD__);
        error_log(print_r($data, 1));
        error_log(print_r($context, 1));
        $resourceClass = $context['resource_class'];
        $outputClass = $context['output']['class'] ?? null;
        return $outputClass === $to && $data instanceof $resourceClass;
    }
}
