<table width="100%">
    <thead>
        <tr>
            <th>
                <img src="<?= base_url() ?>/dist/img/printheader.jpg" />
                <br /><br />
            </th>
        </tr>
    </thead>
    <tbody>
        <!-- <tr>
            <th>
                <img src="<?= base_url() ?>/dist/img/printheader.jpg" />
                <br /><br />
            </th>
        </tr> -->
        <tr>
            <td>
                <table style="line-height: 1.5;" width="100%">
                    <tbody>
                        <tr>
                            <th style="width: 18.2013%;" align="left" nowrap="nowrap">NO RM</th>
                            <td style="width: 2.14134%;" align="center">:</td>
                            <td style="width: 33.4047%;" align="left"><?= $rad->NO_RM ?></td>
                            <td style="width: 1.07066%;">&nbsp;</td>
                            <th style="width: 16.3726%;" align="left" nowrap="nowrap">NO. REGISTER</th>
                            <td style="width: 2.50046%;" align="center">:</td>
                            <td style="width: 25.9878%; text-align: left;" align="left"><?= $rad->NO_REGISTER ?></td>
                        </tr>
                        <tr>
                            <th style="width: 18.2013%;" align="left" nowrap="nowrap">NAMA</th>
                            <td style="width: 2.14134%;" align="center">:</td>
                            <td style="width: 33.4047%;" align="left"><?= $rad->NAMA_PASIEN ?></td>
                            <td style="width: 1.07066%;">&nbsp;</td>
                            <th style="width: 16.3726%;" align="left" nowrap="nowrap">NO. FOTO</th>
                            <td style="width: 2.50046%;" align="center">:</td>
                            <td style="width: 25.9878%; text-align: left;" align="left"><?= $rad->NO_RONTGEN ?></td>
                        </tr>
                        <tr>
                            <th style="width: 18.2013%;" align="left" nowrap="nowrap">TGL LAHIR/UMUR</th>
                            <td style="width: 2.14134%;" align="center">:</td>
                            <td style="width: 33.4047%;" align="left"><?= $rad->TGLLAHIR ?> / ( <?= $rad->UMUR ?> )</td>
                            <td style="width: 1.07066%;">&nbsp;</td>
                            <th style="width: 16.3726%;" align="left" nowrap="nowrap">TGL. FOTO</th>
                            <td style="width: 2.50046%;" align="center">:</td>
                            <td style="width: 25.9878%;" align="left"><?= $rad->TGLAPPROVE ?></td>
                        </tr>
                        <tr>
                            <th style="width: 18.2013%;" align="left" nowrap="nowrap">KELAMIN</th>
                            <td style="width: 2.14134%;" align="center">:</td>
                            <td style="width: 33.4047%;" align="left"><?= $rad->KELAMIN == 'P' ? 'Perempuan' : 'Laki - Laki' ?></td>
                            <td style="width: 1.07066%;">&nbsp;</td>
                            <th style="width: 16.3726%;" align="left" nowrap="nowrap">RUANGAN</th>
                            <td style="width: 2.50046%;" align="center">:</td>
                            <td style="width: 25.9878%; text-align: left;" align="left"><?= $rad->RUANGAN_PENGIRIM ?></td>
                        </tr>
                        <tr>
                            <th style="width: 18.2013%;" align="left">DOKTER PENGIRIM</th>
                            <td style="width: 2.14134%; text-align: center;">:</td>
                            <td style="width: 33.4047%;"><?= $rad->DOKTER_PENGIRIM ?></td>
                            <td style="width: 1.07066%;">&nbsp;</td>
                            <th style="width: 16.3726%;" align="left">KLINIS</th>
                            <td style="width: 2.50046%; text-align: center;">:</td>
                            <td style="width: 25.9878%;"><?= $rad->KLINIS ?>
                                Susp CVD</td>
                        </tr>
                        <tr>
                            <th style="width: 18.2013%;" align="left">PEMERIKSAAN</th>
                            <td style="width: 2.14134%; text-align: center;">:</td>
                            <td style="width: 33.4047%;"><?= $rad->NAMA_PEMERIKSAAN ?></td>
                            <td style="width: 1.07066%;">&nbsp;</td>
                            <th style="width: 16.3726%;" align="left">&nbsp;</th>
                            <td style="width: 2.50046%; text-align: center;">&nbsp;</td>
                            <td style="width: 25.9878%; text-align: left;">&nbsp;</td>
                        </tr>
                        <tr>
                            <th style="width: 18.2013%; text-align: left;"><span style="text-align: -webkit-left; white-space: nowrap;">ALAMAT</span></th>
                            <td style="width: 2.14134%; text-align: center;">:</td>
                            <td style="width: 33.4047%;"><?= $rad->ALAMAT ?></td>
                            <td style="width: 1.07066%;">&nbsp;</td>
                            <th style="width: 16.3726%; text-align: left;">&nbsp;</th>
                            <td style="width: 2.50046%; text-align: center;">&nbsp;</td>
                            <td style="width: 25.9878%; text-align: left;">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>

                <table style="font-size:11px!important;line-height:1.5;">
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $rad->EXPERTISE_TEXT_FINDING ? nl2br(str_replace('<', '&lt;', $rad->EXPERTISE_TEXT_FINDING->load())) : '' ?></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td><?= $rad->EXPERTISE_TEXT_CONCLUSION ? nl2br(str_replace('<', '&lt;', $rad->EXPERTISE_TEXT_CONCLUSION->load())) : '' ?></td>
                    </tr>
                </table>
                <table style="width: 100%;" border="0">
                    <tbody>
                        <tr>
                            <td style="width: 58.7145%;"></td>
                            <td style="width: 40.2966%;" align="center">
                                <div>Dokter Radiologi,</div>
                                <div><br><?= $rad->NAMA_RADIOLOG ?></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>

    <tfoot>
        <tr>
            <td>
                <div class="page-footer-space"></div>
            </td>
        </tr>
    </tfoot>
</table>