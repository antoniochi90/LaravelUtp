
<div class="container">
    <h2>Agregar Nuevo Producto</h2>
    <form action="{{ route('coches.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Campo Marca -->
        <div class="form-group">
            <label for="marca">Marca:</label>
            <input type="text" class="form-control" id="marca" name="marca" required>
        </div>

        <!-- Campo Modelo -->
        <div class="form-group">
            <label for="modelo">Modelo:</label>
            <input type="text" class="form-control" id="modelo" name="modelo" required>
        </div>

        <!-- Campo Precio -->
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" class="form-control" id="precio" name="precio" required>
        </div>

        <!-- Campo para Imagenes -->
        <div class="form-group">
            <label for="imagen">Imágenes:</label>
            <input type="file" class="form-control" id="imagen" name="imagen">
        </div>

        <!-- Botón de Enviar -->
        <button type="submit" class="btn btn-primary">Guardar Producto</button>
    </form>
</div>
