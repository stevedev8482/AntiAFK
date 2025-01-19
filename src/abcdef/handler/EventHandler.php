<?php

declare(strict_types=1);

namespace abcdef\handler;

use abcdef\dto\CreateUserDTO;
use abcdef\entity\EntityRegistry;
use abcdef\entity\UserEntity;
use abcdef\service\UserService;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;

class EventHandler implements Listener
{
    private EntityRegistry $playerRegistry;

    public function __construct(private readonly UserService $service)
    {
        $this->playerRegistry = $this->service->getEntityRegistry();
    }

    public function onPlayerMove(PlayerMoveEvent $event): void
    {
        $player = $event->getPlayer();
        $playerName = $player->getName();

        $userEntity = $this->playerRegistry->getPlayer($playerName);
        if ($userEntity === null) {
            $dto = $this->service->createUserDTO(new CreateUserDTO($playerName, time()));
            $userEntity = new UserEntity($dto);
            $this->playerRegistry->addPlayer($userEntity, $playerName);
        }

        $userEntity->getData()->setLastPlayerActionTime(time());
    }
}