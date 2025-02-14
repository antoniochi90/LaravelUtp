@props(['coches'])
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<br>
<div class="contenedorBotones">
<div class="botonagregar"><a href="{{ route('coches.create') }}" class="boton">agregar</a></div>
<br>
<div class="PdfDescargar"><a href="{{ route('coches.pdf') }}" class="boton">Descargar pdf</a></div>
</div>

<br>

    <!-- Tabla -->
    <table class="table costum-table table-dark">
        <title>Crud de coches</title>
        <thead>
            <tr>
                <th>id</th>
                <th>marca</th>
                <th>modelo</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($coches as $coche)
                <tr>
                    <td>{{ $coche->id }}</td>
                    <td>{{ $coche->modelo }}</td>
                    <td>{{ $coche->marca }}</td>
                    <td>${{ number_format($coche->precio, 2) }}</td>
                    <td>
                        <img class="imagen" src="{{ asset($coche->imagen)}}" alt="">
                    </td>
                    <td>
                        <!-- Botones de acción -->
                        <a href= "{{route('coche.actualizar', $coche->id)}}" class="boton2">Editar</a>
                        <form action="{{route('coche.destroy', $coche->id)}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="boton3" onclick="return confirm('¿Estás seguro de eliminar este item?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No hay items disponibles.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

