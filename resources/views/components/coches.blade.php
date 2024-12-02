<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Coches</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .imagen{
            width: 190px;
        }
    </style>
</head>
<body>
    <h1>Listado de Coches</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Precio</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($coches as $coche)
                <tr>
                    <td>{{ $coche->id }}</td>
                    <td>{{ $coche->marca }}</td>
                    <td>{{ $coche->modelo }}</td>
                    <td>${{ number_format($coche->precio, 2) }}</td>
                    <td>
                        <img class="imagen" src="{{ public_path($coche->imagen) }}" alt="Imagen de {{$coche->imagen}}">
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
