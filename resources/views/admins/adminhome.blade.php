
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js">
    <title>Document</title>
</head>
<body>
<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in as Admin!") }}
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <table class="table" style="margin:20px; width: 1500px; height: 300px; align-items:center;" >
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">e-mail</th>
      <th>Role</th>
      <th>View users</th>
    </tr>
  </thead>
  @foreach($name as $names)
  <tbody>
    <tr>
        
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$names->name}}</td>
      <td>{{$names->email}}</td>
      <td>{{$names->usertype}}</td>
      <form method="POST" action="{{route('dashboard', $names->id)}}">
        @csrf
      <td><button type="submit" class="btn btn-secondary">Просмотреть</button></td>
</form>
    </tr>
  </tbody>
  @endforeach
</table>
    
</x-app-layout>




</body>
</html>