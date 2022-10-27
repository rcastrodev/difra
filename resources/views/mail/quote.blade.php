<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table, th, td{
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Solicitud de cotización desde el sitio web</h2>
    <div>
        <p><strong>Nombre:</strong> {{ $data['nombre'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        <p><strong>Teléfono:</strong> {{ $data['telefono'] }}</p>
        @isset($data['compania'])
            <p><strong>Empresa:</strong> {{ $data['compania'] }}</p>
        @endisset
        @isset($data['model'])
            <p><strong>Modelo:</strong> {{ $data['model'] }}</p>
        @endisset
        @if ($data['ejex'] || $data['ejey'] || $data['ejez'])
            <div>
                <strong>Área util especial:</strong>
                <table style="margin-top: 5px;">
                    <tr>
                        <td width="80">Eje X</td>
                        <td width="80">Eje Y</td>
                        <td width="80">Eje Z</td>
                    </tr>
                    <tr>
                        <td>{{ $data['ejex'] }}</td>
                        <td>{{ $data['ejey'] }}</td>
                        <td>{{ $data['ejez'] }}</td>
                    </tr>
                </table>
            </div>
        @endif
        @isset($data['power_supply'])
            <p><strong>Alimentación:</strong> {{ $data['power_supply'] }}</p>
        @endisset
        @isset($data['materials_to_work'])
            <p><strong>Materiales a trabajar:</strong> {{ $data['materials_to_work'] }}</p>
        @endisset
        @if ($data['min'] || $data['max'])
            <div>
                <strong>Espesor de materiales:</strong>
                <table style="margin-top: 5px;">
                    <tr>
                        <td width="80">Min</td>
                        <td width="80">Max</td>
                    </tr>
                    <tr>
                        <td>{{ $data['min'] }}</td>
                        <td>{{ $data['max'] }}</td>
                    </tr>
                </table>
            </div>
        @endif
        @isset($data['message'])
            <p><strong>Mensaje:</strong> {{ $data['message'] }}</p>
        @endisset
    </div>
</body>
</html>