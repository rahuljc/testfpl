<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>[Edit] {{$team->name}}</title>
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
    <div class="container-sm col-5">
        <h1 class="display-4">[Edit] {{$team->name}}</h1>

        <form action="{{route('teams.update', $team->id)}}" method="POST" enctype='multipart/form-data'>
            @method('PUT')
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input name="name" type="text" value="{{$team->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label" accept="image/png, image/jpeg">Logo</label>
                <input name="logo" class="form-control" type="file" id="formFile">
                <img class="img-thumbnail w-25 p-3" src="{{asset(Storage::url($team->logo_uri))}}" alt="your image" />
            </div>
            <div class="form-group form-check">
                <input {{$team->is_active ? 'checked' : ''}} name="is_active" type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Active</label>
            </div>

            <div class="form-group">
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
                        @foreach ($team->players as $player)
                        <tr>
                            <th scope="row">{{$player->id}}</th>
                            <td>{{$player->first_name}}</td>
                            <td>{{$player->last_name}}</td>
                            <td><img class="img-thumbnail w-25 p-3" src="{{asset(Storage::url($team->image_uri))}}" alt="your image" /></td>
                            <td>{{$player->is_active}}</td>
                        </tr>
                        @endforeach
                    </tbody>
            </div>

            @csrf
            <div class="form-group">
                <input name="submit_type" type="submit" class="btn btn-primary" value="Submit"></input>
                <input name="submit_type" type="submit" class="btn btn-danger" value="Delete"></input>
            </div>
        </form>
    </div>

</body>

</html>