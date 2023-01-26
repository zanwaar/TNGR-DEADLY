<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: "source_sans_proregular", Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif;
            font-size: 12px;
        }

        #tael {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #tael td,
        #tael th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #tael tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #tael tr:hover {
            background-color: #ddd;
        }

        #tael th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>
    <p style="text-align:right;">Tanggal <?= date('d F Y'); ?></p>
    <h1>Laporan Pemelian</h1>
    <table id="tael">

        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Tanggal Pembelian</th>
            <th>Invoice</th>
            <th>Total</th>
        </tr>
        <?php $total = 0 ?>
        @foreach ($data as $m )
        <tr>
            <td>{{$m->user->name}}</td>
            <td>{{$m->user->email}}</td>
            <td>{{$m->created_at}}</td>
            <td>{{$m->invoice}}</td>
            <td style="text-align:right;">Rp @convert($m->total)</td>
        </tr>
        <?php $total += ($m->total); ?>
        @endforeach

        <tr>
            <td colspan="4">Jumlah</td>
            <td colspan="1" style="text-align:right;">Rp @convert($total)</td>
        </tr>
    </table>

</body>

</html>