<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        @page {
            size: 80mm auto;
            margin: 0;
        }

        .small {
            font-size: 11px;

        }

        .text-center {
            text-align: center;
        }

        .text-bold {
            font-weight: bold;
        }

        .row {
            display: flex;
            justify-content: space-between;

        }

        .divider {
            border-top: 1px dashed black;
            margin: 10px 0;
        }

        .table{
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            padding 5px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: black;
        }

        body {
            font-size: 12px;
            font-family: 'Courier New', Courier, monospace;
        }
    </style>
</head>
<body onload="window.print(); setTimeout(()=>window.close(),500)">
<h3 class="text-center">Perpustakaan PPKD Jakarta Pusat</h3>
<div class="text-center small">Jl.Karet Baru Benhil Jakarta Pusat</div>
<hr>
<div class="divider"></div>

<div class="small">

    <div class="row">
        <span>Nama Peminjam</span>
        <span class="text-bold">{{ $borrow->memberName->nama ?? 'error'}}</span>
    </div>
    <div class="row">
        <span>Kode Transaksi</span>
        <span class="text-bold">{{ $borrow->trans_number ?? 'error' }}</span>
    </div>
    <div class="row">
        <span>Tanggal Pinjam</span>
        <span class="text-bold">{{ \Carbon\Carbon::parse($borrow->created_at)->format('d m Y') }}</span>
    </div>
    <div class="row">
        <span>Tanggal Pengembalian</span>
        <span class="text-bold">{{ \Carbon\Carbon::parse($borrow->return_date)->format('d m Y') }}</span>
    </div>

    <div class="divider"></div>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Judul</th>
                <th>Penerbit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($borrow->detailBorrow as $index => $detailBuku)
                <tr>
                <td>{{ $index+=1 }}</td>
                <td>{{ $detailBuku->books->title}}</td>
                <td>{{ $detailBuku->books->publisher }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <hr>
</div>
</body>
</html>
