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
                    <th class=" align-middle">ID *</th>
                    <th class=" align-middle">NIM</th>
                    <th class=" align-middle">Nama Kandidat</th>
                    <th class=" align-middle">CV</th>
                    <th class=" align-middle">Transkrip Nilai</th>
                    <th class=" align-middle">Surat Pengantar</th>
                    <th class=" align-middle">Foto</th>
                    <th class="text-center vertical-center">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kandidat as $kandidat)
                <tr>
                    <td class=" align-middle">{{$kandidat->id}}</td>
                    <td class=" align-middle">{{$kandidat->nim}}</td>
                    <td class=" align-middle">{{$kandidat->nama}}</td>
                    <td class=" align-middle">Belum Ada Data</td>
                    <td class=" align-middle">Belum Ada Data</td>
                    <td class=" align-middle">Belum Ada Data</td>
                    <td class=" align-middle">Belum Ada Data</td>
                    <td class="text-center align-middle">
                    <a href="#" wire:click.prevent="ubah({{$kandidat->id}})" class="btn btn-primary" title="Edit Data">
                        <i class="fa fa-pencil-alt"></i>
                    </a>
                    <a href="#" onclick="deleteConfirmation(event, {{$kandidat->id}})" wire.click="" class="btn btn-danger"
                        title="Hapus Data">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

</div>
<!-- /.card -->