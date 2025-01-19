<?php

declare(strict_types=1);

namespace abcdef\dto;

class CreateUserDTO
{

    public function __construct(
        private readonly string $username,
        private readonly int $lastPlayerActionTime
    ){}

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getLastPlayerActionTime(): int
    {
        return $this->lastPlayerActionTime;
    }
}