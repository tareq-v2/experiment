<?php
namespace App\Http\Controllers;

use Exception;
use Validator;
use Carbon\Carbon;
use App\Models\User;
use App\Models\ThemeSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    // public function facebookRedirect()
    // {
    //     return Socialite::driver('facebook')->redirect();
    // }
    // public function loginWithFacebook()
    // {
    //         $user = Socialite::driver('facebook')->user();
    //         $isUser = User::where('fb_id', $user->id)->first();

    //         if($isUser){
    //             Auth::login($isUser);
    //             return redirect('admin/dashboard');
    //         }else{
    //             $createUser = User::create([
    //                 'name' => $user->name,
    //                 'email' => $user->email,
    //                 'fb_id' => $user->id,
    //                 'password' => encrypt('12345678')
    //             ]);

    //             ThemeSetting::create([
    //                 'user_id'    => $createUser->id,
    //                 'created_at' => Carbon::now(),
    //             ]);

    //             Auth::login($createUser);
    //             return redirect('admin/dashboard');
    //         }
    // }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect('admin/dashboard');

            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('12345678')
                ]);

                ThemeSetting::create([
                    'user_id'    => $newUser->id,
                    'created_at' => Carbon::now(),
                ]);

                Auth::login($newUser);

                return redirect('/admin/dashboard');
            }

    }
}
