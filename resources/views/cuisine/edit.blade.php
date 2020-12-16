@extends('layouts.app')
@section('content')
<form method="post" action="{{route('cuisines.update', $cuisine)}}">
    {!! method_field('PATCH') !!}
    <div class="mb-3">
        <label for="input-name" class="form-label">Название</label>
        <input name="name" type="text" class="form-control" id="input-name" value="{{old('name', $cuisine->name)}}">
    </div>
    <div class="mb-3">
        <label for="input-keywords" class="form-label">Ключевые слова</label>

        <?php
        $keywordIds = old('keywords', $cuisine->keywords->pluck('id')->all());
        ?>

        <select name="keywords[]" class="form-control" id="input-keywords" multiple>
            @foreach($keywords as $keyword)
                <option @if(in_array($keyword->id, $keywordIds)) selected @endif value="{{$keyword->id}}">{{$keyword->name}}</option>
            @endforeach
        </select>
    </div>

    @if($errors->all())
        <div class="alert alert-danger">
            {!! implode('</br>', $errors->all()) !!}
        </div>
    @endif

    <div class="mb-3">
        <input class="btn btn-primary" type="submit" value="Изменить"/>
        <a class="btn btn-link" href="{{route('cuisines.index')}}">Назад</a>
    </div>
</form>
@endsection
