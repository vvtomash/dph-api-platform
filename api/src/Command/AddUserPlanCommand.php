<?php
namespace App\Command;

use App\Dto\PlanCreateDto;
use App\Entity\User;

class AddUserPlanCommand implements Command
{
    private $user;
    private $planCreateDto;


    public function __construct(User $user, PlanCreateDto $planCreateDto)
    {
        $this->user = $user;
        $this->planCreateDto = $planCreateDto;
    }

    public function getEntity(): User
    {
        return $this->user;
    }

    public function getApiResource(): PlanCreateDto
    {
        return $this->planCreateDto;
    }
}
