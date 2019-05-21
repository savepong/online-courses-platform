<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SocialFacebookAccountService;
use Socialite;

class SocialAuthFacebookController extends Controller
{
   /**
   * Create a redirect method to facebook api.
   *
   * @return void
   */
    public function redirect()
    {
        /** Remember Previous URL */
        if( url('').'/' != url()->previous() ){
            session()->put('previousUrl', url()->previous());
        }
    
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback(SocialFacebookAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());

        auth()->login($user);

        /** Get Previous URL */
        if (session()->exists('previousUrl')) {
            $previousUrl = session()->pull('previousUrl');
        }

        return isset($previousUrl) && $previousUrl != url('/login') ? redirect($previousUrl) : redirect()->to('/profile');
    }
}
