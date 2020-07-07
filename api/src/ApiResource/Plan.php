<?php
namespace App\ApiResource;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     shortName="Plan",
 *     itemOperations={},
 *     collectionOperations={
 *        "create"={
                "method"="POST",
 *              "input"=App\Dto\PlanCreateDto::class
 *         }
 *     }
 * )
 */
class Plan
{
    /**
     * @ApiProperty(identifier=true)
     */
    public $id;

    /**
     * @var string
     * @Assert\NotBlank
     */
    public $price;

    /**
     * @var string
     * @Assert\NotBlank
     */
    public $currency;

    /**
     * @var int
     * @Assert\NotBlank
     */
    public $period;

    /**
     * @var int
     * @Assert\NotBlank
     */
    public $buyPeriod;

    /**
     * @var User
     */
    public $user;
}
