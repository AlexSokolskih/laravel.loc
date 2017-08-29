@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Создаем пост</div>
                    <div>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </div>

                    <div class="panel-body">
                        <form action="/posts/store" method="post">
                            {{csrf_field()}}
                            <label for="" class="input-group">
                                <input type="text" name="title">
                            </label>
                            <textarea name="content" id="" cols="30" rows="10"></textarea>
                            <input type="submit" value="отправить" class="btn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
