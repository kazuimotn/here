<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class EventController extends Controller
{
    //一覧取得
    public function index(Request $request)
    {
      //時間で検索をかける．現在時間の取得を行い、+-12時間のもののみを取得し返す．
      //現在時刻の取得
      // $dt = Carbon::now();
      // // 日
      // $dt1->diffInDays($dt2); // 244日
      // $event = Event::where('start_time','>=',$dt)->get();
      $event = Event::all();
      return $event;
    }

    //イベント追加
    public function create(Request $request)
    {
      $event = new Event;
      $form = $request->all();
      //unset($form['_token']);
      $event->fill($form);
      //ログインしているユーザーのidを取得し
      $event->user_id = Auth::id();
      $event->user_name = Auth::user()->name;
      //$patocall->wether_valid =1;
      $event->save();

      // $ids = Event::where('id' == $event->id)->first();
      // if($ids){
        $event = Event::all();
        return $event;
      // }else {
      //   return redirect('/home');
      // }
    }

}
