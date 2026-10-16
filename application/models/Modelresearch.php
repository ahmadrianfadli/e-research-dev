<?php
class Modelresearch extends CI_Model
{

    function riwayatpasienrj($pencarian)
    {
        $query =
            "  
                        SELECT A.REKANAN, PASIEN_ID, EPISODE_ID, NO_BPJS, SEP, REKAM_MEDIS, NAMA_PASIEN, DOKTER_ID, DECODE(POLI_ID, 'UGD01', SR01_GET_DOKTER_IGD_AKHIR (A.EPISODE_ID), DOKTER)DOKTER, POLI_ID, POLI, ACC_CSMX, TO_CHAR(TGL_MASUK, 'DD.MM.YYYY')TGLMASUK, DECODE(TGL_KELUAR,NULL,TO_CHAR(TGL_MASUK, 'DD.MM.YYYY'), TO_CHAR(TGL_KELUAR, 'DD.MM.YYYY'))TGLKELUAR,
                                ( SELECT TO_CHAR(TGL_LAHIR, 'DD.MM.YYYY')  FROM SR01_GEN_PASIEN_MS WHERE LOKASI_ID='001' AND AKTIF='1' AND PASIEN_ID=A.PASIEN_ID)TGLLAHIR,
                                ( SELECT COUNT(TRANS_ID) FROM SR01_RM_RESUME_ICD10 WHERE LOKASI_ID='001' AND AKTIF='1' AND JENIS='1' AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID )JMLRESUME,
                                ( SELECT COUNT(TRANS_CO) FROM SR01_WORKLIST_LAB    WHERE LOKASI_ID='001' AND AKTIF='1' AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID)JMLLAB,
                                ( SELECT COUNT(TRANS_CO) FROM SR01_WORKLIST_RAD    WHERE LOKASI_ID='001' AND AKTIF='1' AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID)JMLRAD,
                                ( SELECT COUNT(TRANS_ID)   FROM WEB_CO_LAPORAN       WHERE SHOW_ITEM='1'   AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID)JMLOPR,
                                ( SELECT DISTINCT JENIS_LAP         FROM WEB_CO_LAPORAN       WHERE SHOW_ITEM='1'   AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID AND CREATED_DATE=(SELECT MAX(CREATED_DATE) FROM WEB_CO_LAPORAN WHERE SHOW_ITEM='1' AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID))JENISOPERASI,
                                ( SELECT COUNT(NM_FILE)  FROM SR01_DOCUMENT        WHERE SHOW_ITEM='1' AND JNS_DOC='085' AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID )JMLLAMPIRAN,
                                ( SELECT COUNT(EPISODE_ID) FROM WEB_CO_DIAGNOSA_DT WHERE LOKASI_ID='001' AND SHOW_ITEM='1' AND CREATED_BY LIKE 'DR%' AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID )JMLSOAPDR,
                                ( SELECT COUNT(EPISODE_ID) FROM WEB_CO_DIAGNOSA_DT WHERE LOKASI_ID='001' AND SHOW_ITEM='1' AND CREATED_BY NOT LIKE 'DR%' AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID )JMLSOAPPRWT,
                                ( SELECT INT_PASIEN_ID   FROM SR01_GEN_PASIEN_MS   WHERE LOKASI_ID='001' AND AKTIF='1' AND PASIEN_ID=A.PASIEN_ID)||'/'||TO_CHAR(TGL_MASUK,'YYYYMMDD')||'/SEP_'||(SELECT BPJS_NO FROM SR01_GEN_PASIEN_MS WHERE LOKASI_ID='001' AND AKTIF='1' AND PASIEN_ID=A.PASIEN_ID)||'_'||SEP||'.pdf' LAMPIRANSEP,
                                ( SELECT MAX(TRANS_ID) FROM SR01_MED_TRIASE_HD WHERE LOKASI_ID='001' AND AKTIF='1' AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID )TRANSIDTRIASE,
                                ( SELECT COUNT(TRANS_ID) FROM WEB_CO_LAPORAN_TINDAKAN WHERE LOKASI_ID='001' AND AKTIF='1' AND EPISODE_ID=A.EPISODE_ID )JMLLAPTINDAKAN

                        FROM SR01_RJ_BPJS_MS A
                        WHERE A.LOKASI_ID='001'
                        AND   A.AKTIF='1'
                        AND   A.REKAM_MEDIS='" . $pencarian . "' OR A.NO_BPJS='" . $pencarian . "' OR A.SEP='" . $pencarian . "' OR A.EPISODE_ID='" . $pencarian . "' OR A.PASIEN_ID='" . $pencarian . "'
                        ORDER BY A.TGL_MASUK DESC
                    ";

        $recordset = $this->db->query($query);
        $recordset = $recordset->result();
        return $recordset;
    }

    function riwayatpasienri($pencarian)
    {
        $query =
            "  
                        SELECT A.REKANAN, PASIEN_ID, EPISODE_ID, BPJS_NO, SEP, REKAM_MEDIS, NAMA_PASIEN, DOKTER, RUANG_RAWAT, REKANAN, ACC_CSMX, TO_CHAR(TGL_MASUK, 'DD.MM.YYYY')TGLMASUK, DECODE(TGL_KELUAR,NULL,TO_CHAR(TGL_MASUK, 'DD.MM.YYYY'), TO_CHAR(TGL_KELUAR, 'DD.MM.YYYY'))TGLKELUAR,
                                ( SELECT TO_CHAR(TGL_LAHIR, 'DD.MM.YYYY')  FROM SR01_GEN_PASIEN_MS WHERE LOKASI_ID='001' AND AKTIF='1' AND PASIEN_ID=A.PASIEN_ID)TGLLAHIR,
                                ( SELECT COUNT(TRANS_SOAP) FROM SR01_RM_DIAGNOSA_DT  WHERE LOKASI_ID='001' AND AKTIF='1' AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID )JMLKONSUL,
                                ( SELECT COUNT(TRANS_ID)   FROM WEB_CO_LAPORAN       WHERE SHOW_ITEM='1'   AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID)JMLOPR,
                                ( SELECT DISTINCT JENIS_LAP         FROM WEB_CO_LAPORAN       WHERE SHOW_ITEM='1'   AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID AND CREATED_DATE=(SELECT MAX(CREATED_DATE) FROM WEB_CO_LAPORAN WHERE SHOW_ITEM='1' AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID))JENISOPERASI,
                                ( SELECT COUNT(TRANS_ID)   FROM SR01_RM_RESUME_ICD10 WHERE LOKASI_ID='001' AND AKTIF='1' AND JENIS='1' AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID )JMLRESUME,
                                ( SELECT COUNT(TRANS_CO)   FROM SR01_WORKLIST_LAB    WHERE LOKASI_ID='001' AND AKTIF='1' AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID)JMLLAB,
                                ( SELECT COUNT(TRANS_CO)   FROM SR01_WORKLIST_RAD    WHERE LOKASI_ID='001' AND AKTIF='1' AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID)JMLRAD,
                                ( SELECT COUNT(NM_FILE)    FROM SR01_DOCUMENT        WHERE SHOW_ITEM='1'   AND JNS_DOC='085' AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID )JMLLAMPIRAN,
                                ( SELECT INT_PASIEN_ID     FROM SR01_GEN_PASIEN_MS   WHERE LOKASI_ID='001' AND AKTIF='1' AND PASIEN_ID=A.PASIEN_ID)||'/'||TO_CHAR(TGL_MASUK,'YYYYMMDD')||'/SEP_'||(SELECT BPJS_NO FROM SR01_GEN_PASIEN_MS WHERE LOKASI_ID='001' AND AKTIF='1' AND PASIEN_ID=A.PASIEN_ID)||'_'||SEP||'.pdf' LAMPIRANSEP,
                                ( SELECT MAX(TRANS_ID) FROM SR01_MED_TRIASE_HD WHERE LOKASI_ID='001' AND AKTIF='1' AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID )TRANSIDTRIASE
                                
                        FROM SR01_REK_BPJS_MS A
                        WHERE A.LOKASI_ID='001'
                        AND   A.AKTIF='1'
                        AND   A.REKAM_MEDIS='" . $pencarian . "' OR A.BPJS_NO='" . $pencarian . "' OR A.SEP='" . $pencarian . "'
                        ORDER BY A.TGL_MASUK DESC
                    ";

        $recordset = $this->db->query($query);
        $recordset = $recordset->result();
        return $recordset;
    }

