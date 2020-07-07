<?php
namespace App\CommandFactory;

use App\Command\AddUserPlanCommand;
use App\Command\UserUpdateCommand;
use App\Entity\User;

class UserCommandFactory implements CommandFactory
{
    public function createCommand($apiRecourse)
    {

    }

    public function updateCommand($user, $userRecourse)
    {
        return new UserUpdateCommand($user, $userRecourse);
    }

    public function deleteCommand($user)
    {
        // TODO: Implement deleteCommand() method.
    }

    public function instanceCommand($apiResourceOperation, $input, ?User $user = null)
    {
        switch ($apiResourceOperation) {
            case "addPlan":
                return new AddUserPlanCommand($user, $input);
                break;
            case "update":
                return new UserUpdateCommand($user, $input);
        }
    }
}
