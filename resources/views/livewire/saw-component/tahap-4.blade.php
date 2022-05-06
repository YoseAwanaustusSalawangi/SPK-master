<div class="container">
		<center>
			<h4>Data Calon Kandidat Pimpinana Lembaga Kemahasiswaan</h4>
		</center>
		<br/>
        <h5>A. Tabel Data Dasar</h5>
		<table class='table table-bordered'>
			<thead>
            <tr>
            <tr>
                <th class="text-center align-middle">No.</th>
                @foreach($header as $h)
                    <th class="text-center align-middle">
                        {!! $h !!}
                    </th>
                @endforeach
            </tr>
            </tr>
			</thead>
			<tbody>
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
			</tbody>
		</table>
        <br/>
        <h5>B. Tabel Data Normalisasi</h5>
		<table class='table table-bordered'>
			<thead>
            <tr>
            <tr>
                <th class="text-center align-middle">No.</th>
                @foreach($header as $h)
                    <th class="text-center align-middle">
                        {!! $h !!}
                    </th>
                @endforeach
            </tr>
            </tr>
			</thead>
			<tbody>
            @foreach ($data_dasar as $key => $data)
                    <tr>
                        <td class="text-center align-middle">{{$key+1}}</td>
                        <td class="text-center align-middle">{{$data['kandidat']->nim}}</td>
                        <td class="text-center align-middle">{{$data['kandidat']->nama}}</td>
                        <td class="text-center align-middle">= {{$data['ipk']->value}} / {{$data['ipk_base']}} = {{number_format($data['ipk_result'], 2, ".", ",")}} </td>
                        <td class="text-center align-middle">= {{$data['keaktifan']->value}} / {{$data['keaktifan_base']}} = {{number_format($data['keaktifan_result'], 2, ".", ",")}} </td>
                        <td class="text-center align-middle">= {{$data['pengalaman_menjabat']->value}} / {{$data['pengalaman_menjabat_base']}} = {{number_format($data['pengalaman_menjabat_result'], 2, ".", ",")}} </td>
                        <td class="text-center align-middle">= {{$data['kesehatan']->value}} / {{$data['kesehatan_base']}} = {{number_format($data['kesehatan_result'], 2, ".", ",")}} </td>
                        <td class="text-center align-middle">= {{$data['komunikasi']->value}} / {{$data['komunikasi_base']}} = {{number_format($data['komunikasi_result'], 2, ".", ",")}} </td>
                        <td class="text-center align-middle">= {{$data['problem_solving']->value}} / {{$data['problem_solving_base']}} = {{number_format($data['problem_solving_result'], 2, ".", ",")}} </td>
                        <td class="text-center align-middle">= {{$data['kedisiplinan']->value}} / {{$data['kedisiplinan_base']}} = {{number_format($data['kedisiplinan_result'], 2, ".", ",")}} </td>
                        <td class="text-center align-middle">= {{$data['visi_misi']->value}} / {{$data['visi_misi_base']}} = {{number_format($data['visi_misi_result'], 2, ".", ",")}} </td>
                    </tr>
                @endforeach
			</tbody>
		</table>
        <br/>
        <h5>C. Tabel Data Perankingan</h5>
		<table class='table table-bordered'>
			<thead>
            <tr>
            <tr>
                @foreach($header_perankingan as $hp)
                    <th class="text-center align-middle">
                        {!! $hp !!}
                    </th>
                @endforeach
            </tr>
            </tr>
			</thead>
			<tbody>
            @foreach ($ranking as $index => $urutan)
                    <tr>
                        <td class="text-center align-middle">{{$urutan}}</td>
                        <td class="text-center align-middle">
                            {{$normalisasi[$index]['kandidat']['nama']}} ({{$normalisasi[$index]['kandidat']['nim']}})
                        </td>
                        <td class="text-center align-middle">
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
                        </td>
                        <td>
                            {{number_format($normalisasi[$index]['skor'], 2, ".", ",")}}
                        </td>

                    </tr>
                @endforeach
			</tbody>
		</table>
	</div>