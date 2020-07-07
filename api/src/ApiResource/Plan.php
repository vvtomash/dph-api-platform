<?php
namespace App\ApiResource;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     shortName="User",
 *     itemOperations={
 *          "get"={
 *               "method"="GET",
 *               "output"=App\Dto\UserOutputDto::class,
 *          },
 *          "update"={
 *               "method"="PUT",
 *               "input"=App\Dto\UserUpdateDto::class,
 *               "output"=App\Dto\UserOutputDto::class,
 *          }
 *     },
 *     collectionOperations={
 *          "create"={
 *               "method"="POST",
 *               "input"=App\Dto\UserCreateDto::class,
 *               "output"=App\Dto\UserOutputDto::class
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
}
