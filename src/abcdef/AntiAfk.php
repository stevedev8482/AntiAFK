<?php

declare(strict_types=1);

namespace abcdef;

use abcdef\entity\EntityRegistry;
use abcdef\handler\EventHandler;
use abcdef\service\UserService;
use abcdef\task\PlayerAfkTask;
use pocketmine\plugin\PluginBase;

final class AntiAfk extends PluginBase
{

    private UserService $service;
    public function onLoad(): void
    {
        $this->service = new UserService();
    }

    public function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents(new EventHandler($this->getService()), $this);
        $this->getScheduler()->scheduleRepeatingTask(new PlayerAfkTask($this->getService()), 20);
    }

    public function getService(): UserService
    {
        return $this->service;
    }
}