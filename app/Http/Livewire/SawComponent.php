<?php

namespace App\Http\Livewire;

use App\Models\Atribut;
use App\Models\Kriteria;
use App\Models\Kandidat;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;
use PDF;
use Auth;

class SawComponent extends Component
{
    public $error_messages='';
    public $header;
    protected $kriteria;
    protected $data_dasar;
    protected $normalisasi;
    protected $ranking;
    public $step=1;
    public $stepLists = [
        'Data Dasar', 'Normalisasi', 'Perankingan'
    ];
    public $bobot;

    public function render()
    {
        $this->setup();

        return view('livewire.saw-component', [
            'kriteria' => $this->kriteria,
            'data_dasar' => $this->data_dasar,
            'normalisasi' => $this->normalisasi,
            'ranking' => $this->ranking,
        ]);
    }

    public function setup()
    {
        $this->setupKriteria();
        $this->setupHeader();
        $this->setupHeaderPerankingan();
        $this->setupDataDasar();
        $this->setupNormalisasi();
        $this->setupPerankingan();
    }

    public function setupKriteria()
    {
        $this->kriteria = [
            'ipk' => Kriteria::find(1)->bobot,
            'keaktifan' => Kriteria::find(2)->bobot,
            'pengalaman_menjabat' => Kriteria::find(3)->bobot,
            'kesehatan' => Kriteria::find(4)->bobot,
            'komunikasi' => Kriteria::find(5)->bobot,
            'problem_solving' => Kriteria::find(6)->bobot,
            'kedisiplinan' => Kriteria::find(7)->bobot,
            'visi_misi' => Kriteria::find(8)->bobot
        ];
    }

    public function setupHeader()
    {
        $this->header = [
            "NIM",
            "Nama Kandidat",
            "IPK",
            "Keaktifan",
            "Pengalaman Menjabat",
            "Kesehatan",
            "Komunikasi",
            "Problem-Solving",
            "Kedisiplinan",
            "Visi Misi"
        ];
    }

    public function setupHeaderPerankingan()
    {
        $this->header_perankingan = [
            "Ranking",
            "Nama Kandidat",
            "Perhitungan",
            "Hasil Akhir"
        ];
    }

    public function setupDataDasar()
    {
        if ($this->error_messages != '') return 0;

        $session_id = Auth::user()->id;
        $kandidat = Kandidat::where([
            ['id_user', '=', $session_id],
        ])->get();
        $atributs = Atribut::all();

        $datas = [];
        $errors = '';

        foreach ($kandidat as $kandidat) {
            $ipk = $atributs->filter(function ($atr) use($kandidat) {
                return $atr['kandidat_id']==$kandidat->id && $atr['kriteria_id']==1;
            })->first();
            if (!$ipk) {
                $errors = $this->errorKandidatMessage('IPK', $kandidat);
                break;
            }

            $keaktifan = $atributs->filter(function ($atr) use($kandidat) {
                return $atr['kandidat_id']==$kandidat->id && $atr['kriteria_id']==2;
            })->first();
            if (!$keaktifan) {
                $errors = $this->errorKandidatMessage('Keaktifan', $kandidat);
                break;
            }

            $pengalaman_menjabat = $atributs->filter(function ($atr) use($kandidat) {
                return $atr['kandidat_id']==$kandidat->id && $atr['kriteria_id']==3;
            })->first();
            if (!$pengalaman_menjabat) {
                $errors = $this->errorKandidatMessage('Pengalaman Menjabat', $kandidat);
                break;
            }

            $kesehatan = $atributs->filter(function ($atr) use($kandidat) {
                return $atr['kandidat_id']==$kandidat->id && $atr['kriteria_id']==4;
            })->first();
            if (!$kesehatan) {
                $errors = $this->errorKandidatMessage('Kesehatan', $kandidat);
                break;
            }

            $komunikasi = $atributs->filter(function ($atr) use($kandidat) {
                return $atr['kandidat_id']==$kandidat->id && $atr['kriteria_id']==5;
            })->first();
            if (!$komunikasi) {
                $errors = $this->errorKandidatMessage('Komunikasi', $kandidat);
                break;
            }

            $problem_solving = $atributs->filter(function ($atr) use($kandidat) {
                return $atr['kandidat_id']==$kandidat->id && $atr['kriteria_id']==6;
            })->first();
            if (!$problem_solving) {
                $errors = $this->errorKandidatMessage('Problem-Solving', $kandidat);
                break;
            }

            $kedisiplinan = $atributs->filter(function ($atr) use($kandidat) {
                return $atr['kandidat_id']==$kandidat->id && $atr['kriteria_id']==7;
            })->first();
            if (!$kedisiplinan) {
                $errors = $this->errorKandidatMessage('Kedisiplinan', $kandidat);
                break;
            }

            $visi_misi = $atributs->filter(function ($atr) use($kandidat) {
                return $atr['kandidat_id']==$kandidat->id && $atr['kriteria_id']==8;
            })->first();
            if (!$visi_misi) {
                $errors = $this->errorKandidatMessage('Visi Misi', $kandidat);
                break;
            }

            $data = [
                'kandidat' => $kandidat,
                'ipk' => $ipk,
                'keaktifan' => $keaktifan,
                'pengalaman_menjabat' => $pengalaman_menjabat,
                'kesehatan' => $kesehatan,
                'komunikasi' => $komunikasi,
                'problem_solving' => $problem_solving,
                'kedisiplinan' => $kedisiplinan,
                'visi_misi' => $visi_misi
            ];
            $datas[] = $data;
        }

        $this->error_messages = $errors;

        $this->data_dasar = collect($datas);

    }

