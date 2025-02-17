<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Gestión de Productos</title>
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('img/Isotipo.png') }}" class="card-img-top" alt="Isotipo GolZone">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            

            @auth
            <h5 class="ms-3 text-dark d-inline">Bienvenido, {{ Auth::user()->name }}</h5>
            <a href="{{ route('logout') }}" class="ms-3 btn btn-outline-danger btn-lg text-black border-black"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @endauth
        </div>
    </nav>

    <!-- Gestión de Productos -->
    <section class="admin-products my-5">
        <div class="container">
            <h2 class="text-center mb-4">Gestión de Productos</h2>

            <!-- Botón para añadir producto -->
            <div class="text-end mb-4">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                    <i class="bi bi-plus-circle"></i> Añadir Producto
                </button>
            </div>

            <!-- Tabla de Productos -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th> <!-- Nueva columna para la imagen -->
                        <th>Nombre</th>
                        <th>Liga</th>
                        <th>Tipo</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>
                            @if ($producto->image)
                            <img src="{{ asset('storage/img/' . $producto->image) }}" alt="Imagen de {{ $producto->name }}" class="img-thumbnail" style="width: 100px; height: auto;">
                            @else
                            <span class="text-muted">Sin imagen</span>
                            @endif
                        </td>
                        <td>{{ $producto->name }}</td>
                        <td>{{ $producto->liga }}</td>
                        <td>{{ $producto->type }}</td>
                        <td>{{ number_format($producto->price, 2) }}€</td>
                        <td>
                            <!-- Botón de Editar -->
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editProductModal{{ $producto->id }}">
                                <i class="bi bi-pencil-square"></i> Editar
                            </button>

                            <!-- Botón de Eliminar -->
                            <form action="{{ route('products.destroy', $producto->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </form>

                        </td>
                    </tr>

                    <!-- Modal para Editar Producto -->
                    <div class="modal fade" id="editProductModal{{ $producto->id }}" tabindex="-1" aria-labelledby="editProductModalLabel{{ $producto->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editProductModalLabel{{ $producto->id }}">Editar Producto</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('products.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT') <!-- o @method('PATCH') -->

                                    <!-- Campos del formulario -->
                                    <div class="form-group">
                                        <label for="name">Nombre del producto</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $producto->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Precio</label>
                                        <input type="number" name="price" id="price" class="form-control" value="{{ $producto->price }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="liga">Liga</label>
                                        <input type="text" name="liga" id="liga" class="form-control" value="{{ $producto->liga }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="type">Tipo</label>
                                        <input type="text" name="type" id="type" class="form-control" value="{{ $producto->type }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Descripción</label>
                                        <textarea name="description" id="description" class="form-control">{{ $producto->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Imagen</label>
                                        <input type="file" name="image" id="image" class="form-control">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                </form>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>

            </table>
            <!-- Paginación -->
            <div class="d-flex justify-content-center">
                {{ $productos->links('pagination::bootstrap-5') }}
            </div>


            <!-- Modal para Añadir Producto -->
            <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addProductModalLabel">Añadir Producto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('products.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nombre</label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="liga" class="form-label">Liga</label>
                                    <input type="text" name="liga" id="liga" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="type" class="form-label">Tipo</label>
                                    <input type="text" name="type" id="type" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Precio</label>
                                    <input type="number" name="price" id="price" class="form-control" step="0.01" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Añadir Producto</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
</body>

</html>