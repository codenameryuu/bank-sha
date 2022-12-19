<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Validations\Api\Auth\RegisterValidation;
use App\Services\Api\Auth\RegisterService;

class RegisterController extends Controller
{
    /**
     * Validation instance.
     *
     * @var \App\Validations\Api\Auth\RegisterValidation
     */
    protected $registerValidation;

    /**
     * Service instance.
     *
     * @var \App\Services\Api\Auth\RegisterService
     */
    protected $registerService;

    /**
     * Create a new service instance.
     *
     * @return void
     */
    public function __construct(RegisterValidation $registerValidation, RegisterService $registerService)
    {
        $this->registerValidation = $registerValidation;
        $this->registerService = $registerService;
    }

    /**
     * Index.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validation = $this->registerValidation->index($request);

        if (!$validation->status) {
            return $this->sendResponse($validation);
        }

        $result = $this->registerService->index($request);

        return $this->sendResponse($result);
    }

    /**
     * Check username.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkUsername(Request $request)
    {
        $validation = $this->registerValidation->checkUsername($request);

        if (!$validation->status) {
            return $this->sendResponse($validation);
        }

        $result = $this->registerService->checkUsername($request);

        return $this->sendResponse($result);
    }

    /**
     * Check email.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkEmail(Request $request)
    {
        $validation = $this->registerValidation->checkEmail($request);

        if (!$validation->status) {
            return $this->sendResponse($validation);
        }

        $result = $this->registerService->checkEmail($request);

        return $this->sendResponse($result);
    }

    /**
     * Profile image.
     *
     * @return \Illuminate\Http\Response
     */
    public function profileImage()
    {
        $result = $this->registerService->profileImage();

        return $this->sendResponse($result);
    }

    /**
     * Indentity card image.
     *
     * @return \Illuminate\Http\Response
     */
    public function identityCardImage()
    {
        $result = $this->registerService->identityCardImage();

        return $this->sendResponse($result);
    }
}
