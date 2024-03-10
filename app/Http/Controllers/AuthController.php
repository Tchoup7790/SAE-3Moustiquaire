<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\ModifyUserRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserIdRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function authenticate(LoginRequest $req): RedirectResponse {
        $credentials = $req->validated();

        if(\Auth::attempt($credentials)) {
            $req->session()->regenerate();

            return redirect()->intended(route('index'))->setStatusCode(200);
        }

        return back()->withErrors([
                'password'=>'The selected password is invalid.',
        ])->onlyInput('email')->setStatusCode(401);
    }

    public function register(): View {
        $user = new User;
        $user->isAdmin = false;
        return view('auth.register', ['user' => $user, 'adminPage' => false]);
    }

    public function login(): View {
        return view('auth.login');
    }

    public function logout(Request $req): RedirectResponse {
        \Auth::logout();
        $req->session()->regenerate();
        return redirect()->route('index');
    }

    public function createUser(RegisterRequest $req): RedirectResponse {
        $data = $req->validated();

        User::create($data+['isAdmin' => false,]);

        return redirect()->route('auth.login')->setStatusCode(201);
    }

    public function edit(UserIdRequest $req): View | RedirectResponse {
        $data = $req->validated();
        $user = \Auth::user();
        if(!$user->isAdmin() && $data['id'] != $user->id) {
            return to_route('index')->setStatusCode(403);
        }
        return \view('auth.edit', ['user' => User::where(['id' => $data['id']])->first(), 'adminPage' => ($user->isAdmin() && $data['id'] != $user->id)]);
    }

    public function update(ModifyUserRequest $req): RedirectResponse
    {
        $data = $req->validated();
        $user = User::find($data['user_id']);

        if($data['email'] != $user->email) {
            if (User::where(['email' => $data['email']])->first()) {
                return back()->withErrors([
                   'email'=>'The selected email already exists.',
                ])->setStatusCode(401);
            }
        }

        if(!Auth::validate(['email' => $data['email'], 'password' => $data['password']])) {
            return back()->withErrors([
                'password'=>'The selected invalid is invalid.',
            ])->setStatusCode(401);
        }

        $user->update($data);

        return to_route('user.index')->setStatusCode(200);
    }

    public function disable(UserIdRequest $req): RedirectResponse {
        $data = $req->validated();
        $user = \Auth::user();
        $userToDelete = User::find($data['id'])->first();
        if($user->isAdmin() || $data['id'] == $user->id) {
            $userToDelete->delete();
            if($data['id'] == $user->id) {
                \Auth::logout();
                return to_route('index')->setStatusCode(200);
            }
            return to_route('admin')->setStatusCode(200);
        }

        return to_route('index')->setStatusCode(403);
    }

    public function form() {
        // TODO: return the reset password first step / validation form
    }

    public function sendLink() {
        // TODO: send reset link to the targetted email
    }

    public function resetForm() {
        // TODO: return the reset password last step form
    }

    public function reset() {
        // TODO: change password and return to /login
    }
}
