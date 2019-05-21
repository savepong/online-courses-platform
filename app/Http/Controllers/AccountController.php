<?php

namespace App\Http\Controllers;

use App\Mail\SendGridMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Requests;
use App\SocialFacebookAccount;
use App\User;

class AccountController extends Controller
{
    public function profile(Request $request)
    {
        $user = $request->user();

        if($user->hasAnyRole(['admin', 'editor'])){
            return redirect(route('admin.dashboard'));
        }

        return view('account.profile', compact('user'));
    }

    public function login()
    {
        return view('account.login');
    }

    public function register()
    {
        return view('account.register');
    }
    
    public function edit(Request $request)
    {
        $user = $request->user();

        return view('account.edit', compact('user'));
    }

    public function update(Requests\AccountUpdateRequest $request)
    {
        $data = $request->all();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageId = uniqid();
            $extension = $image->getClientOriginalExtension();
            $fileName = $imageId . "." . $extension;
            $destination = public_path(config('cms.image.directory') . "avatar/");

            $successUploaded = $image->move($destination, $fileName);

            if($successUploaded){
                $width = '200';
                $height = '200';
                Image::make($destination . '/' . $fileName)
                    ->fit($width, $height, function ($c) {
                        $c->aspectRatio();
                        $c->upsize();
                    })
                    ->save($destination . '/' . $fileName);    
            }

            $data['avatar'] = $fileName;
        }

        $data['password'] = bcrypt($data['password']);
        $user = $request->user();
        $oldAvatar = $user->avatar;
        $user->update($data);
        if(!empty($oldAvatar) && $user->avatar != $oldAvatar){
            $imagePath = public_path(config('cms.image.directory') . "avatar/" . $oldAvatar);
            if(file_exists($imagePath)) unlink($imagePath); 
        }

        return redirect(route('profile'))->with("alert-success", "Account was update successfully!");
    }

    public function enrolled(Request $request)
    {
        $user = $request->user();

        return view('account.enrolled', compact('user'));
    }

    public function verify()
    {
        Mail::to('ideagital.mail@gmail.com')->send(new SendGridMail());
    }

    // public function update_avatar()
    // {
    //     $fb_accounts = SocialFacebookAccount::all();

    //     foreach($fb_accounts as $account){
    //         $user = User::where('id', $account->user_id)->first();
    //         $account_id = $account->provider_user_id;

    //         $image = "facebook_" . $account_id . ".png";
    //         $imagePath = public_path() . "/" . config('cms.image.directory') . "avatar/" . $image;
    //         file_put_contents($imagePath, file_get_contents("https://graph.facebook.com/v2.10/" . $account_id . "/picture?type=normal"));

    //         $user->update(['avatar' => $image]);
    //     }
    // }

    // public function updateUsername()
    // {
    //     $fb_accounts = SocialFacebookAccount::all();
    //     echo "start..<br>";
    //     foreach($fb_accounts as $account){
    //         $user = User::where('id', $account->user_id)->first();
    //         echo $account->provider_user_id."<br>";
    //         $user->update(['username' => $account->provider_user_id]);
    //     }
    // }
}
