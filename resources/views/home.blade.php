@extends('layouts.mains')

@section('content')
        <div class="tabs">
            <nav class="tabs__items">
                <a href="#tab_01" class="tabs__item"><span>Задачи</span></a>
                <a href="#tab_02" class="tabs__item"><span>Исполнители</span></a>
            </nav>
        
            <div class="tabs__body">
                <div id="tab_01" class="tabs__block">
                    <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Название</th>
                                    <th>Исполнитель</th>
                                    <th>Статус</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                <tr id="sidd{{$task->id}}">
                                    <td>{{$task->id}}</td>  
                                    <td>{{$task->name_task}}</td> 
                                    <td>{{$task->people->name}}</td> 
                                    <td>{{$task->jobs->name_status}}</td> 
                                    <td>
                                    <button onclick="deleteTask({{$task->id}})" type="button" class="btn btn-danger mb-3">Удалить</button>
                                    <button onclick="window.location.href = '/editt/{{$task->id}}';" type="button" class="btn btn-warning">Редактировать</button>
                                    </td>    
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                    <div style="display: none" id="grabMe">
                    <form method="post" action="/">
                        @method('POST')
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Название задачи</span>
                            </div>
                    <input for="name_task" name="name_task" class="form-control"\>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Исполнитель</span>
                        </div>   
                        <select for="executor" name="executor" class="form-control">
                            @foreach ($people as $peoples)
                            <option value="{{$peoples->id}}">{{ $peoples->name }}</option>
                            @endforeach  
                        </select>
                    
                </div>
               
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Статус</span>
                    </div>   
                    <select for="status" name="status" class="form-control">
                        @foreach ($jobs as $job)
                        <option value="{{$job->id}}">{{ $job->name_status }}</option>
                        @endforeach  
                    </select>
                
            </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Описание</span>
                        </div>
                    <textarea for="description" name="description" class="form-control"></textarea> 
                    </div>
                    <button class="btn btn-success">Создать</button>
                    <button onclick="addTask.close();" type="button" class="btn btn-secondary">Отменить</button>
                </form>
                    </div>
                    <button onclick="addTask.open();" type="button" class="btn btn-success">Добавить</button>
                </div>
                <div id="tab_02" class="tabs__block">
                    <table id="table_p" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Имя</th>
                                <th>Должность</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($people as $peoples)
                          
                            <tr id="sid{{$peoples->id}}">
                                 <td >{{$peoples->id}}</td>  
                                 <td>{{$peoples->name}}</td> 
                                 <td>{{$peoples->position}}</td> 
                                 <td>
                                <button onclick="deletePeople({{$peoples->id}})" type="button" class="btn btn-danger">Удалить</button>   
                                <button onclick="window.location.href = '/editp/{{$peoples->id}}';" class="btn btn-warning">Редактировать</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
                <div style="display: none" id="grabMeIsp">
                    <form method="post" action="/create">
                        @method('POST')
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Имя</span>
                            </div>
                    <input for="name" name="name" class="form-control"\>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Должность</span>
                        </div>   
                    <input for="position" name="position" class="form-control"\>
                    </div>
                    <button class="btn btn-success">Создать</button>
                    <button onclick="addPeople.close();" type="button" class="btn btn-secondary">Отменить</button>
                    </form>
                    </div>
                <button onclick="addPeople.open();" type="button" class="btn btn-success">Добавить</button>
                </div>  
        
            </div>
            <script>
            var addTask = new jBox('Modal', {
            attach: '#addTask',
            title: 'Добавить задачу',
            content: $('#grabMe')
            });
           
            var addPeople = new jBox('Modal', {
            attach: '#addPeople',
            title: 'Добавить исполнителя',
            content: $('#grabMeIsp')
            });
             </script>
             
       <script>
       function deletePeople(id)
            {
                if(confirm("Вы действительно хотите удалить запись?"))
                {
                    $.ajax({
                        url:'/'+id,
                        type:'DELETE',
                        data:{
                            _token:$("input[name=_token]").val()
                        },
                        success:function(response){
                            $('#sid'+id).remove();
                            alert ('Запись удалена!')
                        },
                        error: function (jqXHR, exception) {
                            if (jqXHR.status == 500) {
                            alert ('Пользователь не может быть удалён, у него есть задача!')
                        }
                    }
                    })
                }
            }
            
        </script>
        <script>
            function deleteTask(id)
            {
                if(confirm("Вы действительно хотите удалить запись?"))
                {
                    $.ajax({
                        url:'/del/'+id,
                        type:'DELETE',
                        data:{
                            _token:$("input[name=_token]").val()
                        },
                        success:function(response){
                            $('#sidd'+id).remove();
                            alert ('Запись удалена!')
                        },
                    })
                }
            }
        </script>
@endsection
