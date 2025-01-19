<?php

declare(strict_types=1);

namespace abcdef\service;

use abcdef\dto\CreateUserDTO;
use abcdef\dto\UserDTO;
use abcdef\entity\EntityRegistry;

class UserService {

    private EntityRegistry $entityRegistry;

    public function __construct()
    {
        $this->entityRegistry = new EntityRegistry();
    }

    public function createUserDTO(CreateUserDTO $dto): UserDTO
    {
        return new UserDTO($dto->getUsername(), $dto->getLastPlayerActionTime());
    }

    public function getEntityRegistry(): ?EntityRegistry
    {
        return $this->entityRegistry;
    }
}