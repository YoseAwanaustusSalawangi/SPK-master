<div class="card">
    <div class="card-body table-responsive p-0" style="max-height: 700px;">
        <table class="table table-head-fixed text-nowrap table-bordered table-hover">
            <thead>
            <tr>
                @foreach($header_perankingan as $hp)
                    <th class="text-center align-middle">
                        {!! $hp !!}
                    </th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @if($error_messages!='')
                <tr>
                    <td>
                        <div class="alert alert-danger">
                            {{$error_messages}}
                        </div>
                    </td>
                </tr>
            @else
                @forelse ($ranking as $index => $urutan)
                    <tr>
                        <td class="text-center align-middle">{{$urutan}}</td>
                        <td class="text-center align-middle">
                            {{$normalisasi[$index]['kandidat']['nama']}} ({{$normalisasi[$index]['kandidat']['nim']}})
                        </td>
                        <!-- <td class="text-center align-middle">
                            ({{number_format($normalisasi[$index]['ipk_result'], 2, ".", ",")}}x{{$kriteria['ipk']}}%)
                            +
                            ({{number_format($normalisasi[$index]['keaktifan_result'], 2, ".", ",")}}x{{$kriteria['keaktifan']}}%)
                            +
                            ({{number_format($normalisasi[$index]['pengalaman_menjabat_result'], 2, ".", ",")}}x{{$kriteria['pengalaman_menjabat']}}%)
                            +
                            ({{number_format($normalisasi[$index]['kesehatan_result'], 2, ".", ",")}}x{{$kriteria['kesehatan']}}%)
                            +
                            ({{number_format($normalisasi[$index]['komunikasi_result'], 2, ".", ",")}}x{{$kriteria['komunikasi']}}%)
                            +
                            ({{number_format($normalisasi[$index]['problem_solving_result'], 2, ".", ",")}}x{{$kriteria['problem_solving']}}%)
                            +
                            ({{number_format($normalisasi[$index]['kedisiplinan_result'], 2, ".", ",")}}x{{$kriteria['kedisiplinan']}}%)
                            +
                            ({{number_format($normalisasi[$index]['visi_misi_result'], 2, ".", ",")}}x{{$kriteria['visi_misi']}}%)
                        </td> -->
                        <td class="text-center align-middle">
                            {{number_format($normalisasi[$index]['skor'], 2, ".", ",")}}
                        </td>
                        @if($urutan <= 4)
                        <td class="text-success">
                            <center><b>Lolos</b></center>
                        </td>
                        @else
                        <td class="text-danger">
                            <center><b>Gagal</b></center>
                        </td>
                        @endif
                    </tr>
                    @empty
                    <tr class="">
                        <td colspan="16">
                            <strong class="text-danger"><center>Data Belum Ada!!!</center></strong>
                        </td>
                    </tr>
                @endforelse
            @endif

            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

</div>
<!-- /.card -->