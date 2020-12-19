<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>laporan</title>
</head>

<style>
    .title {}

    title.h5 {
        font-weight: bold
    }

    .table1 {
        color: #232323;
        border-collapse: collapse;
        font-size: 13px;
    }

    .table1,
    th,
    td {
        border: 1px solid rgb(0, 0, 0);
        padding: 5px 5px;
    }

</style>

<body>
    <div class="title">
        <center>
            <h4>Laporan Harian Kebersihan dan Kerapihan Ruangan Gedung Bersama Maju</h4>
            <h4>Hari {{$waktu_tugas}}</h4>
            <p>&lt;&lt;Tanggal Cetak {{$tanggal}} Jam {{$waktu}} WIB&gt;&gt;</p>
        </center>
    </div>

    <center>
        <table class="table1">
            <thead>
                <tr class="text-center">
                    <th width="10px">No</th>
                    <th width="190px">Ruang</th>
                    <th width="250px">Nama CS</th>
                    <th width="198px">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$job->nama_ruang}}</td>
                    <td>{{$job->nama_cs}}</td>
                    <td>{{$job->old_status}}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
    </center>
    <div class="row">
        <div class="col" style="margin-left: 73%">
            <p>Approval</p>
            <p>&lt;&lt;ttd&gt;&gt;</p>
            <p>{{ Auth::user()->nama }}</p>
            <p>Manager</p>
        </div>
    </div>
    </div>

</body>

</html>
