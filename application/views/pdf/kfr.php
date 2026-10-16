<table width="100%" border="1" cellpadding="5">
    <thead>
        <tr>
            <th style="width: 25%;text-align:center;"><img style="width: 100px;" src="<?= base_url('dist/img/logonew.png') ?>" /></th>
            <th style="text-align: center;width:40%;"><b style="font-size: 12px;">FORMULIR LAYANAN<br />KEDOKTERAN FISIK<br />DAN REHABILITASI</b><br />(175/FORM/MED/X/2024)</th>
            <th style="width: 35%;">Nama Pasien : <?= $dataEpisode['NAMA_PASIEN'] ?><br />No. Rm : <?= $dataEpisode['INT_PASIEN_ID'] ?><br />Tgl Lahir : <?= $dataEpisode['TGL_LAHIR'] ?><br />NIK : <?= $dataEpisode['NO_IDENTITAS'] ?></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="3">
                <table cellpadding="5">
                    <tr>
                        <td style="width: 40%">Tanggal Pelayanan</td>
                        <td style="width: 60%"><?= $dataEpisode['TGL_MASUK'] ?></td>
                    </tr>
                    <tr>
                        <td>Anamnesa</td>
                        <td><?= $datalayankfr['ANAMNESA'] ?></td>
                    </tr>
                    <tr>
                        <td>Pemeriksaan Fisik dan Uji Fungsi</td>
                        <td><?= $datalayankfr['PEMERIKSAAN_FISIK_UJI_FUNGSI'] ?></td>
                    </tr>
                    <tr>
                        <td>Diagnosa Medis (ICD-10)</td>
                        <td><?= $datalayankfr['DIAG_MEDIS_ICD10'] ?></td>
                    </tr>
                    <tr>
                        <td>Diagnosa Fungsi (ICD-10)</td>
                        <td><?= $datalayankfr['DIAG_FUNGSI_ICD10'] ?></td>
                    </tr>
                    <tr>
                        <td>Pemeriksaan Penunjang</td>
                        <td><?= $datalayankfr['PEMERIKSAAN_PENUNJANG'] ?></td>
                    </tr>
                    <tr>
                        <td>Tata Laksana KFR (ICD 9 CM)</td>
                        <td><?= $datalayankfr['TATA_LAKSANA_KFR_ICD9'] ?></td>
                    </tr>
                    <tr>
                        <td>Anjuran</td>
                        <td><?= $datalayankfr['ANJURAN'] ?></td>
                    </tr>
                    <tr>
                        <td>Evaluasi</td>
                        <td><?= $datalayankfr['EVALUASI'] ?></td>
                    </tr>
                    <tr>
                        <td>Suspek Penyakit Akibat Kerja</td>
                        <td><?= $datalayankfr['SUSPEK_PENYAKIT_KET'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align: center;">DOKTER PEMERIKSA<br /><img width="100" src="<?= base_url('dist/FILEAPPS/ERESUME_TTD/') ?><?= str_replace(' ', '%20', $dataEpisode['DPJP_ID']) ?>.png" /><br />(<?= $dataEpisode['DPJP_NAMA'] ?>)</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
<br pagebreak="true" />
<table width="100%" border="1" cellpadding="5">
    <thead>
        <tr>
            <th style="width: 25%;text-align:center;"><img style="width: 100px;" src="<?= base_url('dist/img/logonew.png') ?>" /></th>
            <th style="text-align: center;width: 40%;"><b style="font-size: 12px;">FORMULIR<br />HASIL TINDAKAN<br />UJI FUNGSI/PROSEDUR KFR</b><br />(176/FORM/MED/X/2024)</th>
            <th style="width: 35%;">Nama Pasien : <?= $dataEpisode['NAMA_PASIEN'] ?><br />No. Rm : <?= $dataEpisode['INT_PASIEN_ID'] ?><br />Tgl Lahir : <?= $dataEpisode['TGL_LAHIR'] ?><br />NIK : <?= $dataEpisode['NO_IDENTITAS'] ?></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="3">
                <table cellpadding="5">
                    <tr>
                        <td style="width: 40%">Tanggal Pemeriksaan</td>
                        <td style="width: 60%"><?= $dataEpisode['TGL_MASUK'] ?></td>
                    </tr>
                    <tr>
                        <td style="width: 40%">Diagnosis Fungsional</td>
                        <td style="width: 60%"><?= $datatindakankfr['DIAGNOSA_FUNGSIONAL'] ?></td>
                    </tr>
                    <tr>
                        <td style="width: 40%">Diagnosis Medis</td>
                        <td style="width: 60%"><?= $datatindakankfr['DIAGNOSA_MEDIS'] ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <table cellpadding="5">
                    <tr>
                        <td style="width: 40%">Instrumen Uji Fungsi/Prosedur KFR</td>
                        <td style="width: 60%"><?= $datatindakankfr['INSTRUMEN_UJI_FUNGSI'] ?></td>
                    </tr>
                    <tr>
                        <td style="width: 40%">Hasil yang didapat</td>
                        <td style="width: 60%"><?= $datatindakankfr['HASIL_YANG_DIDAPAT'] ?></td>
                    </tr>
                    <tr>
                        <td style="width: 40%">Kesimpulan</td>
                        <td style="width: 60%"><?= $datatindakankfr['KESIMPULAN'] ?></td>
                    </tr>
                    <tr>
                        <td style="width: 40%">Goal Terapi</td>
                        <td style="width: 60%"><?= $datatindakankfr['GOAL_TERAPI'] ?></td>
                    </tr>
                    <tr>
                        <td style="width: 40%">Rekomendasi</td>
                        <td style="width: 60%"><?= $datatindakankfr['KESIMPULAN'] ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align: center;">DOKTER OPERATOR<br /><img width="100" src="<?= base_url('dist/FILEAPPS/ERESUME_TTD/') ?><?= str_replace(' ', '%20', $dataEpisode['DPJP_ID']) ?>.png" /><br />(<?= $dataEpisode['DPJP_NAMA'] ?>)</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>