<?php

declare(strict_types=1);

namespace abcdef\task;

use abcdef\service\UserService;
use pocketmine\scheduler\ClosureTask;
use pocketmine\Server;

class PlayerAfkTask extends ClosureTask
{

    public function __construct(UserService $service)
    {
        parent::__construct(function () use ($service) {
            foreach (Server::getInstance()->getOnlinePlayers() as $player)
            {
                $registry = $service->getEntityRegistry();
                $userEntity = $registry->getPlayer($player->getName());
                if ($userEntity === null) {
                    return;
                }

                $lastTime = $userEntity->getData()->getLastPlayerActionTime();
                if ($lastTime + 30 <= time()) {
                    $registry->removePlayer($player->getName());
                    $player->kick("You've been standing too long");
                    return;
                }
            }
        });
    }
}