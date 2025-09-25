<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <title>Mascotas</title>
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
            background-color: cadetblue;
        }
        td, th {
        border: 1px solid #ccc;
        padding: 6px;
        text-align: center;
        }
     </style>

</head>
    <body>
        <h2>LISTA DE MASCOTAS</h2>
        <table>
            <thead>
              <tr>
                <th>Nro</th>
                <th>Nombre</th>
                <th>Edad (años)</th>
                <th>Color</th>
                <th>Peso (kg)</th>
                <th>Tamaño</th>
                <th>Esterilizado</th>
                <th>Raza</th>
            <!--<th>Cuidado especial</th>-->
                <th>Comportamiento</th>
                <th>Estado</th>
                <th>Fecha registrado</th>
                <th>Fecha actualizacion</th>
                
              </tr>
            </thead>
            <tbody>
                @foreach ($mascotas as $mascota)
                <tr>
                    <td>{{ $mascota->id }}</td>
                    <td>{{ $mascota->nombre }}</td>
                    <td>{{ $mascota->edad }}</td>
                    <td>{{ $mascota->color}}</td>
                    <td>{{ $mascota->peso }}</td>
                    <td>{{ $mascota->tamanio }}</td>
                    <td>{{ $mascota->esterilizado? 'Si' : 'No' }}</td>
                    <td>{{ $mascota->razas->nombre}}</td>
                <!--<td>{{ $mascota->cuidado_especial }}</td>-->
                    <td>{{ $mascota->comportamiento }}</td>
                    <td>{{ $mascota->estado_formatted}}</td>
                    <td>{{ $mascota->created_at }}</td>
                    <td>{{ $mascota->updated_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html> 