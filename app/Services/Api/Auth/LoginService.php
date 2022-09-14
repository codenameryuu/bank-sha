<?php

namespace App\Services\Api\Auth;

use App\Models\User;

class LoginService
{
    /**
     * Index service.
     *
     * @param  $request
     * @return  ArrayObject
     */
    public function index($request)
    {
        $user = User::with(['wallet'])->firstWhere('email', $request->email);
        $token = $user->createToken('auth_token')->plainTextToken;
        $user->token = $token;

        $status = true;
        $message = 'Berhasil login !';

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'data' => $user,
        ];

        return $result;
    }

    /**
     * Logout service.
     *
     * @param  $request
     * @return  ArrayObject
     */
    public function logout($request)
    {
        $request->user()->currentAccessToken()->delete();

        $status = true;
        $message = 'Berhasil menghapus token !';

        $result = (object) [
            'status' => $status,
            'message' => $message,
        ];

        return $result;
    }
}
