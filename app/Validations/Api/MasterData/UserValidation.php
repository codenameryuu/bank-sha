<?php

namespace App\Validations\Api\MasterData;

class UserValidation
{
    /**
     * Show validation.
     *
     * @param  $request
     * @return  ArrayObject
     */
    public function show($request)
    {
        $result = [];
        $result['status'] = false;

        // Check required parameter is exist
        $validate = [
            'user_id' => ['required', 'exists:users,id'],
        ];

        $message = [
            'user_id.required' => 'ID pengguna tidak boleh kosong !',
            'user_id.exists' => 'ID pengguna tidak ditemukan !',
        ];

        $request->validate($validate, $message);

        // Validation success
        $result['status'] = true;
        $result['message'] = 'Validasi berhasil !';
        $result = (object) $result;

        return $result;
    }

    /**
     * Update profile validation.
     *
     * @param  $request
     * @return  ArrayObject
     */
    public function updateProfile($request)
    {
        $result = [];
        $result['status'] = false;

        // Check required parameter is exist
        $validate = [
            'user_id' => ['required', 'exists:users,id'],
            'name' => ['required'],
            'username' => ['required', 'unique:users,username,' . $request->user_id],
            'email' => ['required', 'unique:users,email,' . $request->user_id],
            'password' => ['nullable'],
        ];

        $message = [
            'user_id.required' => 'ID pengguna tidak boleh kosong !',
            'user_id.exists' => 'ID pengguna tidak ditemukan !',
            'name.required' => 'Nama tidak boleh kosong !',
            'username.required' => 'Username tidak boleh kosong !',
            'username.unique' => 'Username sudah digunakan !',
            'email.required' => 'Email tidak boleh kosong !',
            'email.unique' => 'Email sudah digunakan !',
        ];

        $request->validate($validate, $message);

        // Validation success
        $result['status'] = true;
        $result['message'] = 'Validasi berhasil !';
        $result = (object) $result;

        return $result;
    }

    /**
     * Update pin validation.
     *
     * @param  $request
     * @return  ArrayObject
     */
    public function updatePin($request)
    {
        $result = [];
        $result['status'] = false;

        // Check required parameter is exist
        $validate = [
            'user_id' => ['required', 'exists:users,id'],
            'pin' => ['required'],
        ];

        $message = [
            'user_id.required' => 'ID pengguna tidak boleh kosong !',
            'user_id.exists' => 'ID pengguna tidak ditemukan !',
            'pin.required' => 'PIN tidak boleh kosong !',
        ];

        $request->validate($validate, $message);

        // Validation success
        $result['status'] = true;
        $result['message'] = 'Validasi berhasil !';
        $result = (object) $result;

        return $result;
    }
}
