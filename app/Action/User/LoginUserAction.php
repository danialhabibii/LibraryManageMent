<?php

namespace App\Action\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginUserAction
{
    public function execute(array $data): string
    {
        $user = User::firstWhere('email', $data['email']);
        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json(['message' => 'Unauthorized']);
        }

        return $user->createToken(request()->header('User-Agent', 'Unknown User Agent'))->plainTextToken;
    }
}
