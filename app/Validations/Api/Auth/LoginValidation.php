<?php

namespace App\Validations\Api\Auth;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

class LoginValidation
{
    /**
     * Index validation.
     *
     * @param  $request
     * @return  ArrayObject
     */
    public function index($request)
    {
        $result = [];
        $result['status'] = false;

        // Check required parameter is exist
        $validate = [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ];

        $message = [
            'email.required' => 'Email tidak boleh kosong !',
            'email.email' => 'Email tidak valid !',
            'email.exists' => 'Email tidak ditemukan !',
            'password.required' => 'Password tidak boleh kosong !',
        ];

        $request->validate($validate, $message);

        $user = User::firstWhere('email', $request->email);

        // Check password is correct
        if (!Hash::check($request->password, $user->password)) {
            $result['message'] = 'Password salah !';
            $result = (object) $result;

            return $result;
        }

        // Validation success
        $result['status'] = true;
        $result['message'] = 'Validasi berhasil !';
        $result = (object) $result;

        return $result;
    }
}
