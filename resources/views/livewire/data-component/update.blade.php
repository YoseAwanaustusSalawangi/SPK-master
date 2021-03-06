<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="text-danger">Hati - Hati dalam mengisi data pastikan data yang akan di masukan atau di unggah sudah benar!!!</h4>
        </div>
      </div>
    </div>
</div>
<!-- general form elements -->
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{$mahasiswa_id ? 'Update' : 'Tambah'}} Kandidat</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        @if($mahasiswa_id)
        <div class="form-group">
            <label for="nim_mhs">NIM</label>
            <input type="number" class="form-control @error('nim_mhs') is-invalid @enderror" wire:model="nim_mhs" readonly>
            @error('nim_mhs') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        @else
        <div class="form-group">
            <label for="nim_mhs">NIM</label>
            <input type="number" class="form-control @error('nim_mhs') is-invalid @enderror" wire:model="nim_mhs" >
            @error('nim_mhs') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        @endif

        <div class="form-group">
            <label for="nama_mhs">Nama Kandidat</label>
            <input type="text" class="form-control @error('nama_mhs') is-invalid @enderror" wire:model="nama_mhs">
            @error('nama_mhs') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="ipk">IPK</label>
            <input type="number" class="form-control @error('ipk') is-invalid @enderror" wire:model="ipk" max="4.00"
                min="0.00" step="0.01">
            @error('ipk') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <form wire:submit.prevent="save" id="form-upload" enctype="multipart/from-data">
            <div class="form-group">
                <label for="cv">CV Kandidat</label><br>
                <input type="file" class="@error('cv') is-invalid @enderror" wire:model="cv">
                @error('cv') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="transkrip_nilai">Transkrip Nilai</label><br>
                <input type="file" class="@error('transkrip_nilai') is-invalid @enderror" wire:model="transkrip_nilai">
                @error('transkrip_nilai') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="sk">Surat Keterangan</label><br>
                <input type="file" class="@error('sk') is-invalid @enderror" wire:model="sk">
                @error('sk') <span class="invalid-feedback">{{ $message }}</span> @enderror
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