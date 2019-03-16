<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    //一覧取得
    public function index(Request $request)
    {
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
      $event->user_id = $id = Auth::id();
      $event->user_name = $id = Auth::id();
      //$patocall->wether_valid =1;
      $event->save();

      $id = Event::where(id == $event->id)->first();
      if($id){
        $event = Event::all();
        return $event;
      }else {
        return redirect('/home');
      }
    }

}
