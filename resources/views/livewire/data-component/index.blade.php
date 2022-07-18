<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4>Selamat Datang <b>{{Auth::user()->name}}. </b>Silahkan mengisi data yang diperlukan untuk mengikuti PEMIRA!</h4>
        </div>
      </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-3 mt-1">
                <div class="input-group">
                    <button class="btn btn-primary" wire:click="create()" title="Tambah Data">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-header -->

    <div class="card-body table-responsive p-0" style="max-height: 700px;">
        <table class="table table-hover table-head-fixed text-nowrap table-bordered">
            <thead>
                <tr>
                    <th class="align-middle">ID *</th>
                    <th class="align-middle">NIM</th>
                    <th class="align-middle">Nama Mahasiswa</th>
                    @foreach($kriterias as $kriteria)
                    <th class="text-center align-middle">
                        {{$kriteria->nama_kriteria}}
                        @if($kriteria->satuan!="-")
                        <br>
                        <span class="text-sm">({{$kriteria->satuan}})</span>
                        @endif
                    </th>
                    @endforeach
                    <th class="text-center align-middle">CV</th>
                    <th class="text-center align-middle">Transkrip Nilai</th>
                    <th class="text-center align-middle">Surat Keterangan</th>
                    <th class="text-center align-middle">Foto Kandidat</th>
                    <th class="text-center vertical-center">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mahasiswa as $mahasiswa)
                    <tr>
                        <td class="align-middle">{{$mahasiswa->id}}</td>
                        <td class="align-middle">{{$mahasiswa->nim_mhs}}</td>
                        <td class="align-middle">{{$mahasiswa->nama_mhs}}</td>
                        <td class="align-middle">{{$mahasiswa->ipk}}</td>
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
                        <td class="text-center align-middle">
                            <!-- <a href="#" wire:click.prevent="" class="btn btn-success"
                                title="Verifikasi">
                                <i class="fas fa-check"></i>
                            </a>
                            <a href="#" wire:click.prevent="" class="btn btn-danger"
                                title="Batalkan Verifikasi">
                                <i class="fas fa-times"></i>
                            </a> -->
                            <a href="#" wire:click.prevent="ubah({{$mahasiswa->id}})" class="btn btn-primary"
                                title="Edit Data">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="#" onclick="deleteConfirmation(event, {{$mahasiswa->id}})" wire.click=""
                                class="btn btn-danger" title="Hapus Data">
                                <i class="fa fa-eraser"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr class="">
                        <td colspan="16">
                            <strong class="text-danger"><center>Data Belum Ada!!!</center></strong>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

</div>
<!-- /.card -->