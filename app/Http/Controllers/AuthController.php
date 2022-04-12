<?php

namespace App\Http\Controllers;

use App\Facades\JsonOutputService;
use App\Http\Requests\AuthRequest;
use App\Repositories\UserRepository;
use App\Services\AuthService;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(
        private UserRepository $userRepository,
        private AuthService $authService
    ) {
    }

    public function login(AuthRequest $request)
    {
        $user = $this->userRepository->getForLogin();

        if ($user && Hash::check(request('password'), $user->password)) {
            $this->authService->login($user);
        }
        return redirect('/');
    }

    public function logout()
    {
        auth()->logout();
        $message = 'Logout';
        return JsonOutputService::setMessage($message)->response();
    }

    public function user()
    {
        return response()->json(auth()->user());
    }
}
