<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class SocialAccountsService
{
    public function findOrCreate(ProviderUser $providerUser, $provider)
    {
          // 検索
          //まずはプロバイダーよって参照するテーブルを絞る。そのあと、プロバイダーのidで検索結果をさらに絞る、
          //LinkedSocialAccountモデルを用いる。
          $account = LinkedSocialAccount::where('provider_name', $provider)   //Facebook認証しか利用しないためこの文は必要ないが、拡張性を考慮して記述しておく。
                    ->where('provider_id', $providerUser->getId())           //プロバイダー発行のidで絞る。
                    ->first();
                    //$accountがnullでないならそのまま
            if ($account) {
              return $account->user;    //$accountを返すとlinkedsocialaccountテーブルのデータを返すが、->userを指定するとusersテーブルから情報を引っ張ってくるようになった。
            } else {
            //見つからなければemailで検索をかける
            $user = User::where('email', $providerUser->getEmail())->first();

            if (! $user) {        //検索結果がnullならば新しくユーザーを作成する。
              $user = User::create([
                  'email' => $providerUser->getEmail(),
                  'name'  => $providerUser->getName(),
                  'cast_or_gest' =>$value,
                      ]);
              }
          //リレーションを持たせてcreateする。
              $user->accounts()->create([
                  'provider_id'   => $providerUser->getId(),
                  'provider_name' => $provider,
                  ]);
          //返り値としてユーザーを返す。
              return $user;
              }          

      }
}
