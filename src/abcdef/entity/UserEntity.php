<?php

declare(strict_types=1);

namespace abcdef\entity;

use abcdef\dto\UserDTO;

class UserEntity
{
    public function __construct(
        private readonly UserDTO $data
    ){}

    public function getData(): UserDTO
    {
        return $this->data;
    }
}