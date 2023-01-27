<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\AfterRegister;
use App\Models\SocialAccount;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function azure()
    {
        return Socialite::driver('azure')->redirect();
    }

    public function handleProvideCallback()
    {
        $callback = Socialite::driver('azure')->stateless()->user();

        $data = [
            
                'name' => $callback->getName(),
                'email' => $callback->getEmail(),
                'avatar' => $callback->getAvatar(),
                'password' =>encrypt(Str::random(20)),
                'email_verified_at' => date('Y-m-d H:i:s', time()),
        ];

        
        
        $user = User::firstOrCreate(['email' => $data['email']], $data);
         $user = User::whereEmail($data['email'])->first();
         if (!$user) {
             $user = User::create($data);
             Mail::to($user->email)->send(new AfterRegister($user));
         }
         Auth::login($user, true);
         return redirect (route('login.user'));
    }

    // public function logout(Request $request) 
    // {
    //      Auth::guard()->logout();
    //      $request->session()->flush();
    //      $azureLogoutUrl = Socialite::driver('azure')->getLogoutUrl(route('index'));
    //      return redirect($azureLogoutUrl);
    // }
}

