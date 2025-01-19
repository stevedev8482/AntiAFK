<?php

declare(strict_types=1);

namespace abcdef\dto;

class UserDTO
{

    public function __construct(
        private readonly string $username,
        private int             $lastPlayerActionTime
    ){}

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getLastPlayerActionTime(): int
    {
        return $this->lastPlayerActionTime;
    }

    public function setLastPlayerActionTime(int $lastPlayerActionTime): void
    {
        $this->lastPlayerActionTime = $lastPlayerActionTime;
    }
}