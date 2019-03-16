<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;


class SocialAccountController extends Controller
{
    //リダイレクト先のプロバイダーを指定。SNS認証のエンドポイントまでリダイレクトさせる

    public function redirectToProvider($provider)
   {
      return \Socialite::driver($provider)->redirect();
   }
   //callbackされてログインするとこ
   public function handleProviderCallback(\App\SocialAccountsService $accountService, $provider)
   {
       try {
           $user = \Socialite::driver($provider)->user();//こいつはオブジェクト
       } catch (\Exception $e) {
           return redirect('/login');
       }

       $authUser = $accountService->findOrCreate(
           $user,
           $provider
       );


       auth()->guard('user')->login($authUser, true);
      return redirect()->to('/home');

   }
}
