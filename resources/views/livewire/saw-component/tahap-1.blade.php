<div class="card">
    <div class="card-body table-responsive p-0" style="max-height: 700px;">
        <table class="table table-head-fixed text-nowrap table-bordered">
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
                @foreach ($data_dasar as $key => $data)
                    <tr>
                        <td class="text-center align-middle">{{$key+1}}</td>
                        <td class="text-center align-middle">{{$data['kandidat']->nim}}</td>
                        <td class="text-center align-middle">{{$data['kandidat']->nama}}</td>
                        <td class="text-center align-middle">{{$data['ipk']->value}}</td>
                        <td class="text-center align-middle">{{$data['keaktifan']->value}}</td>
                        <td class="text-center align-middle">{{$data['pengalaman_menjabat']->value}}</td>
                        <td class="text-center align-middle">{{$data['kesehatan']->value}}</td>
                        <td class="text-center align-middle">{{$data['komunikasi']->value}}</td>
                        <td class="text-center align-middle">{{$data['problem_solving']->value}}</td>
                        <td class="text-center align-middle">{{$data['kedisiplinan']->value}}</td>
                        <td class="text-center align-middle">{{$data['visi_misi']->value}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
