@extends('layouts.app')
@section('content')
    @if($cuisines->count())

        <div class="row">
            <div class="col">
                <div class="float-end" style="padding-right: 10px;">
                    <a href="{{route('cuisines.create')}}" class="btn btn-primary">Создать</a>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col">
                <table class="table">
                    <tr>
                        <th>Вид кухни</th>
                        <th>Ключевые слова</th>
                        <th></th>
                    </tr>
                    @foreach($cuisines as $cuisine)
                        <tr>
                            <td width="50%">
                                <a href="{{route('cuisines.edit', $cuisine)}}" title="Изменить">{{$cuisine->name}}</a>
                            </td>
                            <td width="50%">{{$cuisine->keywords->pluck('name')->implode(', ')}}</td>
                            <td>
                                <div>
                                    <form method="post" action="{{route('cuisines.destroy', $cuisine)}}">
                                        {!! method_field('DELETE') !!}
                                        <input type="submit" value="Удалить" class="btn btn-danger float-right"/>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>


    @else
        <div class="row">
            <div class="col">
                <div class="text-center">
                    Нет записей.
                    <a href="{{route('cuisines.create')}}" class="btn btn-primary">Создайте первую</a>
                </div>
            </div>
        </div>

    @endif

@endsection


