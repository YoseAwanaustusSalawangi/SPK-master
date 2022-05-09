<div class="form-group">
    <center>
        <h3>Data Calon Kandidat Pimpinana Lembaga Kemahasiswaan</h3>
    </center>

    <table class="table table-static" align="center" rules="all" border="1px" style="width: 95%;">
        <thead>
            <tr>
            <tr>
                <th class="text-center align-middle">No.</th>
                <th class="text-center align-middle">Id*</th>
                <th class="text-center align-middle">Nim Kandidat</th>
                <th class="text-center align-middle">Nama Kandidat</th>
            </tr>
            </tr>
            </tr>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td align="center">{{ $loop->iteration }}</td>
                <td align=" center">{{$user->id}}</td>
                <td align=" center">{{$user->nim}}</td>
                <td align=" center">{{$user->nama}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>