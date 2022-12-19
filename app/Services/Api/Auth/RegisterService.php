<?php

namespace App\Services\Api\Auth;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Wallet;

class RegisterService
{
    /**
     * Index service.
     *
     * @param  $request
     * @return  ArrayObject
     */
    public function index($request)
    {
        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'pin' => Hash::make($request->pin),
            'status' => 'Verified',
        ];

        if ($request->image) {
            $file = $request->image;

            $ext = $file->getClientOriginalExtension();
            $filename = date('YmdHis') . uniqid() . '.' . $ext;
            $file->storeAs('public/images/users/', $filename);

            $data['image'] = $filename;
        }

        if ($request->identity_card_image) {
            $file = $request->identity_card_image;

            $ext = $file->getClientOriginalExtension();
            $filename = date('YmdHis') . uniqid() . '.' . $ext;
            $file->storeAs('public/images/identity_cards/', $filename);

            $data['identity_card_image'] = $filename;
        }

        $user = User::create($data);

        $cardNumber = date('YmdHis') . $user->id;

        Wallet::create([
            'user_id' => $user->id,
            'card_number' => $cardNumber,
        ]);

        $user = User::with(
            [
                'wallet' => function ($query) {
                    $query->without(['user']);
                }
            ]
        )
            ->firstWhere('id', $user->id);

        $token = $user->createToken('auth_token')->plainTextToken;
        $user->token = $token;

        $status = true;
        $message = 'Berhasil registrasi akun !';

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'data' => $user,
        ];

        return $result;
    }

    /**
     * Check username service.
     *
     * @param  $request
     * @return  ArrayObject
     */
    public function checkUsername($request)
    {
        $user = User::firstWhere('username', $request->username);

        if (empty($user)) {
            $status = true;
            $message = 'Username dapat digunakan !';
        } else {
            $status = false;
            $message = 'Username sudah digunakan !';
        }

        $result = (object) [
            'status' => $status,
            'message' => $message,
        ];

        return $result;
    }

    /**
     * Check email service.
     *
     * @param  $request
     * @return  ArrayObject
     */
    public function checkEmail($request)
    {
        $user = User::firstWhere('email', $request->email);

        if (empty($user)) {
            $status = true;
            $message = 'Email dapat digunakan !';
        } else {
            $status = false;
            $message = 'Email sudah digunakan !';
        }

        $result = (object) [
            'status' => $status,
            'message' => $message,
        ];

        return $result;
    }

    /**
     * Profile image service.
     *
     * @return  ArrayObject
     */
    public function profileImage()
    {
        $image = asset('storage/images/users/default.png');

        $status = true;
        $message = 'Berhasil mengambil data !';

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'data' => $image,
        ];

        return $result;
    }

    /**
     * Identity card image service.
     *
     * @return  ArrayObject
     */
    public function identityCardImage()
    {
        $image = asset('storage/images/identity_cards/default.png');

        $status = true;
        $message = 'Berhasil mengambil data !';

        $result = (object) [
            'status' => $status,
            'message' => $message,
            'data' => $image,
        ];

        return $result;
    }
}
