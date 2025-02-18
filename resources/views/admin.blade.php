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
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Liga</th>
                <th>Tipo</th>
                <th>Precio</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>
                    @if ($producto->image)
                    <img src="{{ asset('img/' . $producto->image) }}" alt="Imagen de {{ $producto->name }}" class="img-thumbnail" style="width: 100px; height: auto;">
                    @else
                    <span class="text-muted">Sin imagen</span>
                    @endif
                </td>
                <td>{{ $producto->name }}</td>
                <td>{{ $producto->liga }}</td>
                <td>{{ $producto->type }}</td>
                <td>{{ number_format($producto->price, 2) }}€</td>
                <td>
                    <div class="d-flex justify-content-center gap-2">
                        <!-- Botón de Editar -->
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editProductModal{{ $producto->id }}">
                            <i class="bi bi-pencil-square"></i> Editar
                        </button>

                        <!-- Botón de Eliminar -->
                        <form action="{{ route('products.destroy', $producto->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Eliminar
                            </button>
                        </form>
                    </div>
                </td>
            </tr>

            <!-- Modal para Editar Producto -->
            <div class="modal fade" id="editProductModal{{ $producto->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                            <h5 class="modal-title">Editar Producto: {{ $producto->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('products.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-body p-4">
                                <div class="row g-4">
                                    <!-- Nombre del producto -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" class="form-label fw-bold">Nombre del producto</label>
                                            <input type="text" name="name" id="name" class="form-control" value="{{ $producto->name }}" required>
                                        </div>
                                    </div>

                                    <!-- Precio -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price" class="form-label fw-bold">Precio</label>
                                            <input type="number" name="price" id="price" class="form-control" value="{{ $producto->price }}" step="0.01" required>
                                        </div>
                                    </div>

                                    <!-- Liga -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="liga" class="form-label fw-bold">Liga</label>
                                            <select name="liga" class="form-select">
                                                <option value="Premier League" {{ $producto->liga == 'Premier League' ? 'selected' : '' }}>Premier League</option>
                                                <option value="LaLiga" {{ $producto->liga == 'LaLiga' ? 'selected' : '' }}>LaLiga</option>
                                                <option value="Serie A" {{ $producto->liga == 'Serie A' ? 'selected' : '' }}>Serie A</option>
                                                <option value="Bundesliga" {{ $producto->liga == 'Bundesliga' ? 'selected' : '' }}>Bundesliga</option>
                                                <option value="Ligue 1" {{ $producto->liga == 'Ligue 1' ? 'selected' : '' }}>Ligue 1</option>
                                                <option value="Eredivise" {{ $producto->liga == 'Eredivise' ? 'selected' : '' }}>Eredivise</option>
                                                <option value="Liga AFA" {{ $producto->liga == 'Liga AFA' ? 'selected' : '' }}>Liga AFA</option>
                                                <option value="Selección" {{ $producto->liga == 'Selección' ? 'selected' : '' }}>Selección</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Tipo -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type" class="form-label fw-bold">Tipo</label>
                                            <select name="type" class="form-select">
                                                <option value="Retro" {{ $producto->type == 'Retro' ? 'selected' : '' }}>Retro</option>
                                                <option value="Exclusivo" {{ $producto->type == 'Exclusivo' ? 'selected' : '' }}>Exclusivo</option>
                                                <option value="Estandar" {{ $producto->type == 'Estandar' ? 'selected' : '' }}>Estandar</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Descripción -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="description" class="form-label fw-bold">Descripción</label>
                                            <textarea name="description" id="description" class="form-control" rows="4">{{ $producto->description }}</textarea>
                                        </div>
                                    </div>

                                    <!-- Imagen -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="image" class="form-label fw-bold">Imagen</label>
                                            <input type="file" name="image" id="image" class="form-control">
                                            @if ($producto->image)
                                            <div class="mt-2">
                                                <small class="text-muted">Imagen actual:</small>
                                                <img src="{{ asset('img/' . $producto->image) }}" alt="Imagen actual" class="img-thumbnail mt-2" style="max-height: 100px">
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer bg-light">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </div>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="addProductModalLabel">Añadir Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Formulario con soporte para subida de archivos -->
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4">
                    <div class="row g-4">
                        <!-- Nombre del producto -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="form-label fw-bold">Nombre del producto</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                        </div>

                        <!-- Precio -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price" class="form-label fw-bold">Precio</label>
                                <input type="number" name="price" id="price" class="form-control" step="0.01" required>
                            </div>
                        </div>

                        <!-- Liga -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="liga" class="form-label fw-bold">Liga</label>
                                <select name="liga" class="form-select" required>
                                    <option value="" disabled selected>Selecciona una liga</option>
                                    <option value="Premier League">Premier League</option>
                                    <option value="LaLiga">LaLiga</option>
                                    <option value="Serie A">Serie A</option>
                                    <option value="Bundesliga">Bundesliga</option>
                                    <option value="Ligue 1">Ligue 1</option>
                                    <option value="Eredivise">Eredivise</option>
                                    <option value="Liga AFA">Liga AFA</option>
                                    <option value="Selección">Selección</option>
                                </select>
                            </div>
                        </div>

                        <!-- Tipo -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type" class="form-label fw-bold">Tipo</label>
                                <select name="type" class="form-select" required>
                                    <option value="" disabled selected>Selecciona un tipo</option>
                                    <option value="Retro">Retro</option>
                                    <option value="Exclusivo">Exclusivo</option>
                                    <option value="Estandar">Estandar</option>
                                </select>
                            </div>
                        </div>

                        <!-- Descripción -->
                        <div class="col-12">
                            <div class="form-group">
                                <label for="description" class="form-label fw-bold">Descripción</label>
                                <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                            </div>
                        </div>

                        <!-- Imagen -->
                        <div class="col-12">
                            <div class="form-group">
                                <label for="image" class="form-label fw-bold">Imagen del Producto</label>
                                <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="previewImage(event)">
                                <img id="imagePreview" src="#" alt="Vista previa" class="mt-3 img-fluid d-none" style="max-width: 200px;">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Añadir Producto</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Script para vista previa de la imagen -->
<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

                    </div>
                </div>
            </div>

        </div>
    </section>
</body>

</html>