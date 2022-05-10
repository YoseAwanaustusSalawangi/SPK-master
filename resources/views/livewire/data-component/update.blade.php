<!-- general form elements -->
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{$kandidat_id ? 'Update' : 'Tambah'}} Kandidat</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="number" class="form-control @error('nim') is-invalid @enderror" wire:model="nim">
            @error('nim') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="nama">Nama Kandidat</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" wire:model="nama">
            @error('nama') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary" wire:click.prevent="save()">
            {{$kandidat_id ? 'Ubah' : 'Tambah'}}
        </button>
        <button type="submit" class="btn btn-primary" wire:click.prevent="cencel()">
            Batal
        </button>
    </div>
</div>
<!-- /.card -->