    public function setupNormalisasi()
    {
        if ($this->error_messages != '') return 0;
        $datas = $this->data_dasar;
        $first = $datas->first();

        //ipk-> benefit
        if($first!= null)
        {
            $ipk_default = $first['ipk'];
            $ipk_default = $ipk_default ? $ipk_default->real_value : 0;
            $ipk_base = $datas->reduce(function ($acc, $d) {
                return $d['ipk']->real_value > $acc ? $d['ipk']->real_value : $acc;
            }, $ipk_default);
        

            //keaktifan
            $keaktifan_default = $first['keaktifan'];
            $keaktifan_default = $keaktifan_default ? $keaktifan_default->real_value : 0;
            $keaktifan_base = $datas->reduce(function ($acc, $d) {
                return $d['keaktifan']->real_value > $acc ? $d['keaktifan']->real_value : $acc;
            }, $keaktifan_default);

            //pengalaman_menjabat
            $pengalaman_menjabat_default = $first['pengalaman_menjabat'];
            $pengalaman_menjabat_default = $pengalaman_menjabat_default ? $pengalaman_menjabat_default->real_value : 0;
            $pengalaman_menjabat_base = $datas->reduce(function ($acc, $d) {
                return $d['pengalaman_menjabat']->real_value > $acc ? $d['pengalaman_menjabat']->real_value : $acc;
            }, $pengalaman_menjabat_default);

            //kesehatan
            $kesehatan_default = $first['kesehatan'];
            $kesehatan_default = $kesehatan_default ? $kesehatan_default->real_value : 0;
            $kesehatan_base = $datas->reduce(function ($acc, $d) {
                return $d['kesehatan']->real_value > $acc ? $d['kesehatan']->real_value : $acc;
            }, $kesehatan_default);

            //komunikasi
            $komunikasi_default = $first['komunikasi'];
            $komunikasi_default = $komunikasi_default ? $komunikasi_default->real_value : 0;
            $komunikasi_base = $datas->reduce(function ($acc, $d) {
                return $d['komunikasi']->real_value > $acc ? $d['komunikasi']->real_value : $acc;
            }, $komunikasi_default);

            //problem_solving
            $problem_solving_default = $first['problem_solving'];
            $problem_solving_default = $problem_solving_default ? $problem_solving_default->real_value : 0;
            $problem_solving_base = $datas->reduce(function ($acc, $d) {
                return $d['problem_solving']->real_value > $acc ? $d['problem_solving']->real_value : $acc;
            }, $problem_solving_default);

            //kedisiplinan-
            $kedisiplinan_default = $first['kedisiplinan'];
            $kedisiplinan_default = $kedisiplinan_default ? $kedisiplinan_default->real_value : 0;
            $kedisiplinan_base = $datas->reduce(function ($acc, $d) {
                return $d['kedisiplinan']->real_value > $acc ? $d['kedisiplinan']->real_value : $acc;
            }, $kedisiplinan_default);

            //visi_misi
            $visi_misi_default = $first['visi_misi'];
            $visi_misi_default = $visi_misi_default ? $visi_misi_default->real_value : 0;
            $visi_misi_base = $datas->reduce(function ($acc, $d) {
                return $d['visi_misi']->real_value > $acc ? $d['visi_misi']->real_value : $acc;
            }, $visi_misi_default);
        }
        foreach ($datas as $key => $data)
        {
            $x = $data['ipk'] instanceof Atribut ? $data['ipk']['real_value'] : 0;
            $data['ipk_result'] = $x / $ipk_base;
            $data['ipk_base'] = $ipk_base;

            $x = $data['keaktifan'] instanceof Atribut ? $data['keaktifan']['real_value'] : 0;
            $data['keaktifan_result'] = $x / $keaktifan_base;
            $data['keaktifan_base'] = $keaktifan_base;

            $x = $data['pengalaman_menjabat'] instanceof Atribut ? $data['pengalaman_menjabat']['real_value'] : 0;
            $data['pengalaman_menjabat_result'] = $x / $pengalaman_menjabat_base;
            $data['pengalaman_menjabat_base'] = $pengalaman_menjabat_base;

            $x = $data['kesehatan'] instanceof Atribut ? $data['kesehatan']['real_value'] : 0;
            $data['kesehatan_result'] = $x / $kesehatan_base;
            $data['kesehatan_base'] = $kesehatan_base;

            $x = $data['komunikasi'] instanceof Atribut ? $data['komunikasi']['real_value'] : 0;
            $data['komunikasi_result'] = $x / $komunikasi_base;
            $data['komunikasi_base'] = $komunikasi_base;

            $x = $data['problem_solving'] instanceof Atribut ? $data['problem_solving']['real_value'] : 0;
            $data['problem_solving_result'] = $x / $problem_solving_base;
            $data['problem_solving_base'] = $problem_solving_base;

            $x = $data['kedisiplinan'] instanceof Atribut ? $data['kedisiplinan']['real_value'] : 0;
            $data['kedisiplinan_result'] = $x / $kedisiplinan_base;
            $data['kedisiplinan_base'] = $kedisiplinan_base;

            $x = $data['visi_misi'] instanceof Atribut ? $data['visi_misi']['real_value'] : 0;
            $data['visi_misi_result'] = $x / $visi_misi_base;
            $data['visi_misi_base'] = $visi_misi_base;

            $datas[$key] = $data;
        }

        $this->normalisasi = $datas;
    }


