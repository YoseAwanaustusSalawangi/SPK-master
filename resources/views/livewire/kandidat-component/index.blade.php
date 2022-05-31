<div class="card">
    <div class="card-header">
        <div class="row">

            <div class="col-3 mt-1">
                <div class="input-group">
                    <button class="btn btn-primary" wire:click="tambah()" title="Tambah Data">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                    <!-- &nbsp;
                    <a href="{{ route('exportPDF') }}" class="btn btn-secondary" target="_blank">Cetak PDF</a> -->
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
                    @foreach($kriterias as $kriteria)
                    <th class="text-center align-middle">
                        {{$kriteria->nama_kriteria}}
                        @if($kriteria->satuan!="-")
                        <br>
                        <span class="text-sm">({{$kriteria->satuan}})</span>
                        @endif
                    </th>
                    @endforeach
                    <th class="text-center vertical-center">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kandidat as $user)
                    <tr>
                        <td class=" align-middle">{{$user->id}}</td>
                        <td class=" align-middle">{{$user->nim}}</td>
                        <td class=" align-middle">{{$user->nama}}</td>
                        @foreach($kriterias as $kriteria)
                        <td class="text-center align-middle">
                            <small>
                                {{$user->currentAtribut($kriteria->id)->caption}}
                            </small>
                        </td>
                        @endforeach
                        <td class="text-center align-middle">
                            <a href="#" wire:click.prevent="edit({{$user->id}})" class="btn btn-primary" title="Edit Data">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <a href="#" onclick="deleteConfirmation(event, {{$user->id}})" wire.click=""
                                class="btn btn-danger" title="Hapus Data">
                                <i class="fa fa-trash"></i>
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