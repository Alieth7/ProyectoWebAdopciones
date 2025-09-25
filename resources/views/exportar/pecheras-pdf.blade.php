<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <title>Pecheras</title>
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
        <h2>LISTA DE PECHERAS</h2>
        <table>
            <thead>
              <tr>
                <th>Nro</th>
                <th>Codigo</th>
                <th>Estado</th>
                <th>Fecha registro</th>
                <th>Fecha modificacion</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($pecheras as $pechera)
                <tr>
                    <td>{{ $pechera->id }}</td>
                    <td>{{ $pechera->codigo }}</td>
                    <td>{{ $pechera->estado_formatted }}</td>
                    <td>{{ $pechera->created_at }}</td>
                    <td>{{ $pechera->updated_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html> 