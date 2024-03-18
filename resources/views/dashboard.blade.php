<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <section class="vh-100" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-9 col-xl-7">
        <div class="card rounded-3">
          <div class="card-body p-4">
            <h4 class="text-center my-3 pb-3">To Do App</h4>

            <form method="POST" action="{{route('home.store')}}" class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
              <div class="col-12">
                <div class="form-outline">
                    @csrf
                  <input id="form1" class="form-control" name="task"/>
                  <label class="form-label" for="form1">Enter a task here</label>
                </div>
              </div>
            

              <div class="col-12">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
            

            <table class="table mb-4">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Todo item</th>
                  <th scope="col">Status</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <div class="container" style="display:flex;">
                @foreach($tasks as $task)
                <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$task->tasks}}</td>
                  <td>{{$task->status}}</td>
                  <form method="POST" action="{{route('home.destroy', $task->id)}}">
                  <td>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                  <form method="GET" action="{{route('home.edit',$task->id)}}">
                  @csrf
                    <button type="submit" class="btn btn-success ms-1">Edit</button>
                  </td>
                  </form>
                </tr>
                @endforeach
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
  </section>
</x-app-layout>
