<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <title>Usuarios</title>
     <style>
        body {
        font-family: Arial, sans-serif;
        font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 18px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }

        table {
        width: 100%;
        border-collapse: collapse;
        margin: 10px 0;
        }
        th{
            background-color:cadetblue;
        }
        td, th {
        border: 1px solid #ccc;
        padding: 6px;
        text-align: center;
        }
     </style>

</head>
    <body>
        <h2>Lista de Usuarios</h2>
        <table>
            <thead>
              <tr>
                <th>Nro</th>
                <th>Nombre de Usuario</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Nombres</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>CI</th>
                <th>Nro de Celular</th>
                <th>Direccion</th>
                <th>Fecha creacion</th>
                <th>Fecha actualizacion</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->nombre_usuario }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->rol_formatted}}</td>
                    <td>{{ $usuario->nombres }}</td>
                    <td>{{ $usuario->ap_paterno }}</td>
                    <td>{{ $usuario->ap_materno }}</td>
                    <td>{{ $usuario->ci }}</td>
                    <td>{{ $usuario->nro_celular }}</td>
                    <td>{{ $usuario->direccion }}</td>
                    <td>{{ $usuario->created_at}}</td>
                    <td>{{ $usuario->updated_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html> 