    public function geteklaimbaru($nosep)
    {
        $query = "
            SELECT CLAIM_PDF_BASE64
            FROM SIMRS_MANAGER.SR01_CLAIM_BPJS_SUMMARY A
            WHERE NO_SEP = '{$nosep}'
        ";
        $recordset = $this->db->query($query);
        $recordset = $recordset->row();
        return $recordset;
    }
    function lampiran($pasienid, $episodeid, $nosep = null)
    {
        $query =
            "  
                        SELECT X.*
                        FROM(
                               SELECT ( SELECT KETERANGAN FROM SR01_MS_TYPE_DOCUMENT WHERE JNS_DOC=A.JNS_DOC )NAMADOKUMEN, 'dist/filescan/'||DIR_URL||'/'||NM_FILE FILENAME, ''SEP, 1URUT,
                                    ''CARAMASUK,
                                        ''URLDIR,
                                        ''NAMEFILE
                                FROM SR01_DOCUMENT A
                                WHERE A.SHOW_ITEM='1'
                                --AND   A.JENIS_EPISODE='I'
                                 AND   A.PASIEN_ID='" . $pasienid . "'
                                AND   A.EPISODE_ID='" . $episodeid . "'
                                AND   A.JNS_DOC='EKLM'

                                UNION

                                SELECT 'EKLAIM'NAMADOKUMEN, '' FILENAME, NO_SEP SEP, 1URUT,
                                    ''CARAMASUK,
                                        ''URLDIR,
                                        'EKLAIMNEW'NAMEFILE
                                FROM SR01_CLAIM_BPJS_SUMMARY A
                                WHERE
                                NO_SEP = '{$nosep}'
                                AND CLAIM_PDF_BASE64 IS NOT NULL
                                UNION


                                SELECT 'SEP'NAMADOKUMEN, 'dist/FILEAPPS/PASIEN/BPJS/SEP/'||A.REKAM_MEDIS||'/'||TO_CHAR(A.TGL_MASUK,'YYYYMMDD')||'/SEP_'||A.NO_BPJS||'_'||A.SEP||'.pdf' FILENAME, A.SEP, 2URUT,
                                        ( SELECT MAX(LAST_UPDATED_BY) FROM SR01_KEU_BPJS_CVR WHERE LOKASI_ID='001' AND AKTIF='1' AND SEP_JENISLAYAN='2' AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID )CARAMASUK,
                                        'dist/FILEAPPS/PASIEN/BPJS/SEP/'||A.REKAM_MEDIS||'/'||TO_CHAR(A.TGL_MASUK,'YYYYMMDD')||'/'URLDIR,
                                        'SEP_'||A.NO_BPJS||'_'||A.SEP||'.pdf' NAMEFILE
                                FROM SR01_RJ_BPJS_MS A
                                WHERE A.LOKASI_ID='001'
                                AND   A.AKTIF='1'
                                AND   A.PASIEN_ID='" . $pasienid . "'
                                AND   A.EPISODE_ID='" . $episodeid . "'
                                                
                                UNION
                                                
                                SELECT 'SEP'NAMADOKUMEN, 'dist/FILEAPPS/PASIEN/BPJS/SEP/'||A.REKAM_MEDIS||'/'||( SELECT DISTINCT TO_CHAR(MAX(SEP_TGL),'YYYYMMDD') FROM SR01_KEU_BPJS_CVR WHERE LOKASI_ID='001' AND AKTIF='1' AND SEP_JENISLAYAN='1' AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID )||'/SEP_'||A.BPJS_NO||'_'||A.SEP||'.pdf' FILENAME, A.SEP, 2URUT,
                                        ''CARAMASUK,
                                        ''URLDIR,
                                        ''NAMEFILE
                                FROM SR01_REK_BPJS_MS A
                                WHERE A.LOKASI_ID='001'
                                AND   A.AKTIF='1'
                                AND   A.PASIEN_ID='" . $pasienid . "'
                                AND   A.EPISODE_ID='" . $episodeid . "'
                                
                                UNION
                                                                                
                                SELECT ( SELECT KETERANGAN FROM SR01_MS_TYPE_DOCUMENT WHERE JNS_DOC=A.JNS_DOC )NAMADOKUMEN, 'dist/filescan/'||DIR_URL||'/'||NM_FILE FILENAME, ''SEP, 3URUT,
                                    ''CARAMASUK,
                                    ''URLDIR,
                                    ''NAMEFILE
                                FROM SR01_DOCUMENT A
                                WHERE A.SHOW_ITEM='1'
                                AND   A.PASIEN_ID='" . $pasienid . "'
                                AND   A.EPISODE_ID='" . $episodeid . "'
                                AND   A.JNS_DOC IN ( SELECT JNS_DOC FROM SR01_MS_TYPE_DOCUMENT WHERE SHOW_ITEM='1' AND CASEMIX='Y' )
                                AND   A.JNS_DOC IN ('001')                                          
                                
                                UNION
                                                                                
                                SELECT ( SELECT KETERANGAN FROM SR01_MS_TYPE_DOCUMENT WHERE JNS_DOC=A.JNS_DOC )NAMADOKUMEN, CASE WHEN B.URL IS NULL THEN 'dist/filescan/'||DIR_URL||'/'||NM_FILE
                                    ELSE 'dist/FILEAPPS/FORMULIR/'||A.DIR_URL||'/'||A.NM_FILE
                                    END FILENAME, ''SEP, 5URUT,
                                    ''CARAMASUK,
                                    CASE WHEN B.URL IS NULL THEN '/dist/filescan/'||DIR_URL||'/'||NM_FILE
                                    ELSE '/dist/FILEAPPS/FORMULIR/'||A.DIR_URL||'/'||A.NM_FILE
                                    END URLDIR,
                                    ''NAMEFILE
                                FROM SR01_DOCUMENT A,SR01_MS_TYPE_DOCUMENT B
                                WHERE A.SHOW_ITEM='1'
                                AND B.JNS_DOC=A.JNS_DOC
                                AND B.IS_TYPE IN('01','85')
                                AND   A.PASIEN_ID='" . $pasienid . "'
                                AND   A.EPISODE_ID='" . $episodeid . "'
                                AND   A.JNS_DOC IN ( SELECT JNS_DOC FROM SR01_MS_TYPE_DOCUMENT WHERE SHOW_ITEM='1' AND CASEMIX='Y' )
                                AND   A.JNS_DOC NOT IN ('RMD','001','FL03') 

                                UNION
                                                                                
                                SELECT ( SELECT KETERANGAN FROM SR01_MS_TYPE_DOCUMENT WHERE JNS_DOC=A.JNS_DOC )NAMADOKUMEN, 'dist/filescan/'||DIR_URL||'/'||NM_FILE FILENAME, ''SEP, 5URUT,
                                    ''CARAMASUK,
                                    ''URLDIR,
                                    'KARTUREHAB'NAMEFILE
                                FROM SR01_DOCUMENT A
                                WHERE A.SHOW_ITEM='1'
                                AND   A.PASIEN_ID='" . $pasienid . "'
                                AND   A.EPISODE_ID='" . $episodeid . "'
                                AND   A.JNS_DOC IN ( SELECT JNS_DOC FROM SR01_MS_TYPE_DOCUMENT WHERE SHOW_ITEM='1' AND CASEMIX='Y' )
                                AND   A.JNS_DOC IN ('FL03') 
                        
                                UNION
                                                                                
                                SELECT ( SELECT KETERANGAN FROM SR01_MS_TYPE_DOCUMENT WHERE JNS_DOC=A.JNS_DOC )NAMADOKUMEN, 'dist/filescan/'||DIR_URL||'/'||NM_FILE FILENAME, ''SEP, 4URUT,
                                    ''CARAMASUK,
                                        ''URLDIR,
                                        ''NAMEFILE
                                FROM SR01_DOCUMENT A
                                WHERE A.SHOW_ITEM='1'
                                AND   A.JENIS_EPISODE='I'
                                AND   A.PASIEN_ID='" . $pasienid . "'
                                AND   A.EPISODE_ID='" . $episodeid . "'
                                AND   A.JNS_DOC='RMD'
                        
                                UNION
                                                                                
                                SELECT ( SELECT KETERANGAN FROM SR01_MS_TYPE_DOCUMENT WHERE JNS_DOC=A.JNS_DOC )NAMADOKUMEN, 'dist/filescan/'||DIR_URL||'/'||NM_FILE FILENAME, ''SEP, 3URUT,
                                    ''CARAMASUK,
                                        ''URLDIR,
                                        ''NAMEFILE
                                FROM SR01_DOCUMENT A
                                WHERE A.SHOW_ITEM='1'
                                AND   A.JENIS_EPISODE='O'
                                AND   A.PASIEN_ID='" . $pasienid . "'
                                AND   A.EPISODE_ID='" . $episodeid . "'
                                AND   A.JNS_DOC='RMD'
                                AND   A.AUTO_PDF='Y' 
                                AND   A.PUBLISH='Y'
                        
                                UNION
                                                                                
                                SELECT ( SELECT KETERANGAN FROM SR01_MS_TYPE_DOCUMENT WHERE JNS_DOC=A.JNS_DOC )NAMADOKUMEN, 'dist/filescan/'||DIR_URL||'/'||NM_FILE FILENAME, ''SEP, 3URUT,
                                        ''CARAMASUK,
                                        ''URLDIR,
                                        ''NAMEFILE
                                FROM SR01_DOCUMENT A
                                WHERE A.SHOW_ITEM='1'
                                AND   A.JENIS_EPISODE='O'
                                AND   A.PASIEN_ID='" . $pasienid . "'
                                AND   A.EPISODE_ID='" . $episodeid . "'
                                AND   A.JNS_DOC='RMD' 
                                AND   A.AUTO_PDF='N' 

                                UNION
                                                                                
                                SELECT ( SELECT KETERANGAN FROM SR01_MS_TYPE_DOCUMENT WHERE JNS_DOC=A.JNS_DOC )NAMADOKUMEN, 'dist/filescan/'||DIR_URL||'/'||A.EPISODE_ID||'/'||NM_FILE FILENAME, ''SEP, 6URUT,
                                    ''CARAMASUK,
                                        ''URLDIR,
                                        ''NAMEFILE
                                FROM SR01_DOCUMENT A
                                WHERE A.SHOW_ITEM='1'
                                --AND   A.JENIS_EPISODE='O'
                                AND   A.PASIEN_ID='" . $pasienid . "'
                                AND   A.EPISODE_ID='" . $episodeid . "'
                                AND   A.JNS_DOC = 'BIL01'

                                UNION
                                                                                
                                SELECT ( SELECT KETERANGAN FROM SR01_MS_TYPE_DOCUMENT WHERE JNS_DOC=A.JNS_DOC )NAMADOKUMEN, 'dist/filescan/'||DIR_URL||'/'||A.EPISODE_ID||'/'||NM_FILE FILENAME, ''SEP, 6URUT,
                                    ''CARAMASUK,
                                        ''URLDIR,
                                        ''NAMEFILE
                                FROM SR01_DOCUMENT A
                                WHERE A.SHOW_ITEM='1'
                                --AND   A.JENIS_EPISODE='I'
                                AND   A.PASIEN_ID='" . $pasienid . "'
                                AND   A.EPISODE_ID='" . $episodeid . "'
                                AND   A.JNS_DOC = 'BIL02'

                                UNION
                                                                                
                                SELECT ( SELECT KETERANGAN FROM SR01_MS_TYPE_DOCUMENT WHERE JNS_DOC=A.JNS_DOC )NAMADOKUMEN, 'dist/filescan/'||DIR_URL||'/'||A.EPISODE_ID||'/'||NM_FILE FILENAME, ''SEP, 6URUT,
                                    ''CARAMASUK,
                                        ''URLDIR,
                                        ''NAMEFILE
                                FROM SR01_DOCUMENT A
                                WHERE A.SHOW_ITEM='1'
                                --AND   A.JENIS_EPISODE='O'
                                AND   A.PASIEN_ID='" . $pasienid . "'
                                AND   A.EPISODE_ID='" . $episodeid . "'
                                AND   A.JNS_DOC = 'BIL03'

                                UNION
                                
                                SELECT Y.* FROM(SELECT ( SELECT KETERANGAN FROM SR01_MS_TYPE_DOCUMENT WHERE JNS_DOC=A.JNS_DOC )NAMADOKUMEN, 'dist/filescan/'||DIR_URL||'/'||NM_FILE FILENAME, ''SEP, 4URUT,
                                    ''CARAMASUK,
                                        ''URLDIR,
                                        ''NAMEFILE
                                FROM SR01_DOCUMENT A
                                WHERE
                                A.SHOW_ITEM='1'
                                --AND   A.JENIS_EPISODE='O'
                                AND A.PASIEN_ID='" . $pasienid . "'
                                AND   A.EPISODE_ID='" . $episodeid . "'
                                AND   A.JNS_DOC = 'TRIAG'
                                ORDER BY A.CREATED_DATE DESC
                                ) Y WHERE ROWNUM <=1

                                UNION ALL
                                
                                SELECT 'RADIOLOGI '||TO_CHAR(TANGGAL_APPROVE,'DD-MM-YYYY') NAMADOKUMEN,'index.php/Rj/createdpdfrad?no='||B.NO_RONTGEN FILENAME, ''SEP, 5URUT,
                                    ''CARAMASUK,
                                        ''URLDIR,
                                        'RADIOLOGI' NAMEFILE
                                FROM SR01_WORKLIST_RAD A
                                LEFT JOIN RAD_MANAGER.RIS_IN C ON A.TRANS_CO = C.ID_DETAIL_RADIOLOGI
                                LEFT JOIN RAD_MANAGER.RIS_OUT B ON C.NO_RONTGEN = B.NO_RONTGEN
                                WHERE A.EPISODE_ID ='" . $episodeid . "'
                                AND A.STATUS IN ('1','4')
                                AND EXPERTISE_HTML_FINDING IS NOT NULL

                                UNION ALL

                                SELECT 'FORM KFR' NAMADOKUMEN, 'index.php/rj/cetakkfr?episode_id={$episodeid}' FILENAME, ''SEP, 6URUT,
                                ''CARAMASUK,
                                        ''URLDIR,
                                        'KFR' NAMEFILE
                                FROM CLO_MANAGER.WEB_CO_FRM_LAYAN_KFR A
                                WHERE EPISODE_ID = '{$episodeid}'
                                AND AKTIF = '1'
                        )X
                        ORDER BY URUT ASC, NAMADOKUMEN ASC
                    ";

        $recordset = $this->db->query($query);
        $recordset = $recordset->result();
        return $recordset;
    }

