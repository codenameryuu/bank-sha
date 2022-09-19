<?php

namespace App\Validations\Api\MasterData;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
     * Check pin validation.
     *
     * @param  $request
     * @return  ArrayObject
     */
    public function checkPin($request)
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
            'pin' => ['required', 'numeric', 'digits:6'],
            'new_pin' => ['required', 'numeric', 'digits:6'],
        ];

        $message = [
            'user_id.required' => 'ID pengguna tidak boleh kosong !',
            'user_id.exists' => 'ID pengguna tidak ditemukan !',
            'pin.required' => 'PIN tidak boleh kosong !',
            'pin.numeric' => 'PIN harus berformat angka !',
            'pin.digits' => 'PIN harus 6 digit !',
            'new_pin.required' => 'PIN baru tidak boleh kosong !',
            'new_pin.numeric' => 'PIN baru harus berformat angka !',
            'new_pin.digits' => 'PIN baru harus 6 digit !',
        ];

        $request->validate($validate, $message);

        $user = User::firstWhere('id', $request->user_id);

        // Check pin is correct
        if (!Hash::check($request->pin, $user->pin)) {
            $result['message'] = 'PIN salah !';
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
