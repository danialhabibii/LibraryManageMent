<?php

namespace App\Http\Controllers;

use App\Action\User\CreateUserAction;
use App\Action\User\LoginUserAction;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\LoginUserRequest;
use App\Http\Resources\User\UserTokenResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(CreateUserRequest $request, CreateUserAction $createUserAction)
    {
        $createUserAction->execute($request->validated());
        return $this->created();
    }

    public function login(LoginUserRequest $request, LoginUserAction $loginUserAction)
    {
        $token = $loginUserAction->execute($request->validated());
        return UserTokenResource::make($token);
    }
}
