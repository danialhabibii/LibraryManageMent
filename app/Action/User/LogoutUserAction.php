<?php

namespace App\Action\User;

use App\Models\User;

class LogoutUserAction
{
    public function execute(User $user): void
    {
        $user->currentAccessToken()->delete();
    }
}
