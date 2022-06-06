<div class="card">
    <!-- /.card-header -->

    <div class="card-body table-responsive p-0" style="max-height: 700px;">
        <table class="table table-hover table-head-fixed text-nowrap table-bordered">
            <thead>
                <tr>
                    <th class="align-middle">ID *</th>
                    <th class="align-middle">NIM</th>
                    <th class="align-middle">Nama Mahasiswa</th>
                    <th class="align-middle">CV</th>
                    <th class="align-middle">Transkrip Nilai</th>
                    <th class="align-middle">Surat Keterangan</th>
                    <th class="align-middle">Foto Kandidat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mahasiswa as $mahasiswa)
                    <tr>
                        <td class="align-middle">{{$mahasiswa->id}}</td>
                        <td class="align-middle">{{$mahasiswa->nim_mhs}}</td>
                        <td class="align-middle">{{$mahasiswa->nama_mhs}}</td>
                        @if($mahasiswa->cv == null)
                        <td class="align-middle">Belum Ada CV</td>
                        @else
                        <td class="align-middle"><a href="storage/{{$mahasiswa->cv}}" target="_blank">Unduh CV</a></td>
                        @endif
                        @if($mahasiswa->transkrip_nilai == null)
                        <td class="align-middle">Belum Ada Transkrip Nilai</td>
                        @else
                        <td class="align-middle"><a href="storage/{{$mahasiswa->transkrip_nilai}}" target="_blank">Unduh Transkrip Nilai</a></td>
                        @endif
                        @if($mahasiswa->sk == null)
                        <td class="align-middle">Belum Ada Surat Keterangan</td>
                        @else
                        <td class="align-middle"><a href="storage/{{$mahasiswa->sk}}" target="_blank">Unduh Surat Keterangan</a></td>
                        @endif
                        @if(!empty($mahasiswa->foto))
                        <td class="align-middle"><a href="storage/{{$mahasiswa->foto}}" target="_blank">Unduh Foto</a></td>
                        @else
                        <td class="align-middle">Belum Ada Foto</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

</div>
<!-- /.card -->