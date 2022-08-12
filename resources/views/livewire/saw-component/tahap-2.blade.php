<div class="card">
    <div class="card-body table-responsive p-0" style="max-height: 700px;">
        <table class="table table-head-fixed text-nowrap table-bordered table-hover">
            <thead>
            <tr>
                <th class="text-center align-middle">No.</th>
                @foreach($header as $h)
                    <th class="text-center align-middle">
                        {!! $h !!}
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
                @forelse ($data_dasar as $key => $data)
                    <tr>
                        <td class="text-center align-middle">{{$key+1}}</td>
                        <td class="text-center align-middle">{{$data['kandidat']->nim}}</td>
                        <td class="text-center align-middle">{{$data['kandidat']->nama}}</td>
                        <td class="text-center align-middle">{{number_format($data['ipk_result'], 2, ".", ",")}} </td>
                        <td class="text-center align-middle">{{number_format($data['keaktifan_result'], 2, ".", ",")}} </td>
                        <td class="text-center align-middle">{{number_format($data['pengalaman_menjabat_result'], 2, ".", ",")}} </td>
                        <td class="text-center align-middle">{{number_format($data['kesehatan_result'], 2, ".", ",")}} </td>
                        <td class="text-center align-middle">{{number_format($data['komunikasi_result'], 2, ".", ",")}} </td>
                        <td class="text-center align-middle">{{number_format($data['problem_solving_result'], 2, ".", ",")}} </td>
                        <td class="text-center align-middle">{{number_format($data['kedisiplinan_result'], 2, ".", ",")}} </td>
                        <td class="text-center align-middle">{{number_format($data['visi_misi_result'], 2, ".", ",")}} </td>
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
