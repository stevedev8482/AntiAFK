<?php

declare(strict_types=1);

namespace abcdef\entity;

class EntityRegistry
{
    private array $entityMap = [];

    public function addPlayer(UserEntity $userEntity, string $playerName): void
    {
        $this->entityMap[$playerName] = $userEntity;
    }

    public function getPlayer(string $playerName): ?UserEntity
    {
        return $this->entityMap[$playerName] ?? null;
    }

    public function removePlayer(string $playerName): void
    {
        unset($this->entityMap[$playerName]);
    }
}