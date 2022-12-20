<?php

namespace App\Http\Controllers\Api\MasterData;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Validations\Api\MasterData\UserValidation;
use App\Services\Api\MasterData\UserService;

class UserController extends Controller
{
    /**
     * Validation instance.
     *
     * @var \App\Validations\Api\MasterData\UserValidation
     */
    protected $userValidation;

    /**
     * Service instance.
     *
     * @var \App\Services\Api\MasterData\UserService
     */
    protected $userService;

    /**
     * Create a new service instance.
     *
     * @return void
     */
    public function __construct(UserValidation $userValidation, UserService $userService)
    {
        $this->userValidation = $userValidation;
        $this->userService = $userService;
    }

    /**
     * Index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = $this->userService->index();

        return $this->sendResponse($result);
    }

    /**
     * Show.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $validation = $this->userValidation->show($request);

        if (!$validation->status) {
            return $this->sendResponse($validation);
        }

        $result = $this->userService->show($request);

        return $this->sendResponse($result);
    }

    /**
     * Check pin.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkPin(Request $request)
    {
        $validation = $this->userValidation->checkPin($request);

        if (!$validation->status) {
            return $this->sendResponse($validation);
        }

        $result = $this->userService->checkPin($request);

        return $this->sendResponse($result);
    }

    /**
     * Update profile.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        $validation = $this->userValidation->updateProfile($request);

        if (!$validation->status) {
            return $this->sendResponse($validation);
        }

        $result = $this->userService->updateProfile($request);

        return $this->sendResponse($result);
    }

    /**
     * Update password.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {
        $validation = $this->userValidation->updatePassword($request);

        if (!$validation->status) {
            return $this->sendResponse($validation);
        }

        $result = $this->userService->updatePassword($request);

        return $this->sendResponse($result);
    }

    /**
     * Update pin.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePin(Request $request)
    {
        $validation = $this->userValidation->updatePin($request);

        if (!$validation->status) {
            return $this->sendResponse($validation);
        }

        $result = $this->userService->updatePin($request);

        return $this->sendResponse($result);
    }
}