    function laporantindakan($transid)
    {
        $query =
            "  
                        SELECT TO_CHAR(A.TGL_MULAI,'DD.MM.YYYY HH24:MI:SS')TGLMULAI, TO_CHAR(A.TGL_SELESAI,'DD.MM.YYYY HH24:MI:SS')TGLSELESAI,  A.TRANS_ID, A.DESKRIPSI, KESIMPULAN,
                                ( SELECT NAMA_LAYAN1 FROM SR01_KEU_LAYAN_MS WHERE LOKASI_ID='001' AND AKTIF='1' AND LAYAN_ID=A.LAYAN_ID )NAMAPELAYANAN
                        FROM WEB_CO_LAPORAN_TINDAKAN A
                        WHERE A.LOKASI_ID='001'
                        AND   A.AKTIF='1'
                        AND   A.TRANS_ID='" . $transid . "'
                    ";

        $recordset = $this->db->query($query);
        $recordset = $recordset->result();
        return $recordset;
    }
    public function getrad($no)
    {
        $query = "
            SELECT B.NO_RM, B.NAMA_PASIEN, A.EXPERTISE_TEXT_FINDING,A.EXPERTISE_TEXT_CONCLUSION, A.EXPERTISE_HTML_FINDING, A.EXPERTISE_HTML_CONCLUSION, A.NAMA_RADIOLOG, B.NO_RONTGEN, B.NO_REGISTER, TO_CHAR(B.TGL_LAHIR, 'DD-MM-YYYY') TGLLAHIR, TO_CHAR(B.TANGGAL_APPROVE,'DD-MM-YYYY HH24:MI:SS') TGLAPPROVE, B.KELAMIN, B.RUANGAN_PENGIRIM, B.DOKTER_PENGIRIM, B.KLINIS, B.NAMA_PEMERIKSAAN, B.ALAMAT||' '||B.KECAMATAN||' '||B.KABUPATEN ALAMAT, HITUNG_UMUR(B.TGL_LAHIR, TRUNC(SYSDATE))UMUR
            FROM RAD_MANAGER.RIS_OUT A
            LEFT JOIN RAD_MANAGER.RIS_IN B ON A.NO_RONTGEN = B.NO_RONTGEN 
            WHERE A.NO_RONTGEN = '{$no}'
        ";
        return $this->db->query($query)->row();
    }
    function listlaporantindakan($episodeid)
    {
        $query =
            "  
                        SELECT TO_CHAR(A.TGL_MULAI,'DD.MM.YYYY HH24:MI:SS')TGLMULAI, TO_CHAR(A.TGL_SELESAI,'DD.MM.YYYY HH24:MI:SS')TGLSELESAI,  A.TRANS_ID, A.DESKRIPSI, KESIMPULAN, JENIS_TR,
                                ( SELECT NAMA_LAYAN1 FROM SR01_KEU_LAYAN_MS WHERE LOKASI_ID='001' AND AKTIF='1' AND LAYAN_ID=A.LAYAN_ID )NAMAPELAYANAN,
                                DECODE(A.JENIS_TR,'01','LAPORAN TINDAKAN','LAPORAN ALAT')KATEGORI
                        FROM WEB_CO_LAPORAN_TINDAKAN A
                        WHERE A.LOKASI_ID='001'
                        AND   A.AKTIF='1'
                        AND   A.EPISODE_ID='" . $episodeid . "'
                    ";

        $recordset = $this->db->query($query);
        $recordset = $recordset->result();
        return $recordset;
    }

    function lampirantindakan($jenis, $pasienid, $episodeid)
    {
        $query =
            "  
                        SELECT A.DIR_FILE, NM_FILE, 'dist/filescan/'||DIR_URL||'/'||NM_FILE FILENAME
                        FROM SR01_DOCUMENT A
                        WHERE A.SHOW_ITEM='1'
                        AND   A.JNS_DOC='" . $jenis . "'
                        AND   A.PASIEN_ID='" . $pasienid . "'
                        AND   A.EPISODE_ID='" . $episodeid . "'
                    ";

        $recordset = $this->db->query($query);
        $recordset = $recordset->result();
        return $recordset;
    }

