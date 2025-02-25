<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        .container {
            width: 100%;
            padding: 20px;
        }

        .header,
        .footer {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="header">Factura</h2>
        <p><strong>Fecha:</strong> {{ $fecha }}</p>

        <h4>Cliente:</h4>
        <p>Nombre: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <p>Teléfono: {{ $user->phone ?? 'No disponible' }}</p>

        <h4>GolZone S.L.</h4>
        <p>Email: golzone@empresasl.com</p>
        <p>Tel: +34 123456789</p>
        <p>Dirección: Zona de Actividades Logísticas, Sevilla</p>

        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario (sin IVA)</th>
                    <th>Total (sin IVA)</th>
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
            <tfoot>
                <tr>
                    <td colspan="3" class="text-right"><strong>IVA (21%)</strong></td>
                    <td class="text-right">{{ number_format($subtotal * 0.21, 2) }}€</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right"><strong>Total</strong></td>
                    <td class="text-right"><strong>{{ number_format($subtotal * 1.21, 2) }}€</strong></td>
                </tr>
            </tfoot>
        </table>

        <h4>Método de pago:</h4>
        <p>Transferencia bancaria - Banco Santander</p>
        <p>GolZone S.L.</p>
    </div>
</body>

</html>
