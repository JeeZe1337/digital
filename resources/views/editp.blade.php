@extends('layouts.mains')

@section('content')

<form method="post" action="/editp/{{$people->id}}">
    @method('PATCH')
    @csrf
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">Имя</span>
        </div>
<input for="name" name="name" value="{{ $people->name }}" class="form-control"\>
</div>
<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text">Должность</span>
    </div>   
<input for="position" name="position" value="{{ $people->position }}" class="form-control"\>
</div>
<button class="btn btn-success">Сохранить</button>
<button onclick="window.location.href = '/#tab_02';" type="button" class="btn btn-secondary">Отменить</button>
</form>

@endsection