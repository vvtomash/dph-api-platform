<?php
namespace App\MessageHandler\QueryHandler;

use App\Entity\Setting;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class SettingQueryHandler implements MessageHandlerInterface
{
    public function __invoke(Setting $setting)
    {
        error_log(__METHOD__);
        // TODO: Implement __invoke() method.
        return $setting;
    }
}
