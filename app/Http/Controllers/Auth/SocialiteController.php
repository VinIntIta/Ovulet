<?php

namespace App\Http\Controllers\Auth;

use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class SocialiteController extends Controller
{
  public function redirectToProvider($provider)
  {
      return Socialite::driver($provider)->redirect();
      dd($key);

  }
  public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }
        // // only allow people with @company.com to login
        // if(explode("@", $user->email)[1] !== 'gmail.com'){
        //   // dd($user);
        //     return redirect()->to('/dashboard');
        // }
        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();
        if($existingUser){
            // log them in
            auth()->login($existingUser, true);
        } else {
            // create a new user
            $newUser                  = new User;
            $newUser->name            = $user->name;
            $newUser->email           = $user->email;
            $newUser->provider_id     = $user->id;
            $newUser->provider        = $provider;
            $newUser->oauth_type      = $provider;
            $newUser->avatar          = $user->avatar;
            $newUser->avatar_original = $user->avatar_original;
            $newUser->save();
            auth()->login($newUser, true);
        }
        return redirect()->to('/dashboard');
    }
}
