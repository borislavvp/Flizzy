<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider){
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider){
        try {
            $user = Socialite::driver($provider)->user();

            $existingUser = User::where('email', $user->getEmail())->first();

            if ($existingUser) {
                auth()->login($existingUser, true);
            } else {
                $newUser                    = new User;
                $newUser->google_id         = $user->getId();
                $newUser->name              = $user->getName();
                $newUser->email             = $user->getEmail();
                $newUser->save();

                auth()->login($newUser, true);
            }

            return redirect($this->redirectPath());
        } catch (\Exception $e) {
//            return redirect()->route('login');
            echo 'asd';
        }
//        $user = Socialite::driver($provider)->stateless()->user();
//        return $user->token;
////        $authUser = $this->findOrCreateUser($user, $provider);
////        Auth::login($authUser,true);
////        return redirect($this->redirectTo);
    }

    public function findOrCreateUser($user, $provider){
        $authUser = User::where('google_id', $user->id)->first();
        if($authUser){
            return $authUser;
        }else {
            return User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id
            ]);
        }
    }

}
