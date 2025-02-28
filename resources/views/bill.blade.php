@extends('layouts.app')

@section('title', 'Factura - GolZone')

@section('head')
    <link rel="stylesheet" href="{{ asset('css/bill.css') }}">
@endsection

@section('content')
    <div class="container my-5">
        <div class="invoice-box">
            <h1 class="text-center">Factura</h1>

            <div class="d-flex justify-content-between mb-4">
                <!-- Información del cliente -->
                <div class="customer-info text-start">
                    <h4>Información del Cliente</h4>
                    <p><strong>Nombre:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Teléfono:</strong> {{ Auth::user()->phone ?? 'No disponible' }}</p>
                    <p><strong>Dirección:</strong> 
                        {{ Auth::user()->address->street ?? 'No disponible' }}, 
                        {{ Auth::user()->address->city ?? '' }},
                        {{ Auth::user()->address->state ?? '' }} 
                        ({{ Auth::user()->address->postal_code ?? '' }})
                    </p>
                    <p><strong>País:</strong> {{ Auth::user()->address->country ?? 'No disponible' }}</p>
                </div>
            
                <!-- Línea divisoria vertical -->
                <div class="vr mx-3"></div>
            
                <!-- Información de la empresa -->
                <div class="company-info text-end">
                    <h4>GolZone S.L.</h4>
                    <p>golzone@empresasl.com</p>
                    <p>+34 123456789</p>
                    <p>Zona de Actividades Logísticas (ZAL)</p>
                    <p>C. Esclusa, s/n, 41011 Sevilla</p>
                </div>
            </div>

            <hr>

            <!-- Tabla de la factura -->
            <table class="table table-bordered mt-4">
                <thead class="table-dark">
                    <tr>
                        <th class="text-start">Producto</th>
                        <th class="text-start">Cantidad</th>
                        <th class="text-start">Precio Unitario (sin IVA)</th>
                        <th class="text-start">Total (sin IVA)</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $subtotal = 0;
                    @endphp
                    @foreach ($cartItems as $item)
                        @php
                            $precioSinIVA = ($item->price / $item->quantity) / 1.21; // ✅ Ahora sí es el precio unitario correcto
                            $totalProducto = $precioSinIVA * $item->quantity; // ✅ Ahora sí es el total por producto
                            $subtotal += $totalProducto; // 🔴 Sumamos correctamente el total
                        @endphp
                        <tr>
                            <td class="text-start">{{ $item->product->name }}</td>
                            <td class="text-end">{{ $item->quantity }}</td>
                            <td class="text-end">{{ number_format($precioSinIVA, 2) }}€</td>
                            <td class="text-end">{{ number_format($totalProducto, 2) }}€</td>
                            <!-- ✅ Ahora sí es el total por producto -->
                        </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-end"><strong>IVA (21%)</strong></td>
                        <td class="text-end">{{ number_format($subtotal * 0.21, 2) }}€</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-end"><strong>TOTAL</strong></td>
                        <td class="text-end"><strong>{{ number_format($subtotal * 1.21, 2) }}€</strong></td>
                        <!-- ✅ Ahora se calcula correctamente -->
                    </tr>
                </tfoot>

            </table>
            <!-- Botón único para descargar PDF y volver a la tienda -->
            <a href="{{ route('factura.pdf') }}" id="downloadPdfButton" class="btn btn-danger mt-3">
                Descargar PDF y volver
            </a>



            <!-- Ajustar el ancho del IVA y TOTAL -->
            <style>
                .table tfoot tr td {
                    width: 150px;
                    /* Ancho específico para las filas de IVA y TOTAL */
                }
            </style>

            <!-- Información de pago -->
            <div class="payment-info mt-4">
                <h4>Información de Pago</h4>
                <p><strong>Método:</strong> Transferencia bancaria</p>
                <p><strong>Banco:</strong> Banco Santander</p>
                <p><strong>Nombre:</strong> GolZone S.L.</p>
                <p><strong>Fecha de la compra:</strong> {{ now()->setTimezone('Europe/Madrid')->format('d/m/Y H:i') }}</p>
                <!-- Formato de fecha en zona horaria de España -->
            </div>
        </div>

        <script>
            document.getElementById('downloadPdfButton').addEventListener('click', function() {
                // Después de 2 segundos, redirige a la tienda (para dar tiempo a que inicie la descarga)
                setTimeout(function() {
                    window.location.href = "{{ route('products.index') }}";
                }, 2000);
            });
        </script>


    </div>
@endsection