    function rincianbillingrj($pasienid, $episodeid)
    {
        $query =
            "
                        SELECT Y.*
                        FROM(
                                SELECT X.*  
                                FROM(
                                        SELECT DISTINCT A.KETERANGAN, ''TRANS_ID, ''LAYAN_ID, ''NAMA_LAYAN, 0 QTY, 0HARGA_SATUAN, 0HARGA_TOTAL, '1'JENIS, ''SATUAN,''TYPE,''SIGNADOKTER,''HEADER
                                        FROM SR01_RJ_BPJS_DT A
                                        WHERE A.LOKASI_ID='001'
                                        AND   A.PASIEN_ID='" . $pasienid . "'
                                        AND   A.EPISODE_ID='" . $episodeid . "'

                                        UNION

                                        SELECT DISTINCT A.KETERANGAN, A.TRANS_ID, A.LAYAN_ID, A.NAMA_LAYAN, A.QTY, A.HARGA_SATUAN, A.HARGA_TOTAL, '2'JENIS, ''SATUAN,''TYPE,''SIGNADOKTER,''HEADER
                                        FROM SR01_RJ_BPJS_DT A, SR01_KEU_LAYAN_MS B
                                        WHERE A.LOKASI_ID = B.LOKASI_ID AND A.LAYAN_ID = B.LAYAN_ID  
                                        AND A.LOKASI_ID='001'
                                        AND A.PASIEN_ID='" . $pasienid . "'
                                        AND A.EPISODE_ID='" . $episodeid . "'

                                        UNION

                                        SELECT A.KETERANGAN, A.TRANS_ID, A.LAYAN_ID, A.NAMA_LAYAN, A.QTY, A.HARGA_SATUAN, A.HARGA_TOTAL, '2' JENIS, C.KETERANGAN SATUAN, B.TYPE, B.SIGNA_DOKTER SIGNADOKTER, B.HEADER
                                        FROM SR01_RJ_BPJS_DT A, SR01_FRM_VALIDASI_IT B, SR01_FRM_SATUAN_MS C
                                        WHERE A.LOKASI_ID = B.LOKASI_ID AND A.EPISODE_ID = B.EPISODE_ID AND A.PASIEN_ID = B.PASIEN_ID AND A.LAYAN_ID = B.OBAT_ID
                                        AND B.SATUAN_ID = C.SATUAN_ID
                                        AND A.AKTIF = '1' AND B.SHOW_ITEM = '1' AND C.AKTIF = '1' 
                                        AND A.LOKASI_ID='001'
                                        AND A.PASIEN_ID='" . $pasienid . "'
                                        AND A.EPISODE_ID='" . $episodeid . "'

                                        -- SELECT KETERANGAN, A.TRANS_ID, LAYAN_ID,
                                        --         DECODE(( SELECT DISTINCT TYPE FROM SR01_FRM_VALIDASI_IT WHERE LOKASI_ID='001' AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID AND OBAT_ID=A.LAYAN_ID ), NULL, NAMA_LAYAN,'00',NAMA_LAYAN,'02',NAMA_LAYAN||' / '||(SELECT NAMA_OBAT FROM SR01_FRM_VALIDASI_IT WHERE LOKASI_ID='001' AND SHOW_ITEM='1' AND TYPE='01' AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID AND OBAT_ID=( SELECT HEADER FROM SR01_FRM_VALIDASI_IT WHERE LOKASI_ID='001' AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID AND OBAT_ID=A.LAYAN_ID )),' - '||NAMA_LAYAN)NAMA_LAYAN, QTY, HARGA_SATUAN, HARGA_TOTAL, '2'JENIS,
                                        --         ( SELECT KETERANGAN FROM SR01_FRM_SATUAN_MS WHERE AKTIF='1' AND SATUAN_ID=(SELECT DISTINCT SATUAN_ID FROM SR01_FRM_VALIDASI_IT WHERE LOKASI_ID='001' AND SATUAN_ID IS NOT NULL AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID AND OBAT_ID=A.LAYAN_ID ))SATUAN,
                                        --         ( SELECT DISTINCT TYPE FROM SR01_FRM_VALIDASI_IT WHERE LOKASI_ID='001' AND SATUAN_ID IS NOT NULL AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID AND OBAT_ID=A.LAYAN_ID )TYPE,
                                        --         CASE
                                        --             WHEN ( SELECT DISTINCT TYPE FROM SR01_FRM_VALIDASI_IT WHERE LOKASI_ID='001' AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID AND OBAT_ID=A.LAYAN_ID ) IN ('00','02') THEN
                                        --             ( SELECT DISTINCT SIGNA_DOKTER FROM SR01_FRM_VALIDASI_IT WHERE LOKASI_ID='001' AND SIGNA_DOKTER IS NOT NULL AND TRANS_CO LIKE 'C%' AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID AND OBAT_ID=A.LAYAN_ID AND SHOW_ITEM = '1')
                                        --             ELSE
                                        --             '' 
                                        --         END SIGNADOKTER,
                                        --         ( SELECT DISTINCT HEADER FROM SR01_FRM_VALIDASI_IT WHERE LOKASI_ID='001' AND TRANS_CO LIKE 'C%' AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID AND OBAT_ID=A.LAYAN_ID )HEADER

                                        -- FROM SR01_RJ_BPJS_DT A
                                        -- WHERE A.LOKASI_ID='001'
                                        -- AND   A.PASIEN_ID='" . $pasienid . "'
                                        -- AND   A.EPISODE_ID='" . $episodeid . "'

                                        UNION

                                        SELECT A.KETERANGAN, ''TRANS_ID, ''LAYAN_ID, ''NAMA_LAYAN, 0 QTY, 0HARGA_SATUAN, SUM(HARGA_TOTAL)HARGA_TOTAL, '3'JENIS, ''SATUAN,''TYPE,''SIGNADOKTER,''HEADER
                                        FROM SR01_RJ_BPJS_DT A
                                        WHERE A.LOKASI_ID='001'
                                        AND   A.PASIEN_ID='" . $pasienid . "'
                                        AND   A.EPISODE_ID='" . $episodeid . "'
                                        GROUP BY KETERANGAN
                                    )X

                                UNION

                                SELECT ''KETERANGAN, ''TRANS_ID, ''LAYAN_ID, ''NAMA_LAYAN, 0 QTY, 0HARGA_SATUAN, SUM(HARGA_TOTAL)HARGA_TOTAL, '4'JENIS, ''SATUAN,''TYPE,''SIGNADOKTER,''HEADER
                                FROM SR01_RJ_BPJS_DT A
                                WHERE A.LOKASI_ID='001'
                                AND   A.PASIEN_ID='" . $pasienid . "'
                                AND   A.EPISODE_ID='" . $episodeid . "'
                            )Y
                            ORDER BY KETERANGAN ASC, JENIS ASC, HEADER ASC, TYPE ASC, NAMA_LAYAN ASC
                    ";

        $recordset = $this->db->query($query);
        $recordset = $recordset->result();
        return $recordset;
    }

    function rincianbillingri($pasienid, $episodeid)
    {
        $query =
            "
                    SELECT Y.*
                    FROM(
                            SELECT X.*
                            FROM (
                                    SELECT DISTINCT ''TRANS_ID, ''KETERANGAN, ''TANGGAL, 0QTY, 0HARGA_SATUAN, 0SUBTOTAL, A.KODE, '1' JENIS
                                    FROM SR01_REK_BPJS_DT A
                                    WHERE A.LOKASI_ID='001'
                                    AND   A.PASIEN_ID='" . $pasienid . "'
                                    AND   A.EPISODE_ID='" . $episodeid . "'
                                    
                                    UNION
                                    
                                    SELECT A.TRANS_ID, KETERANGAN, TO_CHAR(TGL_TRANSAKSI, 'DD.MM.YYYY')TANGGAL, QTY, HARGA_SATUAN, SUBTOTAL, KODE, '2'JENIS
                                    FROM SR01_REK_BPJS_DT A
                                    WHERE A.LOKASI_ID='001'
                                    AND   A.PASIEN_ID='" . $pasienid . "'
                                    AND   A.EPISODE_ID='" . $episodeid . "'
                                    
                                    UNION
                                    
                                    SELECT DISTINCT ''TRANS_ID, ''KETERANGAN, ''TANGGAL, 0QTY, 0HARGA_SATUAN, SUM(SUBTOTAL), A.KODE, '3' JENIS
                                    FROM SR01_REK_BPJS_DT A
                                    WHERE A.LOKASI_ID='001'
                                    AND   A.PASIEN_ID='" . $pasienid . "'
                                    AND   A.EPISODE_ID='" . $episodeid . "'
                                    GROUP BY KODE
                                )X
                            
                            UNION
                            
                            SELECT DISTINCT ''TRANS_ID, ''KETERANGAN, ''TANGGAL, 0QTY, 0HARGA_SATUAN, SUM(SUBTOTAL), ''KODE, '4' JENIS
                            FROM SR01_REK_BPJS_DT A
                            WHERE A.LOKASI_ID='001'
                            AND   A.PASIEN_ID='" . $pasienid . "'
                            AND   A.EPISODE_ID='" . $episodeid . "'
                        )Y
                    ORDER BY KODE ASC, JENIS ASC, TANGGAL ASC, KETERANGAN ASC
                    ";

        $recordset = $this->db->query($query);
        $recordset = $recordset->result();
        return $recordset;
    }

