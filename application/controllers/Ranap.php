<?php

/**
 * @property mixed md 
 * @property mixed session
 * @property mixed input
 */
header('Access-Control-Allow-Origin: *');
require FCPATH . '/plugins/jaspersoft/rest-client/autoload.dist.php';
require APPPATH . '/libraries/fpdi/src/autoload.php';
require APPPATH . '/libraries/fpdf/fpdf.php';

require APPPATH . '/libraries/tcpdf/tcpdf.php';

class Ranap extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Modelranap', 'md');
    }

    public function index()
    {
        if (!$_SESSION['nik'] || $_SESSION['nik'] == "") {
            redirect("login");
        };

        $filename = 'dist/FILEAPPS/EMPLOYEE/' . $_SESSION['nik'] . '/' . $_SESSION['nik'] . '.jpg';

        if (file_exists($filename)) {
            $data['fotoprofile'] = "<div class='col-md-2'><img class='shadow-lg p-2 bg-secondary rounded img-thumbnail btn' data-toggle='modal' data-target='#uploadfotoprofile' title='Klik Untuk Upload Foto Profile' src='" . base_url() . $filename . "'></img></div>";
            $data['avatar'] = "<img src='" . base_url() . $filename . "' class='img-circle elevation-2' data-toggle='modal' data-target='#uploadfotoprofile' title='Klik Untuk Upload Foto Profile' style='height:37px; width:37px;'>";
        } else {
            $data['fotoprofile'] = "<div class='col-md-2'><img class='shadow-lg p-2 bg-secondary rounded img-thumbnail btn' data-toggle='modal' data-target='#uploadfotoprofile' title='Klik Untuk Upload Foto Profile' src='" . base_url() . "dist/img/user.svg" . "'></img></div>";
            $data['avatar'] = "<img src='" . base_url() . "dist/img/user.svg'" . "data-toggle='modal' data-target='#uploadfotoprofile' title='Klik Untuk Upload Foto Profile' class='img-circle'>";
        }

        $data['title'] = 'E-RESEARCH';
        $this->load->view("ranap", $data);
    }
    public function listpasien()
    {
        $lantai = $this->input->post('lantai');
        $kamar = $this->input->post('kamar');
        $pencarian = $this->input->post('pencarian');
        $listpasien = $this->md->listpasien($lantai, $kamar, $pencarian);
        /*  foreach ($listpasien as &$row) {
            if (isset($row->ICD10_SEKUNDER) && is_object($row->ICD10_SEKUNDER)) {
                $row->ICD10_SEKUNDER = $row->ICD10_SEKUNDER->load();
            }
        } */

        echo json_encode($listpasien);
    }
    public function diagnosa()
    {
        $episodeid = $this->input->post('episodeid');
        $pasienid = $this->input->post('pasienid');
        $getdiagnosa = $this->md->getdiagnosa($episodeid, $pasienid);
        $getdiagnosa->LISTDIAG = $getdiagnosa->LISTDIAG ? $getdiagnosa->LISTDIAG->load() : '';
        $getdiagnosa->LISTTINDAK = $getdiagnosa->LISTTINDAK ? $getdiagnosa->LISTTINDAK->load() : '';
        $getdiagnosa->ICD10_SEKUNDER = $getdiagnosa->ICD10_SEKUNDER ? $getdiagnosa->ICD10_SEKUNDER->load() : '';
        $getdiagnosa->ICD9_TINDAKAN = $getdiagnosa->ICD9_TINDAKAN ? $getdiagnosa->ICD9_TINDAKAN->load() : '';
        echo json_encode($getdiagnosa);
    }
    public function geticd10()
    {
        $search = $this->input->post('search');
        $geticd10 = $this->md->geticd10($search);
        $items = [];
        foreach ($geticd10 as $d) {
            $items[] = [
                'id' => $d->KODE,
                'kode_icd' => $d->KODE_ICD,
                'text' => $d->KODE_ICD . ' - ' . $d->DESCRIPTION,
                'nama' => $d->DESCRIPTION
            ];
        }
        echo json_encode($items);
    }
    public function geticd9()
    {
        $search = $this->input->post('search');
        $geticd10 = $this->md->geticd9($search);
        $items = [];
        foreach ($geticd10 as $d) {
            $items[] = [
                'id' => $d->KODE,
                'kode_icd' => $d->KODE_ICD,
                'text' => $d->KODE_ICD . ' - ' . $d->DESCRIPTION,
                'nama' => $d->DESCRIPTION
            ];
        }
        echo json_encode($items);
    }
    public function updatediagnosa()
    {
        $input = $this->input->post();

        $listdiag = $input['listdiag'];
        $counttransdiag = $this->md->counttransdiag($input['episodeid']);
        $listtindak = $input['listtindak'];
        $counttranstin = $this->md->counttranstin($input['episodeid']);
        if ($input['kodeicd10']) {
            $kodeicd10 = $input['kodeicd10'];
            $diagnosa = $input['nmdicd10'];
        } else {
            $kodeicd10 = '';
            $diagnosa = $input['diagutama'];
        }
        if ($input['kodeicd9']) {
            $kodeicd9 = $input['kodeicd9'];
            $tindakan = $input['nmdicd9'];
        } else {
            $kodeicd9 = '';
            $tindakan = $input['tindakutama'];
        }
        $getcodingid = $this->md->getcodingid();
        $datainsertcoding = [
            'CODING_ID' => $getcodingid->KODE,
            'EPISODE_ID' => $input['episodeid'],
            'PASIEN_ID' => $input['pasienid'],
            'ICD10_UTAMA' => $kodeicd10 ? $kodeicd10 : $diagnosa,
            'ICD10_SEKUNDER' => $listdiag,
            'ICD9_UTAMA' => $kodeicd9 ? $kodeicd9 : $tindakan,
            'ICD9_TINDAKAN' => $listtindak,
            'CREATED_BY' => $_SESSION['nik'],
            'CATATAN' => $input['catatanperubahan'],
            'NOMOR_SEP' => $input['nosep'],
            'NOMOR_RM' => $input['norm'],
            'NOMOR_KARTU' => $input['nokartu'],
            'NAMA_PASIEN' => $input['namapasien']
        ];
        /* echo json_encode($datainsertcoding);
        die(); */
        $hapusbpjscoding = $this->md->hapusbpjscoding($input['episodeid']);
        $insertbpjscoding = $this->md->insertbpjscoding($datainsertcoding);
        if ($insertbpjscoding) {
            $json['code'] = '200';
            $json['msg'] = 'Data Berhasil diubah';
        } else {
            $json['code'] = '201';
            $json['msg'] = 'Data Gagal diubah';
        }
        echo json_encode($json);
        /*  $updatediagms = $this->md->updatediagms($kodeicd10, $diagnosa, $kodeicd9, $tindakan, $input['episodeid'], $input['transco']);
        if ($updatediagms) {
            if ($listdiag) {
                $listdiag = json_decode($listdiag, TRUE);
                foreach ($listdiag as $i => $d) {
                    $transdiag = $input['episodeid'] . $counttransdiag;

                    if ($d['type'] == 'delete') {
                        if ($d['transdiag']) {
                            $hapusdiagdt = $this->md->hapusdiagdt($d['transdiag']);
                        }
                    }
                    if ($d['type'] == 'new') {
                        $datainsertdiag = [
                            'TRANS_CO' => $input['transco'],
                            'TRANS_ID' => $input['transid'],
                            'DOKTER_ID' => $input['dokterid'],
                            'KODE' => $d['kode'],
                            'KODE_ICD' => $d['kode_icd'],
                            'DIAGNOSA' => $d['diagnosa'],
                            'EPISODE_ID' => $input['episodeid'],
                            'TRANS_DIAG' => $transdiag,
                            'CREATED_BY' => $_SESSION['nik']
                        ];
                        $insertdiagdt = $this->md->insertdiagdt($datainsertdiag);
                    }
                }
            }
            if ($listtindak) {
                $listtindak = json_decode($listtindak, TRUE);
                $hapusdiagdt = $this->md->hapustindakdt($input['episodeid']);
                foreach ($listtindak as $i => $d) {
                    $transtin = $input['episodeid'] . $counttranstin;
                    $datainserttin = [
                        'TRANS_CO' => $input['transco'],
                        'TRANS_ID' => $input['transid'],
                        'DOKTER_ID' => $input['dokterid'],
                        'KODE' => $d['kode'],
                        'KODE_ICD' => $d['kode_icd'],
                        'TINDAKAN' => $d['tindakan'],
                        'EPISODE_ID' => $input['episodeid'],
                        'TRANS_TIN' => $transtin,
                        'CREATED_BY' => $_SESSION['nik']
                    ];
                    $inserttindakdt = $this->md->inserttindakdt($datainserttin);
                }
            }
            $hapusbpjscoding = $this->md->hapusbpjscoding($input['episodeid']);
            $insertbpjscoding = $this->md->insertbpjscoding($datainsertcoding);
            $json['code'] = '200';
            $json['msg'] = 'Data Berhasil diubah';
        } else {
            $json['code'] = '201';
            $json['msg'] = 'Data Gagal diubah';
        }
        echo json_encode($json); */
    }
}
