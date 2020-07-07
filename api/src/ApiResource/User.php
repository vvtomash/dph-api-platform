<?php
namespace App\ApiResource;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     shortName="User",
 *     itemOperations={
 *          "get"={
 *               "method"="GET"
 *          },
 *          "update"={
 *               "method"="PUT",
 *               "input"=App\Dto\UserUpdateDto::class
 *          }
 *     },
 *     collectionOperations={
 *          "create"={
 *               "method"="POST",
 *               "input"=App\Dto\UserCreateDto::class
 *          }
 *     }
 * )
 */
class User
{
    /**
     * @ApiProperty(identifier=true)
     */
    public $id;

    /**
     * @var string
     * @Assert\NotBlank
     */

    public $email = '';

    /**
     * @var string
     * @Assert\NotBlank
     */
    public $name = '';

    /**
     * @ApiSubresource(
     *     maxDepth=1
     * )
     * @var Plan[]
     */
    public $plans;
}
