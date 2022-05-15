<!-- general form elements -->
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{$mahasiswa_id ? 'Update' : 'Tambah'}} Kandidat</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="form-group">
            <label for="nim_mhs">NIM</label>
            <input type="number" class="form-control @error('nim_mhs') is-invalid @enderror" wire:model="nim_mhs">
            @error('nim_mhs') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="nama_mhs">Nama Kandidat</label>
            <input type="text" class="form-control @error('nama_mhs') is-invalid @enderror" wire:model="nama_mhs">
            @error('nama_mhs') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <form wire:submit.prevent="save" id="form-upload" enctype="multipart/from-data">
            <div class="form-group">
                <label for="cv">CV Kandidat</label><br>
                <input type="file" class="@error('cv') is-invalid @enderror" wire:model="cv">
                @error('cv') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="foto">Foto Kandidat</label><br>
                <input type="file" class="@error('foto') is-invalid @enderror" wire:model="foto">
                @error('foto') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>
        </form>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary" wire:click.prevent="save()">
            {{$mahasiswa_id ? 'Ubah' : 'Tambah'}}
        </button>
        <button type="submit" class="btn btn-primary" wire:click.prevent="cencel()">
            Batal
        </button>
    </div>
</div>
<!-- /.card -->