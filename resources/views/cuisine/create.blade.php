@extends('layouts.app')
@section('content')
<form method="post" action="{{route('cuisines.store')}}">
    <div class="mb-3">
        <label for="input-name" class="form-label">Название</label>
        <input name="name" type="text" class="form-control" id="input-name" required>
    </div>
    <div class="mb-3">
        <label for="input-keywords" class="form-label">Ключевые слова</label>
        <select name="keywords[]" class="form-control" id="input-keywords" multiple required>
            @foreach($keywords as $keyword)
                <option  value="{{$keyword->id}}">{{$keyword->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <input class="btn btn-primary" type="submit" value="Создать"/>
    </div>
</form>
@endsection
