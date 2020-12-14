<h5>Laporan Harian Kebersihan dan Kerapihan Ruangan Gedung Bersama Maju</h5>
<h5>Hari Kamis Tanggal 12 November 2020 Jam 07.11 WIB</h5>
<p>&lt;&lt;Dicetak pada {{$waktu}} WIB&gt;&gt;</p>


<table>
    <thead>
    <tr class="text-center">
        <th>No</th>
        <th>Ruang</th>
        <th>Nama CS</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($jobs as $job)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$job->nama_ruang}}</td>
            <td>{{$job->nama}}</td>
            <td>{{$job->status}}</td>
        </tr>
    @endforeach
</table>

<p>Approval</p>
<p>&lt;&lt;ttd&gt;&gt;</p>
<p>Nama Manajer</p>
<p>Manajer</p>
