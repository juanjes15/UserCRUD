<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>User CRUD</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('usuarios.create') }}"> Create User</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>S.No</th>
                <th>Documento</th>
                <th>Nombres</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->documento }}</td>
                <td>{{ $usuario->nombres }}</td>
                <td>{{ $usuario->correo }}</td>
                <td>{{ $usuario->telefono }}</td>
                <td>{{ $usuario->direccion }}</td>
                <td>
                    <form action="{{ route('usuarios.destroy',$usuario->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('usuarios.edit',$usuario->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {!! $usuarios->links() !!}
</body>

</html>