<?php

namespace App\Services;
use App\SocialFacebookAccount;
use App\User;
use App\Role;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialFacebookAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialFacebookAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialFacebookAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            /** Get email or not */
            $email = !empty($providerUser->getEmail()) ? $providerUser->getEmail() : $providerUser->getId() . '@facebook.com';

            $user = User::whereEmail($email)->first();

            if (!$user) {
                
                $image = "facebook_" . $providerUser->getId() . ".png";
                $imagePath = public_path() . "/" . config('project.image.directory') . "avatar/" . $image;
                file_put_contents($imagePath, file_get_contents($providerUser->getAvatar()));

                $user = User::create([
                    'email' => $email,
                    'name' => $providerUser->getName(),
                    'username' => $providerUser->getId(),
                    'avatar' => $image,
                    'password' => md5(rand(1,10000)),
                ]);
                
                /** Attach user role */
                $user->attachRole(Role::where('name', 'student')->first());
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}