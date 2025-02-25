<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura GolZone</title>
    <link rel="stylesheet" href="{{ public_path('css/factura.css') }}"></head>

<body>
    <div class="container">
        <div class="header">
            <div class="logo-section">
                <div class="logo">GolZone S.L.</div>
                <div class="company-info">
                    <div>Zona de Actividades Logísticas, Sevilla, España</div>
                    <div>Tel: +34 123456789 | Email: golzone@empresasl.com</div>
                </div>
            </div>
            <div class="invoice-details">
                <div class="invoice-number">FACTURA #{{ rand(10000, 99999) }}</div>
                <div class="details-row">
                    <span class="details-label">Fecha:</span>
                    <span>{{ $fecha }}</span>
                </div>
                <div class="details-row">
                    <span class="details-label">Vencimiento:</span>
                    <span>{{ $fecha }}</span>
                </div>
            </div>
        </div>

        <div class="section-title">Información del Cliente</div>
        <div class="client-info">
            <div class="client-grid">
                <div>
                    <span class="info-label">Nombre:</span>
                    <span>{{ $user->name }}</span>
                </div>
                <div>
                    <span class="info-label">Email:</span>
                    <span>{{ $user->email }}</span>
                </div>
                <div>
                    <span class="info-label">Teléfono:</span>
                    <span>{{ $user->phone ?? 'No disponible' }}</span>
                </div>
            </div>
        </div>

        <div class="section-title">Detalles de la Factura</div>
        <table>
            <thead>
                <tr>
                    <th width="40%">Producto</th>
                    <th class="text-right" width="15%">Cantidad</th>
                    <th class="text-right" width="20%">Precio Unit. (sin IVA)</th>
                    <th class="text-right" width="25%">Total (sin IVA)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                <tr>
                    <td>{{ $item->product->name ?? 'Sin nombre' }}</td>
                    <td class="text-right">{{ $item->quantity ?? 0 }}</td>
                    <td class="text-right">
                        {{ isset($item->product->price) ? number_format($item->product->price / 1.21, 2) : '0.00' }}€
                    </td>
                    <td class="text-right">
                        {{ isset($item->product->price) ? number_format(($item->product->price / 1.21) * $item->quantity, 2) : '0.00' }}€
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="payment-summary">
            <div class="payment-info">
                <div class="section-title">Método de Pago</div>
                <div><span class="info-label">Método:</span> Transferencia bancaria</div>
                <div><span class="info-label">Banco:</span> Banco Santander</div>
                <div><span class="info-label">Titular:</span> GolZone S.L.</div>
                <div><span class="info-label">IBAN:</span> ES00 0000 0000 0000 0000 0000</div>
            </div>
            
            <div class="subtotal-section">
                <div class="section-title">Resumen</div>
                <div class="subtotal-row">
                    <span>Subtotal:</span>
                    <span>{{ number_format($subtotal, 2) }}€</span>
                </div>
                <div class="subtotal-row">
                    <span>IVA (21%):</span>
                    <span>{{ number_format($subtotal * 0.21, 2) }}€</span>
                </div>
                <div class="total-row">
                    <span>Total:</span>
                    <span>{{ number_format($subtotal * 1.21, 2) }}€</span>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>Gracias por confiar en GolZone S.L. | CIF: B00000000 | Este documento sirve como factura oficial y es válido sin firma ni sello.</p>
        </div>
    </div>
</body>

</html>