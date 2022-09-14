<?php

namespace App\Validations\Api\Auth;

class RegisterValidation
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
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required'],
            'pin' => ['required', 'numeric', 'digits:6'],
            'identity_card_image' => ['required', 'image'],
        ];

        $message = [
            'name.required' => 'Nama tidak boleh kosong !',
            'email.required' => 'Email tidak boleh kosong !',
            'email.email' => 'Email tidak valid !',
            'email.unique' => 'Email sudah digunakan !',
            'password.required' => 'Password tidak boleh kosong !',
            'pin.required' => 'PIN tidak boleh kosong !',
            'pin.numeric' => 'PIN harus berformat angka !',
            'pin.digits' => 'PIN harus 6 digit !',
            'identity_card_image.required' => 'Foto KTP tidak boleh kosong !',
            'identity_card_image.image' => 'Format foto KTP tidak valid !',
        ];

        $request->validate($validate, $message);

        // Validation success
        $result['status'] = true;
        $result['message'] = 'Validasi berhasil !';
        $result = (object) $result;

        return $result;
    }

    /**
     * Check email validation.
     *
     * @param  $request
     * @return  ArrayObject
     */
    public function checkUsername($request)
    {
        $result = [];
        $result['status'] = false;

        // Check required parameter is exist
        $validate = [
            'username' => ['required'],
        ];

        $message = [
            'username.required' => 'Username tidak boleh kosong !',
        ];

        $request->validate($validate, $message);

        // Validation success
        $result['status'] = true;
        $result['message'] = 'Validasi berhasil !';
        $result = (object) $result;

        return $result;
    }

    /**
     * Check email validation.
     *
     * @param  $request
     * @return  ArrayObject
     */
    public function checkEmail($request)
    {
        $result = [];
        $result['status'] = false;

        // Check required parameter is exist
        $validate = [
            'email' => ['required', 'email'],
        ];

        $message = [
            'email.required' => 'Email tidak boleh kosong !',
            'email.email' => 'Email tidak valid !',
        ];

        $request->validate($validate, $message);

        // Validation success
        $result['status'] = true;
        $result['message'] = 'Validasi berhasil !';
        $result = (object) $result;

        return $result;
    }
}