    function triase($transid)
    {
        $query =
            "
                        SELECT A.ANAMNESIS, BREAT_IP_NORMAL, BREAT_IP_TACHI, BREAT_IP_BRAD, BREAT_IP_APNEU, BREAT_BN_NORMAL, BREAT_BN_WHEE, BREAT_BN_STRIDOR, BREAT_BN_RHONKI, BREAT_PP_SIMETRIS, BREAT_PP_ASIMETRIS, BREAT_OTOT_BAHU, BREAT_OTOT_DADA, BREAT_OTOT_HIDUNG, BREAT_OTOT_PERUT, NYERI_1,NYERI_2,NYERI_3,NYERI_4,NYERI_5,NYERI_6,NYERI_7,NYERI_8,NYERI_9,NYERI_10, RESIKO_JATUH, MACAM_TRAU, MACAM_NONTRAU, MACAM_VISUM, MACAM_KLL, MACAM_KDRT, MACAM_CHILD, MACAM_KECELAKAAN, ALERGI_TIDAK, ALERGI_ADA, ALERGI_KET, ASAL_POS, ASAL_KLI, ASAL_RB, ASAL_RS, ASAL_LAIN, ASAL_LAIN_KET, KU_BAIK, KU_SEDANG, KU_BURUK, K_E, K_V, K_M, TB, BB, SUHU, TD, DISTOL, FND, FNF, AIR_BEBAS, AIR_ASING, AIR_SPUTUM, AIR_DARAH, AIR_LIDAH, CIRC_PK_KURANG, CIRC_PK_LEBIH, CIRC_EK_HANGAT, CIRC_EK_DINGIN, CIRC_EK_PUCAT, CIRC_EK_SIANOSIS, KAT_MERAH, KAT_KUNING, KAT_HIJAU, KAT_HITAM, TIND_PERIKSA, TIND_PERAWATAN_OBSER, TIND_PERIKSA_RESUITASI, TIND_JENAZAH, TO_CHAR(CREATED_DATE,'DD.MM.YYYY HH24:MI:SS')JAMBUAT,
                            (SELECT NAMA      FROM SR01_GEN_USER_DATA     WHERE 'SIRS01_'||USER_ID=A.CREATED_BY) DIBUATOLEH
                            
                                        
                        FROM SR01_MED_TRIASE_HD A
                        WHERE A.AKTIF='1'
                        AND   A.TRANS_ID='" . $transid . "'
            
                    ";

        $recordset = $this->db->query($query);
        $recordset = $recordset->result();
        return $recordset;
    }

    function orderlab($pasienid, $episodeid)
    {
        $query =
            "
                        SELECT X.*,
                                (SELECT DISTINCT PASIEN_ID FROM DT_TES_ORDER WHERE DONE_STATUS='04' AND SHOW_ITEM='1' AND SAMPEL_ID=X.SAMPELID )PASIENIDLAB
                        FROM(
                        SELECT DISTINCT A.PASIEN_ID, EPISODE_ID, TRANS_CO, TRANS_ID, CREATED_DATE, CREATED_BY, TO_CHAR(A.CREATED_DATE,'DD-MM-YYYY HH24:MI:SS')TANGGAL, LAB_KE,
                                
                                (SELECT SAMPEL_ID FROM SR01_WORKLIST_LAB  WHERE LOKASI_ID='001' AND AKTIF='1' AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID AND TRANS_CO=A.TRANS_CO AND LAB_KE=A.LAB_KE) SAMPELID,
                                (SELECT STATUS    FROM SR01_WORKLIST_LAB  WHERE LOKASI_ID='001' AND AKTIF='1' AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID AND TRANS_CO=A.TRANS_CO AND LAB_KE=A.LAB_KE) STATUS,
                                DECODE((SELECT NAMA FROM SR01_MED_DOKTER_MS WHERE LOKASI_ID='001' AND DOKTER_ID=A.CREATED_BY), NULL, ( SELECT NAMA FROM SR01_GEN_USER_DATA WHERE LOKASI_ID='001' AND AKTIF='1' AND 'SIRS01_'||USER_ID=A.CREATED_BY), (SELECT NAMA FROM SR01_MED_DOKTER_MS WHERE LOKASI_ID='001' AND DOKTER_ID=A.CREATED_BY)) DOKTER
                        FROM WEB_CO_LAB_DT A
                        WHERE A.SHOW_ITEM='1'
                        AND   A.PASIEN_ID='" . $pasienid . "'
                        AND   A.EPISODE_ID='" . $episodeid . "'
                        ORDER BY A.CREATED_DATE DESC, A.LAB_KE DESC
                        )X
                    ";

        $recordset = $this->db->query($query);
        $recordset = $recordset->result();
        return $recordset;
    }

    function orderrad($pasienid, $episodeid)
    {
        $query =
            "
                        SELECT A.PASIEN_ID, EPISODE_ID, TRANS_CO, TO_CHAR(CREATED_DATE, 'DD.MM.YYYY HH24:MI:SS')CREATED_DATE,
                                ( SELECT NAMA FROM SR01_MED_DOKTER_MS WHERE LOKASI_ID='001' AND AKTIF='1' AND DOKTER_ID=A.DOKTER_ID )NAMADOKTER
                        FROM SR01_WORKLIST_RAD A
                        WHERE A.LOKASI_ID='001'
                        AND   A.AKTIF='1'
                        AND   A.STATUS IN ('1','4')
                        AND   A.PASIEN_ID='" . $pasienid . "'
                        AND   A.EPISODE_ID='" . $episodeid . "'
                        ORDER BY A.CREATED_DATE DESC
                    ";

        $recordset = $this->db->query($query);
        $recordset = $recordset->result();
        return $recordset;
    }

    function radetail($episodeid, $transcorad)
    {
        $query =
            "
                        SELECT X.*,
                            ( SELECT NAMA_LAYAN1 FROM SR01_KEU_LAYAN_MS WHERE LOKASI_ID='001' AND AKTIF='1' AND LAYAN_ID=X.TEST_ID )NAMAPELAYANAN
                        FROM(
                        SELECT A.TRANS_CO, PASIEN_ID, EPISODE_ID, TRANS_RAD,
                            ( SELECT ITEM_ID FROM RP2_ORDER_IT WHERE LOKASI_ID='001' AND AKTIF='1' AND TRANS_ID=A.TRANS_RAD )TEST_ID
                        FROM SR01_WORKLIST_RAD_DT A
                        WHERE A.AKTIF='1'
                        AND   A.EPISODE_ID='" . $episodeid . "'
                        AND   A.TRANS_CO='" . $transcorad . "'
                        )X
                    ";

        $recordset = $this->db->query($query);
        $recordset = $recordset->result();
        return $recordset;
    }

    function hasilrad($transrad)
    {
        $query =
            "
                        SELECT A.RESULT_RTF, A.ADDENDUM_RTF, TO_CHAR(A.CREATED_DATE,'DD-MM-YYYY HH24:MI:SS') TGL_ACC,
                                ( SELECT NAMA FROM RP2_USER_MS WHERE 'RP2_'||NIK=A.CREATED_BY )DIBUATOLEH
                        FROM WEB_HASIL_RIS A
                        WHERE TRANS_ID='" . $transrad . "'
                    ";

        $recordset = $this->db->query($query);
        $recordset = $recordset->result();
        return $recordset;
    }
    function hasilris($transrad)
    {
        $query = "
            SELECT EXPERTISE_HTML_FINDING ||'<br/>'|| EXPERTISE_HTML_CONCLUSION EXPERTISE
            FROM RAD_MANAGER.RIS_OUT
            WHERE NO_RONTGEN = '{$transrad}'
        ";
        return $this->db->query($query)->row();
    }

