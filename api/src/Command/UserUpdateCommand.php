<?php

namespace App\Command;

use App\Dto\UserUpdateDto;
use App\Entity\User;

class UserUpdateCommand implements Command
{
    /** @var User  */
    private $user;
    /** @var UserUpdateDto  */
    private $dto;

    final public function __construct(User $user, UserUpdateDto $dto)
    {
        $this->user = $user;
        $this->dto = $dto;
    }

    public function getEntity(): User
    {
        return $this->user;
    }

    public function getApiResource(): UserUpdateDto
    {
        return $this->dto;
    }
}
