<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
    use App\Http\Services\AuthService;
use App\Models\User;
use Carbon\Carbon;
use View;
use App\Http\Requests;
use Auth;
use App\Http\Requests\Admin\LoginAttemptRequest;


class AuthController extends BaseController
{

    public function attempt(LoginAttemptRequest $request, AuthService $authService)
    {
        if (!$authService->attempt($request)) {
            session()->flash('error', trans('invalid_credentials'));

            return redirect()->back();
        }

        $user = auth()->user();
        // print_r($user); return;
        if (!$user->token || $user->token_expires_at < Carbon::now()) {
            $token = $user->createToken('User Personal Token #' . $user->id);
            $user->token = $token->accessToken;
            $user->token_expires_at = $token->token->expires_at;
            $user->save();
        }

        return redirect('/admin');
    }

    public function logout()
    {
        Auth::logout();
        Session()->flush();

        return redirect(route('admin.auth.login'));
    }

    public function login()
    {
        if(auth()->check()){
            return redirect(route('admin.home.index'));
        }
        return View::make('admin.auth.login');
    }


}