    function resultlab($pasienidlab, $sampelid)
    {
        $query =
            "
                        SELECT SUBSTR(LPAD(' ',((ITEM_LEVEL-2)*2))||A.NAME1,1,400) NAMA_TES,
                                    A.NAME1,A.TEST_ID,ITEM_LEVEL,UNITS,SUB_STRUCTURE_TYPE,A.RESULT_ID,
                                    B.HASIL_NOTE_ID,RESULT_FLAG,FLAG,DONE_STATUS,SAMPEL_ID,PASIEN_ID,B.CREATED_DATE,
                                    ( SELECT PASIEN_ID FROM SR01_WORKLIST_LAB WHERE LOKASI_ID='001' AND AKTIF='1' AND SAMPEL_ID=B.SAMPEL_ID )PASIENID,
                                    ( SELECT EPISODE_ID FROM SR01_WORKLIST_LAB WHERE LOKASI_ID='001' AND AKTIF='1' AND SAMPEL_ID=B.SAMPEL_ID )EPISODEID,
                                    DECODE(CRITICALAPP(B.SAMPEL_ID,B.PASIEN_ID,B.TEST_ID),'1',(DECODE(A.RESULT_ID,'1',B.SIGN||B.RESULT_VALUE||' ('||SUBSTR(GET_INTERPRETASI_AMBANG_BATAS(B.DEMOGRAPHIC_ID, B.SAMPEL_ID, B.TEST_ID, B.REFERENCE_ID, B.REFERENCE_ID_AGE, B.RESULT_VALUE, B.SIGN),1,15)||')', B.SIGN||B.RESULT_VALUE)),'0','Hasil Tidak Ditampilkan') RESULT_VALUE,
                                    SUBSTR(GETNORMAL_STATUS(A.RESULT_ID,  B.REFERENCE_ID, B.REFERENCE_ID_AGE, B.TEST_ID, B.PASIEN_ID),1,100) ANGKA_NORMAL,
                                    SUBSTR(GETRUJUKANLUAR(B.PASIEN_ID,B.SAMPEL_ID,0,A.TEST_ID,B.NILAI_RUJUKAN_ID),1,100) RUJUK_LUAR,
                                    ( SELECT TO_CHAR(DI_ACC_TGL,'DD-MM-YYYY HH24:MM:SS') FROM SAMPEL WHERE SAMPEL_ID=B.SAMPEL_ID AND PASIEN_ID=B.PASIEN_ID) ACC_TGL,
                                    (
                                        SELECT COUNT(A1.SAMPEL_ID)
                                        FROM  DT_TES_ORDER A1,
                                            MS_TEST_LAB B1,
                                            SAMPEL C1 
                                        WHERE A1.PASIEN_ID=B.PASIEN_ID
                                        AND A1.DONE_STATUS='04'
                                        AND A1.SHOW_ITEM='1'
                                        AND B1.TEST_ID=A1.TEST_ID
                                        AND A1.TEST_ID=A.TEST_ID
                                        AND C1.DI_ACC_OLEH IS NOT NULL
                                        AND C1.SAMPEL_ID=A1.SAMPEL_ID
                                        AND C1.SHOW_ITEM='1'
                                        AND A1.SAMPEL_ID <>B.SAMPEL_ID
                                    )JML
                                    
                                    
                        FROM MS_TEST_LAB  A,
                            DT_TES_ORDER B
                            
                        WHERE A.SHOW_ITEM='1'
                        AND   A.OWNER <> 'MASTER TES'
                        AND   A.SUB_STRUCTURE_TYPE<>0
                        AND   A.TEST_ID IN (
                                                SELECT DISTINCT(A.TEST_ID)
                                                FROM MS_TEST_LAB A 
                                                START WITH A.TEST_ID IN (
                                                                            SELECT X.TEST_ID
                                                                            FROM DT_TES_ORDER X,
                                                                                SAMPEL Y
                                                                            WHERE X.PASIEN_ID='" . $pasienidlab . "'
                                                                            AND   X.SAMPEL_ID='" . $sampelid . "'
                                                                            AND   X.SHOW_ITEM='1'
                                                                            AND   TO_NUMBER(X.DONE_STATUS) = 4
                                                                            AND   Y.SAMPEL_ID=X.SAMPEL_ID
                                                                            AND   Y.PASIEN_ID=X.PASIEN_ID
                                                                            AND   X.LAST_UPDATED_DATE<=Y.DI_ACC_TGL
                                                                            AND   Y.SHOW_ITEM='1'
                                                                            )
                                                CONNECT BY PRIOR A.OWNER=A.TEST_ID
                                            )
                        AND B.DONE_STATUS (+) = '04'
                        AND B.PASIEN_ID   (+) ='" . $pasienidlab . "'
                        AND B.SAMPEL_ID   (+) ='" . $sampelid . "'
                        AND B.TEST_ID     (+) = A.TEST_ID
                        ORDER BY A.SORT_PRIORITY
                    ";

        $recordset = $this->db->query($query);
        $recordset = $recordset->result();
        return $recordset;
    }

    function explab($noteid)
    {
        $query =
            "
                        SELECT HASIL_TEKS
                        FROM HASIL_NOTE 
                        WHERE HASIL_NOTE_ID='" . $noteid . "'
                    ";

        $recordset = $this->db->query($query);
        $recordset = $recordset->result();
        return $recordset;
    }

    function chartlab($pasienidlab, $testid, $pasienid, $episodeid)
    {
        $query =
            "
                    SELECT X.*
                    FROM (
                            SELECT A.SAMPEL_ID,A.TEST_ID, A.RESULT_FLAG FLAG, TO_CHAR(A.CREATED_DATE,'dd-mm-yyyy HH24:MI:SS') CREATED_DATE,
                                   B.NAME1,
                                   DECODE(CRITICALAPP(A.SAMPEL_ID,A.PASIEN_ID,A.TEST_ID),'1',A.RESULT_VALUE,'0','Hasil Tidak Ditampilkan') HASIL
                            FROM DT_TES_ORDER A,
                                 MS_TEST_LAB  B
                            WHERE A.TEST_ID='" . $testid . "'
                            AND   A.DONE_STATUS='04'
                            AND   A.SHOW_ITEM='1'
                            AND   A.PASIEN_ID='" . $pasienidlab . "'
                            AND   A.SAMPEL_ID = ( SELECT SAMPEL_ID FROM SR01_WORKLIST_LAB WHERE LOKASI_ID='001' AND PASIEN_ID='" . $pasienid . "' AND EPISODE_ID='" . $episodeid . "' AND SAMPEL_ID=A.SAMPEL_ID)
                            AND  B.TEST_ID=A.TEST_ID
                            ORDER BY A.CREATED_DATE ASC
                         )X
                    ";

        $recordset = $this->db->query($query);
        $recordset = $recordset->result();
        return $recordset;
    }

    function resumediagnosa($episodeid)
    {
        $query =
            "
                        SELECT A.ICD10_ID, JENIS,
                                ( SELECT KODE_ICD FROM SR01_MED_ICD10_MS WHERE SHOW_ITEM='1' AND KODE=A.ICD10_ID )KODEICD,
                                ( SELECT NM_DIAG1 FROM SR01_MED_ICD10_MS WHERE SHOW_ITEM='1' AND KODE=A.ICD10_ID )DIAGNOSA
                        FROM SR01_RM_RESUME_ICD10 A
                        WHERE A.AKTIF='1'
                        AND   A.ICD10_ID IS NOT NULL
                        AND   A.ICD10_ID <>'-'
                        AND   A.JNS_R='F'
                        AND   A.JENIS IN ('1','2')
                        AND   A.EPISODE_ID='" . $episodeid . "'
                        ORDER BY JENIS ASC, CREATED_DATE DESC  
                    ";

        $recordset = $this->db->query($query);
        $recordset = $recordset->result();
        return $recordset;
    }

    function resumediagnosaCOINSIDEN($episodeid)
    {
        $query =
            "
                        SELECT A.ICD10_ID, JENIS,
                                ( SELECT KODE_ICD FROM SR01_MED_ICD10_MS WHERE SHOW_ITEM='1' AND KODE=A.ICD10_ID )KODEICD,
                                ( SELECT NM_DIAG1 FROM SR01_MED_ICD10_MS WHERE SHOW_ITEM='1' AND KODE=A.ICD10_ID )DIAGNOSA
                        FROM SR01_RM_RESUME_ICD10 A
                        WHERE A.AKTIF='1'
                        AND   A.ICD10_ID IS NOT NULL
                        AND   A.ICD10_ID <>'-'
                        AND   A.JNS_R='F'
                        AND   A.JENIS IN ('3','4')
                        AND   A.EPISODE_ID='" . $episodeid . "'
                        ORDER BY JENIS ASC, CREATED_DATE DESC  
                    ";

        $recordset = $this->db->query($query);
        $recordset = $recordset->result();
        return $recordset;
    }

    function resumetindakan($episodeid)
    {
        $query =
            "
                        SELECT A.ICD9_ID,
                                ( SELECT KODE_ICD         FROM SR01_MED_ICD9_MS WHERE SHOW_ITEM='1' AND KODE=A.ICD9_ID )KODEICD,
                                ( SELECT LONG_DESCRIPTION FROM SR01_MED_ICD9_MS WHERE SHOW_ITEM='1' AND KODE=A.ICD9_ID )DIAGNOSA
                        FROM SR01_RM_RESUME_ICD9 A
                        WHERE A.AKTIF='1'
                        AND   A.ICD9_ID IS NOT NULL
                        AND   A.JNS_R='F'
                        AND   A.EPISODE_ID='" . $episodeid . "'
                        ORDER BY DIAGNOSA ASC
                    ";

        $recordset = $this->db->query($query);
        $recordset = $recordset->result();
        return $recordset;
    }

