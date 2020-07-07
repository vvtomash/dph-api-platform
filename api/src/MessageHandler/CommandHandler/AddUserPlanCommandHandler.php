<?php
namespace App\MessageHandler\CommandHandler;

use App\Command\AddUserPlanCommand;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class AddUserPlanCommandHandler implements MessageHandlerInterface
{
    /** @var ManagerRegistry  */
    private $managerRegistry;

    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
    }

    public function __invoke(AddUserPlanCommand $command)
    {
        error_log(__METHOD__);
        $user = $command->getEntity();
        error_log(\json_encode($user));

        error_log(print_r($command->getApiResource(), 1));
        $userManager = $this->managerRegistry->getManagerForClass(User::class);
    }
}
