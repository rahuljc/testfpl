<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Players</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/8b6e26d815.js" crossorigin="anonymous"></script>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>

  @include('layouts.navigation')
  <div class="container">
    <h1 class="display-4">Manage Players</h1>
    @if (session()->has('message'))
    <div class="alert alert-info">
      {{ session('message') }}
    </div>
    @endif
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Handle</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($players as $player)
        <tr>
          <th scope="row">{{$player->id}}</th>
          <td>{{$player->name}}</td>
          <td>{{$player->logo_uri}}</td>
          <td>{{$player->is_active}}</td>
          <td>
            <a href="{{route('players.show', $player->id)}}" type="button" href="" class="btn btn-primary"><i class="far fa-eye"></i></a>
            <a href="{{route('players.edit', $player->id)}}" type="button" class="btn btn-success"><i class="fas fa-edit"></i></a>
            <a href="{{route('players.destroy', $player->id)}}" type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</body>

</html>