    function resumeanamnesa($episodeid)
    {
        $query =
            "
                        SELECT A.KELUHAN_UTAMA, GEJALA_PENYERTA, RIWAYAT_PENYAKIT, PEMERIKSAAN_FISIK, PERIKSA_LAB, PENCITRAAN_DIAGNOSTIK, SEGERA_DIBAWA_BILA, KONSULTASI,
                                ( SELECT LAINNYA FROM WEB_CO_RESUME WHERE SHOW_ITEM='1' AND EPISODE_ID='" . $episodeid . "' )LAINNYA,
                                ( SELECT KONTROL FROM WEB_CO_RESUME WHERE SHOW_ITEM='1' AND EPISODE_ID='" . $episodeid . "' )KONTROL_ULANG
                        FROM SR01_RESUME_MEDIS A
                        WHERE A.EPISODE_ID='" . $episodeid . "'
                    ";

        $recordset = $this->db->query($query);
        $recordset = $recordset->result();
        return $recordset;
    }

    function resumeri($pasienid, $episodeid)
    {
        $query =
            "
                        SELECT A.KELUHAN, GEJALA, RIWAYATPS, RIWAYATPD, VITAL, STATUS, LAINNYA, INDIKASI, OBATP, KONTROL, INTRUKSI, KONDISI, SEVERITY, DLL
                        FROM WEB_CO_RESUME_RANAP A
                        WHERE A.SHOW_ITEM='1'
                        AND   A.PASIEN_ID='" . $pasienid . "'
                        AND   A.EPISODE_ID='" . $episodeid . "'
                    ";

        $recordset = $this->db->query($query);
        $recordset = $recordset->result();
        return $recordset;
    }

    function resumeobat($pasienid, $episodeid)
    {
        $query =
            "
                        SELECT A.OBAT_ID, UPPER(NAMA_OBAT)NAMA_OBAT, SUM(QTY)QTY, TYPE, HEADER,
                                ( SELECT KETERANGAN FROM SR01_FRM_SATUAN_MS WHERE AKTIF='1' AND SATUAN_ID=A.SATUAN_ID )SATUAN
                        FROM WEB_CO_RESEP_DT A
                        WHERE A.SHOW_ITEM='1'
                        AND   A.QTY IS NOT NULL
                        AND   A.PASIEN_ID='" . $pasienid . "'
                        AND   A.EPISODE_ID='" . $episodeid . "'
                        GROUP BY OBAT_ID, UPPER(NAMA_OBAT), TYPE, HEADER, SATUAN_ID
                        ORDER BY TYPE ASC, HEADER ASC, UPPER(NAMA_OBAT) ASC
                    ";

        $recordset = $this->db->query($query);
        $recordset = $recordset->result();
        return $recordset;
    }

    function resumelab($episodeid)
    {
        $query =
            "
                        SELECT A.SAMPEL_ID, A.NAMA_TEST, A.RESULT_ID, A.UNIT, A.RESULT_VALUE, A.RESULT_FLAG, A.ANGKA_NORMAL, TO_CHAR(A.CREATED_DATE, 'DD.MM.YYYY')CREATED_DATE, A.SORT_PRIORITY
                        FROM SR01_RESUME_LAB A
                        WHERE A.PILIH='1'
                        AND   A.EPISODE_ID='" . $episodeid . "'
                        
                        ORDER BY SAMPEL_ID ASC, SORT_PRIORITY ASC
                    ";

        $recordset = $this->db->query($query);
        $recordset = $recordset->result();
        return $recordset;
    }

    function resumerad($pasienid, $episodeid)
    {
        $query =
            "
                        SELECT DISTINCT TEST_ID,
                                ( SELECT NAMA_LAYAN1 FROM SR01_KEU_LAYAN_MS WHERE LOKASI_ID='001' AND AKTIF='1' AND LAYAN_ID=A.TEST_ID )NAMAPELAYANAN
                        FROM WEB_CO_RAD_DT A
                        WHERE A.SHOW_ITEM='1'
                        AND   A.PASIEN_ID='" . $pasienid . "'
                        AND   A.EPISODE_ID='" . $episodeid . "'
                        AND   A.TRANS_CO IN ( SELECT TRANS_CO FROM SR01_WORKLIST_RAD WHERE LOKASI_ID='001' AND AKTIF='1' AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID ) 
                    ";

        $recordset = $this->db->query($query);
        $recordset = $recordset->result();
        return $recordset;
    }

    function konsul($pasienid, $episodeid)
    {
        $query =
            "
                        SELECT A.S, O, A, P, TO_CHAR(A.CREATED_DATE,'DD.MM.YYYY HH24:MI:SS')CREATED_DATE,
                                ( SELECT NAMA FROM SR01_MED_DOKTER_MS WHERE LOKASI_ID='001' AND DOKTER_ID=A.DOKTER_ID )NAMADOKTER
                        FROM SR01_RM_DIAGNOSA_DT A
                        WHERE A.SHOW_ITEM='1'
                        AND   A.PASIEN_ID='" . $pasienid . "'
                        AND   A.EPISODE_ID='" . $episodeid . "'
                        ORDER BY A.CREATED_DATE ASC
                    ";

        $recordset = $this->db->query($query);
        $recordset = $recordset->result();
        return $recordset;
    }

    function soapdr($pasienid, $episodeid)
    {
        $query =
            "
                        SELECT A.S, S2, S3, O, A, P, TO_CHAR(CREATED_DATE, 'DD.MM.YYYY HH24:MI:SS')CREATEDATE,
                                ( SELECT NAMA FROM SR01_MED_DOKTER_MS WHERE LOKASI_ID='001' AND AKTIF='1' AND DOKTER_ID=A.CREATED_BY )CREATEDBY
                        FROM WEB_CO_DIAGNOSA_DT A
                        WHERE A.SHOW_ITEM='1'
                        AND   A.FLAG_HAPUS='1'
                        AND   A.CREATED_BY LIKE 'DR%'
                        AND   A.PASIEN_ID='" . $pasienid . "'
                        AND   A.EPISODE_ID='" . $episodeid . "'
                    ";

        $recordset = $this->db->query($query);
        $recordset = $recordset->result();
        return $recordset;
    }

    function soapdrlast($pasienid, $poliid, $dokterid, $tglmasuk)
    {
        $query =
            "
                        SELECT A.S, S2, S3, O, A, P, TO_CHAR(CREATED_DATE, 'DD.MM.YYYY HH24:MI:SS')CREATEDATE,
                                ( SELECT NAMA FROM SR01_MED_DOKTER_MS WHERE LOKASI_ID='001' AND AKTIF='1' AND DOKTER_ID=A.CREATED_BY )CREATEDBY
                        FROM WEB_CO_DIAGNOSA_DT A
                        WHERE A.SHOW_ITEM='1'
                        AND   A.FLAG_HAPUS='1'
                        AND   A.CREATED_BY LIKE 'DR%'
                        AND   A.PASIEN_ID='" . $pasienid . "'
                        AND   A.POLI_ID='" . $poliid . "'
                        AND   A.DOKTER_ID='" . $dokterid . "'
                        AND   A.CREATED_DATE = ( SELECT MAX(CREATED_DATE) FROM WEB_CO_DIAGNOSA_DT WHERE TRUNC(CREATED_DATE) < TO_DATE('09.11.2021', 'DD.MM.YYYY') AND SHOW_ITEM=A.SHOW_ITEM AND FLAG_HAPUS=A.FLAG_HAPUS AND PASIEN_ID=A.PASIEN_ID AND POLI_ID=A.POLI_ID AND DOKTER_ID=A.DOKTER_ID )
                    ";

        $recordset = $this->db->query($query);
        $recordset = $recordset->result();
        return $recordset;
    }

    function soapprwt($pasienid, $episodeid)
    {
        $query =
            "
                        SELECT A.S, S2, S3, O, A, P, TO_CHAR(CREATED_DATE, 'DD.MM.YYYY HH24:MI:SS')CREATEDATE,
                                ( SELECT NAMA FROM SR01_GEN_USER_DATA WHERE LOKASI_ID='001' AND AKTIF='1' AND UPPER(USER_ID)=UPPER(A.CREATED_BY) )CREATEDBY
                        FROM WEB_CO_DIAGNOSA_DT A
                        WHERE A.SHOW_ITEM='1'
                        AND   A.FLAG_HAPUS='1'
                        AND   A.CREATED_BY NOT LIKE 'DR%'
                        AND   A.PASIEN_ID='" . $pasienid . "'
                        AND   A.EPISODE_ID='" . $episodeid . "'
                    ";

        $recordset = $this->db->query($query);
        $recordset = $recordset->result();
        return $recordset;
    }

