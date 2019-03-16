@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
        <form name="resisterform" action="/event/create" method="post">
	           {{csrf_field()}}
	            緯度:<input type="text" name="longitude"><br />
	            経度:<input type="text" name="latitude" ><br />
              何時間から？:<input type="text" name="start_time" ><br />
	        <button type="submit" name="action" value="send">送信</button>
        </form>
    </div>
</div>
@endsection
