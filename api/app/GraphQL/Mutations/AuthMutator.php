<?php

namespace App\GraphQL\Mutations;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class AuthMutator
{
    public function login($rootValue, array $args)
    {
        // email と password のみ抜き出す
        $credentials = Arr::only($args, ['email', 'password']);

        // 1回のみ認証（以降は Bearer トークンで認証）
        if(Auth::once($credentials)){
            // 認証成功でトークンを作成して返却
            $token = Auth::user()->createToken('');
            return $token->plainTextToken;
        }

        return null;
    }

    public function logout()
    {
        return Auth::user()->currentAccessToken()->delete();
    }
}