    public function setupPerankingan()
    {
        if ($this->error_messages != '') return 0;
        $datas = $this->normalisasi;

        $ipk = Kriteria::find(1);
        $ipk = $ipk->bobot;
        $keaktifan = Kriteria::find(2);
        $keaktifan = $keaktifan->bobot;
        $pengalaman_menjabat = Kriteria::find(3);
        $pengalaman_menjabat = $pengalaman_menjabat->bobot;
        $kesehatan = Kriteria::find(4);
        $kesehatan = $kesehatan->bobot;
        $komunikasi = Kriteria::find(5);
        $komunikasi = $komunikasi->bobot;
        $problem_solving = Kriteria::find(6);
        $problem_solving = $problem_solving->bobot;
        $kedisiplinan = Kriteria::find(7);
        $kedisiplinan = $kedisiplinan->bobot;
        $visi_misi = Kriteria::find(8);
        $visi_misi = $visi_misi->bobot;

        $this->bobot = [
            
            'ipk' => $ipk,
            'keaktifan' => $keaktifan,
            'pengalaman_menjabat' => $pengalaman_menjabat,
            'kesehatan' => $kesehatan,
            'komunikasi' => $komunikasi,
            'problem_solving' => $problem_solving,
            'kedisiplinan' => $kedisiplinan,
            'visi_misi' => $visi_misi
        ];

        foreach ($datas as $key => $data)
        {
            $skor = ($ipk * $data['ipk_result'])
                + ($keaktifan * $data['keaktifan_result'])
                + ($pengalaman_menjabat * $data['pengalaman_menjabat_result'])
                + ($kesehatan * $data['kesehatan_result'])
                + ($komunikasi * $data['komunikasi_result'])
                + ($problem_solving * $data['problem_solving_result'])
                + ($kedisiplinan * $data['kedisiplinan_result'])
                + ($visi_misi * $data['visi_misi_result'])
            ;
            $data['skor'] = $skor;
            $datas[$key] = $data;
        }

        $datas = $datas->sortByDesc(function ($a) {
            return $a['skor'];
        });

        $ranking = 0;
        foreach ($datas as $key => $data)
        {
            $datas[$key] = ++$ranking;
        }
        $this->ranking = $datas;
    }

  

    public function errorKandidatMessage($string, $kandidat)
    {
        $errors = "$string kandidat .".$kandidat['nim']." - ".$kandidat['nama'];
        return $errors;
    }
}
