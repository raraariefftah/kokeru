<h5>Laporan Harian Kebersihan dan Kerapihan Ruangan Gedung Bersama Maju</h5>
<h4>Hari {{$waktu_tugas}}</h4>
<p>&lt;&lt;Tanggal Cetak {{$tanggal}} Jam {{$waktu}} WIB&gt;&gt;</p>


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
            <td>{{$job->nama_cs}}</td>
            <td>{{$job->old_status}}</td>
        </tr>
    @endforeach
</table>

<p>Approval</p>
<p>&lt;&lt;ttd&gt;&gt;</p>
<p>{{ Auth::user()->nama }}</p>
<p>Manager</p>
