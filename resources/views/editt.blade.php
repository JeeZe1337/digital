@extends('layouts.mains')

@section('content')
<form method="post" action="/editt/{{$tasks->id}}">
    @method('PATCH')
    @csrf
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">Название задачи</span>
        </div>
<input for="name_task" name="name_task" value="{{ $tasks->name_task }}" class="form-control"\>
</div>
<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text">Исполнитель</span>
    </div>   
    <select for="executor" name="executor" class="form-control">
        @foreach ($people as $peoples)
        <option value = "{{ $peoples->id }}" {{ ( $peoples->id == $tasks->executor) ? 'selected' : '' }}>{{ $peoples->name }}</option>
        @endforeach
</select>
</div>
<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text">Статус</span>
    </div>   
<select for="status" name="status" class="form-control">
  @foreach ($jobs as $job)
  <option value = "{{ $job->id }}" {{ ( $job->id == $tasks->status) ? 'selected' : '' }}>{{ $job->name_status }}</option>
  @endforeach 
     
</select>
</div>
<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text">Описание</span>
    </div>
<textarea for="description" name="description" class="form-control">{{ $tasks->description }}</textarea> 
</div>
<button class="btn btn-success">Сохранить</button>
<button onclick="window.location.href = '/#tab_01';" type="button" class="btn btn-secondary">Отменить</button>
</form>
@endsection