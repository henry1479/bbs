<?php

namespace App\Services\MessagesServices\Contracts;

use App\Models\User;

interface MessagesService {
    public function getUser(int $userId);

    public function getMessages(int $userId);

    public function getAllInputMessages(int $userId);
}