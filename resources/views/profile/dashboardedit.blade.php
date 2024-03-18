<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    


    <form method="POST" action="{{route('home.update',$task->id)}}">
    @csrf
    @method('PUT')
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >Введите задачу</label>
    <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="tasks"  value="{{isset($task) ? $task->tasks :''}}">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >Введите прогрес</label>
    <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="status"  value="{{isset($task) ? $task->status :''}}">
  </div>
   
    <button type="submit" class="btn btn-primary">Редактировать</button>
</form>


    
    </div>
</x-app-layout>
