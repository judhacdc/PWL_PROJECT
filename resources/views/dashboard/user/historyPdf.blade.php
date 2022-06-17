<!DOCTYPE html>
<html>

<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 16pt;
        }
    </style>
    <center>
        <h2>Laporan History</h4>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$data->user->name}}</td>
                <td>{{number_format($data->total,2)}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
