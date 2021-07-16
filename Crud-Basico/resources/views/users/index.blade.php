<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
     crossorigin="anonymous">
    <title>Index</title>
</head>
<body>

    <div class="container">

        <div class="row mt-2">

            <div class="col-sm-8 mx-auto">

                <div class="card">

                    @if($errors->any())

                        <div class="alert alert-danger">

                            @foreach($errors->all() as $error)
                                - {{$error}} <br>
                            @endforeach

                        </div>

                    @endif

                    <form action="{{route('users.store')}}" method="post">

                        <div class="row">

                            <div class="col-sm-3">

                                <input type="text" name="name" class="form-control" placeholder="Nombre"
                                value="{{old('name')}}">

                            </div>

                            <div class="col-sm-4">

                                <input type="text" name="email" class="form-control" placeholder="Email"
                                value="{{old('email')}}">

                            </div>

                            <div class="col-sm-3">

                                <input type="password" name="password" class="form-control"
                                placeholder="Password" value="{{old('password')}}">

                            </div>

                            <div class="col-auto">

                                @csrf
                                <button type="submit" class="btn btn-primary">Enviar</button>

                            </div>

                        </div>

                    </form>

                </div>

                <table class="table">

                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>&nbsp;</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <form action="{{route('users.delete',$user)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" value="Eliminar"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Desea eliminar ...?')">
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</body>
</html>
