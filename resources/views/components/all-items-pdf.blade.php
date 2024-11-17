<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $page_title }}</title>
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">
    <style>
        h1 {
            font-size: 25px;
        }
    </style>
</head>

<body>
    <h1 class="text-center">Laporan Inventaris Jurusan Pengembangan Perangkat Lunak dan Gim Tahun Ajaran
        {{ date('Y') . '/' . date('Y') + 1 }}</h1>
    <p class="text-center fw-bold">Kategori : Semua Barang</p>
    <p class="text-center">Kakom : M Zubaidi S.kom, Toolman : M Dzaki Ardiansyah</p>
    <hr>
    <br>
    <div class="table-responsive">
        <table class="table table-lg">
            <thead>
                <tr>
                    <th>NAMA BARANG</th>
                    <th>JUMLAH</th>
                    <th>STATUS</th>
                    <th>TEMPAT</th>
                    <th>DESKRIPSI BARANG</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allItems as $item)
                    <tr>
                        <td class="text-bold-500">{{ $item->item_name }}</td>
                        <td>{{ $item->amount }}</td>
                        <td>
                            {{ $item->status == 'active' ? 'Aktif' : ($item->status == 'broken' ? 'Rusak' : ($item->status == 'mainten' ? 'Perbaikan' : ($item->status == 'stock' ? 'Stok' : ''))) }}
                        </td>
                        <td class="text-bold-500">{{ $item->place }}</td>
                        <td class="text-bold-500">{{ $item->description }}</td>>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
