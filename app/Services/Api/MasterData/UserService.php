<?php

namespace App\Services\Api\MasterData;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * Index service.
     *
     * @return  ArrayObject
     */
    public function index()
    {
        $user = User::with(['wallet'])->get();

        $status = true;
        $message = 'Data berhasil diambil !';

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'data' => $user,
        ];

        return $result;
    }

    /**
     * Show service.
     *
     * @param  $request
     * @return  ArrayObject
     */
    public function show($request)
    {
        $user = User::with(['wallet'])->firstWhere('id', $request->user_id);

        $status = true;
        $message = 'Data berhasil diambil !';

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'data' => $user,
        ];

        return $result;
    }

    /**
     * Check pin service.
     *
     * @param  $request
     * @return  ArrayObject
     */
    public function checkPin($request)
    {
        $user = User::with(['wallet'])->firstWhere('id', $request->user_id);

        if (Hash::check($request->pin, $user->pin)) {
            $status = true;
            $message = 'PIN benar !';
        } else {
            $status = false;
            $message = 'PIN salah !';
        }

        $result = (object) [
            'status' => $status,
            'message' => $message,
        ];

        return $result;
    }

    /**
     * Update profile service.
     *
     * @param  $request
     * @return  ArrayObject
     */
    public function updateProfile($request)
    {
        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        User::where('id', $request->user_id)->update($data);

        $user = User::with(['wallet'])->firstWhere('id', $request->user_id);

        $status = true;
        $message = 'Data berhasil diubah !';

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'data' => $user,
        ];

        return $result;
    }

    /**
     * Update pin service.
     *
     * @param  $request
     * @return  ArrayObject
     */
    public function updatePin($request)
    {
        $data = [
            'pin' => Hash::make($request->new_pin),
        ];

        User::where('id', $request->user_id)->update($data);

        $user = User::with(['wallet'])->firstWhere('id', $request->user_id);

        $status = true;
        $message = 'PIN berhasil diubah !';

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'data' => $user,
        ];

        return $result;
    }
}
