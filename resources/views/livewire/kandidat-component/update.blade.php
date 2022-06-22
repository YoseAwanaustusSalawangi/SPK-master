<!-- general form elements -->


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{$kandidat_id ? 'Update' : 'Tambah'}} Kandidat</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        
        <div class="form-group">
            <label for="nim">NIM</label>
            <select wire:model="nim" id="" class="form-control @error('nim') is-invalid @enderror" wire:click="getMahasiswaNim($event.target.value)">
                <option value="">--Pilih Nim--</option>
                @foreach($mahasiswaLists as $mahasiswa)
                    <option value="{{$mahasiswa->nim_mhs}}">{{$mahasiswa->nim_mhs}}</option>
                @endforeach
            </select>
            @error('nim') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        
        <div class="form-group">
            <label for="nama">Nama Kandidat</label>
            <input type="text" id="Nama"  class="form-control @error('nama') is-invalid @enderror" wire:model="nama" readonly>
            @error('nama') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="ipk">IPK</label>
            <input type="number" id="Ipk" class="form-control @error('ipk') is-invalid @enderror" wire:model="ipk" max="4.00"
                min="0.00" step="0.01" readonly>
            @error('ipk') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="keaktifan">Keaktifan</label>
            <input type="number" class="form-control @error('keaktifan') is-invalid @enderror" wire:model="keaktifan"
                max="100" min="0" step="01">
            @error('keaktifan') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="pengalaman_menjabat">Pengalaman Menjabat</label>
            <input type="number" class="form-control @error('pengalaman_menjabat') is-invalid @enderror"
                wire:model="pengalaman_menjabat" max="100" min="0" step="01">
            @error('pengalaman_menjabat') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="kesehatan">Kesehatan</label>
            <input type="number" class="form-control @error('kesehatan') is-invalid @enderror" wire:model="kesehatan"
                max="100" min="0" step="01">
            @error('kesehatan') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="komunikasi">Komunikasi</label>
            <input type="number" class="form-control @error('komunikasi') is-invalid @enderror" wire:model="komunikasi"
                max="100" min="0" step="01">
            @error('komunikasi') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="problem_solving">Problem-Solving</label>
            <input type="number" class="form-control @error('problem_solving') is-invalid @enderror"
                wire:model="problem_solving" max="100" min="0" step="01">
            @error('problem_solving') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="kedisiplinan">Kedisiplinan</label>
            <input type="number" class="form-control @error('kedisiplinan') is-invalid @enderror"
                wire:model="kedisiplinan" max="100" min="0" step="01">
            @error('kedisiplinan') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="visi_misi">Visi Misi</label>
            <input type="number" class="form-control @error('visi_misi') is-invalid @enderror" wire:model="visi_misi"
                max="100" min="0" step="01">
            @error('visi_misi') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary" wire:click.prevent="simpan()">
            {{$kandidat_id ? 'Ubah' : 'Tambah'}}
        </button>
        <button type="submit" class="btn btn-primary" wire:click.prevent="batal()">
            Batal
        </button>
    </div>

</div>






<!-- /.card -->