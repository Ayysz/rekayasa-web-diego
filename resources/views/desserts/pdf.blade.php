<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Data Master Dessert</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
            padding: 0;
            color: #d81b60; /* Pink theme */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #fce4ec; /* Light pink background */
            font-weight: bold;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Data Master Dessert</h2>
        <p>Diego Dessert untuk Diet</p>
    </div>

    <table>
        <thead>
            <tr>
                <th class="text-center" width="5%">No</th>
                <th width="15%">Gambar</th>
                <th width="20%">Nama Dessert</th>
                <th width="25%">Komposisi</th>
                <th width="15%">Kategori</th>
                <th width="20%" class="text-right">Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($desserts as $index => $dessert)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">
                        @if (filter_var($dessert->gambar, FILTER_VALIDATE_URL))
                            <img src="{{ $dessert->gambar }}" alt="Gambar" width="50" height="50" style="object-fit: cover; border-radius: 4px;">
                        @else
                            <span style="color: #999;">-</span>
                        @endif
                    </td>
                    <td>{{ $dessert->nama_dessert }}</td>
                    <td>{{ $dessert->komposisi }}</td>
                    <td>{{ $dessert->kategori }}</td>
                    <td class="text-right">Rp {{ number_format($dessert->harga, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <p style="text-align: right; margin-top: 30px;">
        Dicetak pada: {{ date('d-m-Y H:i') }}
    </p>
</body>
</html>