    function laporan($jenis, $pasienid, $episodeid)
    {
        $query =
            "
                        SELECT A. JENIS_LAP, PENOLONG, AHLI_BEDAH, AHLI_ANESTESI, ASISTEN, PERAWAT, JNS_ANES, DIAGNOSIS_PASCA, DIAGNOSIS_PRA, MACAM, LAPORAN, TO_CHAR(TANGGAL, 'DD.MM.YYYY')TANGGAL, JAM_MULAI, JAM_AKHIR, LAMA, PENDARAHAN, KOMPLIKASI, JARINGAN, PA
                        FROM WEB_CO_LAPORAN A
                        WHERE A.SHOW_ITEM='1'
                        AND   A.JENIS_LAP='" . $jenis . "'
                        AND   A.PASIEN_ID='" . $pasienid . "'
                        AND   A.EPISODE_ID='" . $episodeid . "'
                    ";

        $recordset = $this->db->query($query);
        $recordset = $recordset->result();
        return $recordset;
    }
    public function getEpisode($episodeId)
    {
        $query = "
            SELECT X.*,
                (
                    SELECT
                        CASE
                            WHEN POLI_BPJSID = 'PAR' THEN 'POLI PARU / POLI PARU (TB)'
                            WHEN POLI_BPJSID = '007' THEN 'HEMODIALISA'
                            WHEN POLI_BPJSID = 'HDL' THEN 'HEMODIALISA'
                            ELSE KETERANGAN
                        END AS POLI_RUJUKAN
                    FROM SR01_MED_POLI_MS
                    WHERE POLI_BPJSID = X.POLI_ID_BPJS_RUJUKAN
                        AND ROWNUM = 1
                ) POLI_RUJUKAN
            FROM (
                 SELECT
                    A.EPISODE_ID, A.PASIEN_ID, A.POLI_ID, A.DOKTER_ID, TO_CHAR(A.TGL_MASUK, 'DD.MM.YYYY') AS TGL_MASUK, TO_CHAR(A.TGL_KELUAR, 'DD.MM.YYYY HH24:MI:SS') AS TGL_KELUAR, A.REKANAN_ID,G.ADA_PAKET, G.PAKET_ID, H.JADWAL_ID, H.JAM_MULAI, H.JAM_SELESAI,
                    CASE
                        WHEN A.TGL_KELUAR IS NOT NULL THEN '1'
                        ELSE '0'
                    END IS_CLOSING,
                    B.NOKUNJUNGAN, B.SEP_NORUJUK, B.SEP_NOMOR, TO_CHAR(B.TGLKUNJUNGAN,'YYYY-MM-DD') TGLKUNJUNGAN, SR01_GET_SUFFIX(A.PASIEN_ID) NAMA_LENGKAP_GELAR_PASIEN, B.POLIRUJUKAN_KDPOLI POLI_ID_BPJS_RUJUKAN, 
                    TO_CHAR(B.SEP_TGLRUJUK, 'DD.MM.YYYY') TGL_RUJUK, TO_CHAR(B.SEP_TGLRUJUK, 'YYYY-MM-DD') TGL_RUJUK_ISO, 
                    TO_CHAR(B.SEP_TGLRUJUK + 90, 'DD.MM.YYYY') TGL_BERLAKU, TO_CHAR(B.SEP_TGLRUJUK + 90, 'YYYY-MM-DD') TGL_BERLAKU_ISO,
                    C.INT_PASIEN_ID, C.NAMA AS NAMA_PASIEN, TO_CHAR(C.TGL_LAHIR, 'DD.MM.YYYY') AS TGL_LAHIR, C.SEX_ID, C.BPJS_NO, C.NO_IDENTITAS, C.NO_SELULAR, C.EMAIL,
                    D.KETERANGAN AS NAMA_POLI, D.POLI_BPJSID AS POLI_ID_BPJS,
                    E.NAMA AS NAMA_DOKTER, E.PREFIX AS DOKTER_ID_BPJS, E.NO_SIP,
                    F.NAMA AS NAMA_REKANAN,
                    (SELECT TRANS_ID FROM SR01_MED_PRWT_TR WHERE EPISODE_ID = A.EPISODE_ID AND AKTIF = '1' AND ROWNUM = 1) TRANS_ID,
                    (SELECT KETERANGAN FROM SR01_GEN_GLOBAL_MS WHERE LOKASI_ID = A.LOKASI_ID AND GLOBAL_ID = C.AGAMA_ID AND JENIS_ID = 'SAGM') AGAMA,
                    -- (SELECT TRANS_ID FROM SR01_KEU_TRANSAKSI_HD WHERE LOKASI_ID = '001' AND EPISODE_ID = '{$episodeId}' AND JENIS_TR = '001' AND AKTIF = '1' AND ROWNUM = 1) TRANS_ID,
                    CASE
                        WHEN G.ICD10 IS NOT NULL THEN '[' || G.ICD10 || '] ' || DIAGNOSA
                        ELSE DIAGNOSA
                    END AS DIAGNOSA,
                    H.NIK NIK_DOKTER,
                    H.KEY ENCODED_PASSPHRASE,
                    (SELECT JENIS_TR FROM WEB_CO_REGISTRASI_ONLINE_HD WHERE EPISODE_ID = A.EPISODE_ID AND AKTIF = '1') JENISTR,
                    I.S, I.O, I.A, I.P, K.DOKTER_ID DPJP_ID, K.NAMA DPJP_NAMA
                    -- (SELECT Y.NO_KTP FROM SR01_GEN_USER_DATA X, HRD_KARYAWAN_MS Y WHERE X.NIK = Y.NIK AND X.DOKTER_ID = A.DOKTER_ID AND ROWNUM = 1) NO_KTP
                    -- (SELECT NIK FROM SR01_ACC_RESUME WHERE DOKTER_ID = A.DOKTER_ID AND TRUNC(CREATED_DATE) = TRUNC(SYSDATE) AND ROWNUM = 1) NO_KTP
                FROM SR01_KEU_EPISODE A
                LEFT JOIN SR01_KEU_BPJS_CVR B ON A.LOKASI_ID = B.LOKASI_ID AND A.EPISODE_ID = B.EPISODE_ID AND A.PASIEN_ID = B.PASIEN_ID
                LEFT JOIN SR01_GEN_PASIEN_MS C ON A.LOKASI_ID = C.LOKASI_ID AND A.PASIEN_ID = C.PASIEN_ID
                LEFT JOIN SR01_MED_POLI_MS D ON A.LOKASI_ID = D.LOKASI_ID AND A.POLI_ID = D.POLI_ID
                LEFT JOIN SR01_MED_DOKTER_MS E ON A.LOKASI_ID = E.LOKASI_ID AND A.DOKTER_ID = E.DOKTER_ID AND E.AKTIF = '1'
                LEFT JOIN SR01_KEU_REKANAN_MS F ON A.LOKASI_ID = F.LOKASI_ID AND A.REKANAN_ID = F.REKANAN_ID
                LEFT JOIN WEB_CO_DIAGNOSA_MS G ON A.EPISODE_ID = G.EPISODE_ID AND A.PASIEN_ID = G.PASIEN_ID AND G.SHOW_ITEM = '1'
                LEFT JOIN WEB_CO_REGISTRASI_ONLINE_HD H ON A.EPISODE_ID = H.EPISODE_ID
                LEFT JOIN WEB_CO_DIAGNOSA_DT I ON A.EPISODE_ID = I.EPISODE_ID AND I.PASIEN_ID = A.PASIEN_ID AND I.SHOW_ITEM = '1'
                  LEFT JOIN SR01_MED_DOKTER_MS K ON K.PREFIX = B.DOKTER_ID
                LEFT JOIN (
                    SELECT DOKTER_ID, NIK, KEY
                    FROM SR01_ACC_RESUME
                    WHERE
                        DOKTER_ID = (SELECT DOKTER_ID FROM SR01_KEU_EPISODE WHERE LOKASI_ID = '001' AND EPISODE_ID = '{$episodeId}' AND AKTIF = '1')
                        AND CREATED_DATE = (
                            SELECT MAX(CREATED_DATE)
                            FROM SR01_ACC_RESUME
                            WHERE DOKTER_ID = (SELECT DOKTER_ID FROM SR01_KEU_EPISODE WHERE LOKASI_ID = '001' AND EPISODE_ID = '{$episodeId}' AND AKTIF = '1')
                                AND AKTIF = '1'
                        )
                ) H ON A.DOKTER_ID = H.DOKTER_ID
                WHERE A.LOKASI_ID = '001'
                    AND A.EPISODE_ID = '{$episodeId}'
                    AND A.STATUS_EPISODE NOT IN ('11', '99')
                    AND A.AKTIF = '1'
            ) X
        ";
        $episode = $this->db->query($query)->row_array();
        return $episode;
    }
    public function gettindakankfr($episodeId)
    {
        $this->db->select('*');
        $this->db->from('CLO_MANAGER.WEB_CO_FRM_TINDAKAN_KFR A');
        $this->db->join('SR01_MED_DOKTER_MS B', 'A.DOKTER_ID = B.DOKTER_ID', 'LEFT');
        $this->db->where("EPISODE_ID = '{$episodeId}' AND A.AKTIF = '1'");
        return $this->db->get()->row_array();
    }
    public function getlayankfr($episodeId)
    {
        $this->db->select('*');
        $this->db->from('CLO_MANAGER.WEB_CO_FRM_LAYAN_KFR A');
        $this->db->join('SR01_MED_DOKTER_MS B', 'A.DOKTER_ID = B.DOKTER_ID', 'LEFT');
        $this->db->where("A.EPISODE_ID = '{$episodeId}' AND A.AKTIF = '1'");
        return $this->db->get()->row_array();
    }
}
