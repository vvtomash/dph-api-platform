<?php
namespace App\MessageHandler\CommandHandler;

use App\Command\UserUpdateCommand;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class UserUpdateCommandHandler implements MessageHandlerInterface
{
    /** @var ManagerRegistry  */
    private $managerRegistry;

    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
    }

    public function __invoke(UserUpdateCommand $command): User
    {
        error_log(__METHOD__);
        $user = $command->getEntity();

        $userUpdateDto = $command->getApiResource();
        $user->setName($userUpdateDto->getName());

        error_log(print_r($user, 1));
        $userManager = $this->managerRegistry->getManagerForClass(User::class);
        $userManager->persist($user);
        $userManager->flush();
        error_log(__METHOD__);

        return $user;
    }
}
