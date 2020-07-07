<?php
namespace App\MessageHandler\QueryHandler;

use App\Query\UserQuery;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class UserQueryHandler implements MessageHandlerInterface
{
    /** @var ManagerRegistry  */
    private $managerRegistry;

    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
    }

    public function __invoke(UserQuery $query): User
    {
        error_log(__METHOD__);
        $repository = $this->managerRegistry->getRepository(User::class);
        $user = $repository->find($query->getId());
        return $user;
    }
}
