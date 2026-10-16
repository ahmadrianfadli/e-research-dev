<?php
class Modelranap extends CI_Model
{
    public function listpasien($lantai, $kamar, $pencarian)
    {
        $query = "
            SELECT X.*, BC.ICD10_UTAMA DIAGCODER, BC.ICD9_UTAMA TINDAKCODER,
                DM.ICD10, DM.DIAGNOSA DIAGDOKTER, DM.ICD9, DM.TINDAKAN TINDAKDOKTER, SR.S_INACBG FROM(
                SELECT A.EPISODE_ID, A.PASIEN_ID, B.INT_PASIEN_ID,  B.NAMA NAMAPASIEN, C.RUANGRWT_ID, C.RUANG_ID, D.UNIT_ID, E.NAMA_UNIT, D.NAMA_RUANG, TO_CHAR(B.TGL_LAHIR, 'DD.MM.YYYY') AS TGL_LAHIR, F.NAMA NAMADOKTER, TO_CHAR(A.TGL_MASUK, 'DD.MM.YYYY') AS TGLMASUK,TO_CHAR(A.TGL_KELUAR, 'DD.MM.YYYY') AS TGL_KELUAR, HITUNG_UMUR(B.TGL_LAHIR, TRUNC(SYSDATE))UMUR, A.TGL_MASUK,
                (SELECT DISTINCT SEP_NOMOR FROM SR01_KEU_BPJS_CVR WHERE EPISODE_ID = A.EPISODE_ID AND AKTIF = '1' AND SEP_JENISLAYAN = '1') SEP,
                (SELECT COUNT(D.TRANS_CO) FROM WEB_CO_DIAGNOSA_MS D WHERE D.EPISODE_ID=A.EPISODE_ID AND D.PASIEN_ID=A.PASIEN_ID AND D.SHOW_ITEM='1')TRANS_CO, B.BPJS_NO, A.REKANAN_ID
                FROM SR01_KEU_EPISODE A, SR01_MED_RUANG_PRWT C, SR01_GEN_PASIEN_MS B, SR01_MED_RUANG_MS D, SR01_GEN_UNIT_MS E, SR01_MED_DOKTER_MS F
                WHERE
                A.STATUS_EPISODE != '99'
                AND A.EPISODE_ID = C.EPISODE_ID
                AND A.PASIEN_ID = B.PASIEN_ID
                AND C.RUANG_ID = D.RUANG_ID
                AND E.UNIT_ID = D.UNIT_ID
                AND A.DOKTER_ID = F.DOKTER_ID

            UNION ALL

                SELECT A.EPISODE_ID, A.PASIEN_ID, B.INT_PASIEN_ID,  B.NAMA NAMAPASIEN, C.RUANGRWT_ID, C.RUANG_ID, D.UNIT_ID, E.NAMA_UNIT, D.NAMA_RUANG, TO_CHAR(B.TGL_LAHIR, 'DD.MM.YYYY') AS TGL_LAHIR, F.NAMA NAMADOKTER, TO_CHAR(A.TGL_MASUK, 'DD.MM.YYYY') AS TGLMASUK,TO_CHAR(A.TGL_KELUAR, 'DD.MM.YYYY') AS TGL_KELUAR, HITUNG_UMUR(B.TGL_LAHIR, TRUNC(SYSDATE))UMUR, A.TGL_MASUK,
                (SELECT DISTINCT SEP_NOMOR FROM SR01_KEU_BPJS_CVR WHERE EPISODE_ID = A.EPISODE_ID AND AKTIF = '1' AND SEP_JENISLAYAN = '1') SEP,
                (SELECT COUNT(D.TRANS_CO) FROM WEB_CO_DIAGNOSA_MS D WHERE D.EPISODE_ID=A.EPISODE_ID AND D.PASIEN_ID=A.PASIEN_ID AND D.SHOW_ITEM='1')TRANS_CO, B.BPJS_NO, A.REKANAN_ID
                FROM SR01_KEU_EPISODE A, SR01_MED_RUANG_PRWT_TEMP C, SR01_GEN_PASIEN_MS B, SR01_MED_RUANG_MS D, SR01_GEN_UNIT_MS E, SR01_MED_DOKTER_MS F

                WHERE
                A.EPISODE_ID = C.EPISODE_ID
                AND A.PASIEN_ID = B.PASIEN_ID
                AND C.RUANG_ID = D.RUANG_ID
                AND E.UNIT_ID = D.UNIT_ID
                AND A.DOKTER_ID = F.DOKTER_ID

               
            ) X 
             LEFT JOIN WEB_CO_DIAGNOSA_MS DM ON X.EPISODE_ID = DM.EPISODE_ID AND DM.SHOW_ITEM = '1'
             LEFT JOIN SR01_KEU_RIBPJS SR ON SR.EPISODE_ID = X.EPISODE_ID
             LEFT JOIN SR01_BPJS_CODING BC ON X.EPISODE_ID = BC.EPISODE_ID AND BC.AKTIF = '1'
             WHERE (X.INT_PASIEN_ID LIKE '%{$pencarian}%' OR UPPER(X.NAMAPASIEN) LIKE UPPER('%{$pencarian}%'))
             ORDER BY X.TGL_MASUK DESC
        ";
        return $this->db->query($query)->result();
    }
    public function listpasienold($lantai, $kamar, $pencarian)
    {
        $query = "
            SELECT X.*, BC.ICD10_UTAMA, BC.ICD10_SEKUNDER,
                (SELECT LISTAGG(KODE||'^'||KODE_ICD||'^'||DIAGNOSA,'::') WITHIN GROUP (ORDER BY DT.CREATED_DATE ASC)
                FROM WEB_CO_DIAG_DT DT
                WHERE DT.EPISODE_ID = X.EPISODE_ID AND DT.SHOW_ITEM = '1') LISTDIAG,
                (SELECT LISTAGG(KODE||'^'||KODE_ICD||'^'||TINDAKAN,'::') WITHIN GROUP (ORDER BY DT.CREATED_DATE ASC)
                FROM WEB_CO_TINDAK_DT DT
                WHERE DT.EPISODE_ID = X.EPISODE_ID AND DT.SHOW_ITEM = '1') LISTTINDAK,
                DM.ICD10, DM.DIAGNOSA, DM.ICD9, DM.TINDAKAN, SR.S_INACBG FROM(
                SELECT A.EPISODE_ID, A.PASIEN_ID, B.INT_PASIEN_ID,  B.NAMA NAMAPASIEN, C.RUANGRWT_ID, C.RUANG_ID, D.UNIT_ID, E.NAMA_UNIT, D.NAMA_RUANG, TO_CHAR(B.TGL_LAHIR, 'DD.MM.YYYY') AS TGL_LAHIR, F.NAMA NAMADOKTER, TO_CHAR(A.TGL_MASUK, 'DD.MM.YYYY') AS TGLMASUK,TO_CHAR(A.TGL_KELUAR, 'DD.MM.YYYY') AS TGL_KELUAR, HITUNG_UMUR(B.TGL_LAHIR, TRUNC(SYSDATE))UMUR, A.TGL_MASUK,
                (SELECT DISTINCT SEP_NOMOR FROM SR01_KEU_BPJS_CVR WHERE EPISODE_ID = A.EPISODE_ID AND AKTIF = '1' AND SEP_JENISLAYAN = '1') SEP,
                (SELECT D.TRANS_CO FROM WEB_CO_DIAGNOSA_MS D WHERE D.EPISODE_ID=A.EPISODE_ID AND D.PASIEN_ID=A.PASIEN_ID AND D.SHOW_ITEM='1')TRANS_CO, B.BPJS_NO, A.REKANAN_ID
                FROM SR01_KEU_EPISODE A, SR01_MED_RUANG_PRWT C, SR01_GEN_PASIEN_MS B, SR01_MED_RUANG_MS D, SR01_GEN_UNIT_MS E, SR01_MED_DOKTER_MS F
                WHERE
                A.STATUS_EPISODE != '99'
                AND A.EPISODE_ID = C.EPISODE_ID
                AND A.PASIEN_ID = B.PASIEN_ID
                AND C.RUANG_ID = D.RUANG_ID
                AND E.UNIT_ID = D.UNIT_ID
                AND A.DOKTER_ID = F.DOKTER_ID

            UNION ALL

                SELECT A.EPISODE_ID, A.PASIEN_ID, B.INT_PASIEN_ID,  B.NAMA NAMAPASIEN, C.RUANGRWT_ID, C.RUANG_ID, D.UNIT_ID, E.NAMA_UNIT, D.NAMA_RUANG, TO_CHAR(B.TGL_LAHIR, 'DD.MM.YYYY') AS TGL_LAHIR, F.NAMA NAMADOKTER, TO_CHAR(A.TGL_MASUK, 'DD.MM.YYYY') AS TGLMASUK,TO_CHAR(A.TGL_KELUAR, 'DD.MM.YYYY') AS TGL_KELUAR, HITUNG_UMUR(B.TGL_LAHIR, TRUNC(SYSDATE))UMUR, A.TGL_MASUK,
                (SELECT DISTINCT SEP_NOMOR FROM SR01_KEU_BPJS_CVR WHERE EPISODE_ID = A.EPISODE_ID AND AKTIF = '1' AND SEP_JENISLAYAN = '1') SEP,
                (SELECT D.TRANS_CO FROM WEB_CO_DIAGNOSA_MS D WHERE D.EPISODE_ID=A.EPISODE_ID AND D.PASIEN_ID=A.PASIEN_ID AND D.SHOW_ITEM='1')TRANS_CO, B.BPJS_NO, A.REKANAN_ID
                FROM SR01_KEU_EPISODE A, SR01_MED_RUANG_PRWT_TEMP C, SR01_GEN_PASIEN_MS B, SR01_MED_RUANG_MS D, SR01_GEN_UNIT_MS E, SR01_MED_DOKTER_MS F

                WHERE
                A.EPISODE_ID = C.EPISODE_ID
                AND A.PASIEN_ID = B.PASIEN_ID
                AND C.RUANG_ID = D.RUANG_ID
                AND E.UNIT_ID = D.UNIT_ID
                AND A.DOKTER_ID = F.DOKTER_ID

               
            ) X 
             LEFT JOIN WEB_CO_DIAGNOSA_MS DM ON X.EPISODE_ID = DM.EPISODE_ID AND DM.SHOW_ITEM = '1'
             LEFT JOIN SR01_KEU_RIBPJS SR ON SR.EPISODE_ID = X.EPISODE_ID
             LEFT JOIN SR01_BPJS_CODING BC ON X.EPISODE_ID = BC.EPISODE_ID AND BC.AKTIF = '1'
             WHERE (X.INT_PASIEN_ID LIKE '%{$pencarian}%' OR UPPER(X.NAMAPASIEN) LIKE UPPER('%{$pencarian}%'))
             ORDER BY X.TGL_MASUK DESC
        ";
        return $this->db->query($query)->result();
    }
    public function getdiagnosa($episodeid, $pasienid)
    {
        $query = "
            SELECT
                E.PASIEN_ID,
                A.INT_PASIEN_ID,
                A.NAMA NAMAPASIEN,
                B.ICD10, 
                B.DIAGNOSA,
                B.ICD9,
                B.TINDAKAN,
                E.DOKTER_ID,
                E.POLI_ID,
                E.RUANGRWT_ID,
                B.TRANS_ID,
                 (
           SELECT JSON_ARRAYAGG(
                      JSON_OBJECT(
                          'kode' VALUE DT.KODE,
                          'kode_icd' VALUE DT.KODE_ICD,
                          'diagnosa' VALUE DT.DIAGNOSA,
                          'type' VALUE 'old',
                          'trans_diag' VALUE DT.TRANS_DIAG
                          RETURNING CLOB
                      )
                      ORDER BY DT.CREATED_DATE ASC
                      RETURNING CLOB
                  )
           FROM WEB_CO_DIAG_DT DT
           WHERE DT.EPISODE_ID = E.EPISODE_ID
             AND DT.SHOW_ITEM = '1'
       ) AS LISTDIAG,

       (
           SELECT JSON_ARRAYAGG(
                      JSON_OBJECT(
                          'kode' VALUE DT.KODE,
                          'kode_icd' VALUE DT.KODE_ICD,
                          'tindakan' VALUE DT.TINDAKAN,
                          'type' VALUE 'old',
                          'trans_tin' VALUE DT.TRANS_TIN
                          RETURNING CLOB
                      )
                      ORDER BY DT.CREATED_DATE ASC
                      RETURNING CLOB
                  )
           FROM WEB_CO_TINDAK_DT DT
           WHERE DT.EPISODE_ID = E.EPISODE_ID
             AND DT.SHOW_ITEM = '1'
       ) AS LISTTINDAK,
                CASE WHEN C.KODE IS NOT NULL THEN
                    C.KODE
                    ELSE D.KODE_ICD
                END KODEICD,
                CASE WHEN C2.KODE IS NOT NULL THEN
                    C2.KODE
                    ELSE D.KODE_ICD
                END KODEICD9,
            S.CATATAN,
            S.ICD10_UTAMA,
            S.ICD10_SEKUNDER,
            S.ICD9_UTAMA,
            S.ICD9_TINDAKAN,
            S1.DESCRIPTION ICD10NM,
            S2.DESCRIPTION ICD9NM,
            CVR.SEP_NOMOR,
            CVR.NOKARTU
            FROM SR01_KEU_EPISODE E
            LEFT JOIN SR01_GEN_PASIEN_MS A ON A.PASIEN_ID = E.PASIEN_ID
            LEFT JOIN WEB_CO_DIAGNOSA_MS B ON E.EPISODE_ID = B.EPISODE_ID AND B.SHOW_ITEM = '1'
            LEFT JOIN SR01_MED_ICD_IDRG C ON B.ICD10 = C.KODE
            LEFT JOIN SR01_MED_ICD_IDRG C2 ON B.ICD9 = C2.KODE
            LEFT JOIN WEB_CO_MS_ICD10 D ON B.ICD10 = D.KODE
            LEFT JOIN WEB_CO_MS_ICD9 T ON B.ICD9 = T.KODE
            LEFT JOIN SR01_BPJS_CODING S ON S.EPISODE_ID = E.EPISODE_ID AND S.AKTIF = '1'
            LEFT JOIN SR01_MED_ICD_IDRG S1 ON S.ICD10_UTAMA = S1.KODE
            LEFT JOIN SR01_MED_ICD_IDRG S2 ON S.ICD9_UTAMA = S2.KODE
            LEFT JOIN SR01_KEU_BPJS_CVR CVR ON CVR.EPISODE_ID = E.EPISODE_ID AND CVR.AKTIF = '1'
            WHERE E.PASIEN_ID = '{$pasienid}' AND E.EPISODE_ID = '{$episodeid}'
        ";
        return $this->db->query($query)->row();
    }
    public function geticd10($search)
    {
        $query = "
            SELECT *
            FROM SR01_MED_ICD_IDRG A
            WHERE SYSTEM = 'ICD_10_2010_IM' AND A.AKTIF = '1' AND A.VALIDCODE = '1'
            AND (UPPER(A.KODE_ICD) LIKE UPPER('%{$search}%') OR UPPER(A.DESCRIPTION) LIKE UPPER('%{$search}%'))
        ";
        return $this->db->query($query)->result();
    }
    public function geticd9($search)
    {
        $query = "
            SELECT *
            FROM SR01_MED_ICD_IDRG A
            WHERE SYSTEM = 'ICD_9CM_2010_IM' AND A.AKTIF = '1' AND A.VALIDCODE = '1'
            AND (UPPER(A.KODE_ICD) LIKE UPPER('%{$search}%') OR UPPER(A.DESCRIPTION) LIKE UPPER('%{$search}%'))
        ";
        return $this->db->query($query)->result();
    }
    public function updatediagms($kodeicd10, $diagnosa,  $kodeicd9, $tindakan, $episodeid, $transco)
    {
        $sql = "
            UPDATE WEB_CO_DIAGNOSA_MS
            SET ICD10 = ?,
                DIAGNOSA = ?,
                ICD9 = ?,
                TINDAKAN = ?
            WHERE EPISODE_ID = ?
            AND TRANS_CO = ?
        ";

        return $this->db->query($sql, [
            $kodeicd10,
            $diagnosa,
            $kodeicd9,
            $tindakan,
            $episodeid,
            $transco
        ]);
    }
    public function hapusdiagdt($transdiag)
    {
        $query = "
            UPDATE WEB_CO_DIAG_DT
                SET SHOW_ITEM = '0'
            WHERE TRANS_DIAG = '{$transdiag}'
        ";
        return $this->db->query($query);
    }
    public function hapustindakdt($episodeid)
    {
        $query = "
            UPDATE WEB_CO_TINDAK_DT
                SET SHOW_ITEM = '0'
            WHERE EPISODE_ID = '{$episodeid}'
        ";
        return $this->db->query($query);
    }
    public function counttransdiag($episodeid)
    {
        $query = "
            SELECT EPISODE_ID FROM WEB_CO_DIAG_DT WHERE EPISODE_ID = '{$episodeid}'
        ";
        return $this->db->query($query)->num_rows();
    }
    public function counttranstin($episodeid)
    {
        $query = "
            SELECT EPISODE_ID FROM WEB_CO_TINDAK_DT WHERE EPISODE_ID = '{$episodeid}'
        ";
        return $this->db->query($query)->num_rows();
    }
    public function insertdiagdt($datainsert)
    {
        return $this->db->insert('WEB_CO_DIAG_DT', $datainsert);
    }
    public function inserttindakdt($datainsert)
    {
        return $this->db->insert('WEB_CO_TINDAK_DT', $datainsert);
    }
    public function getcodingid()
    {
        $query = "
            SELECT 
                TO_CHAR(SYSDATE,'YYYYMMDD') ||
                LPAD(
                    NVL(MAX(TO_NUMBER(SUBSTR(CODING_ID,9,7))),0) + 1,
                    7,
                    '0'
                ) AS kode
            FROM SR01_BPJS_CODING
            WHERE CODING_ID LIKE TO_CHAR(SYSDATE,'YYYYMMDD') || '%'
        ";
        return $this->db->query($query)->row();
    }
    public function insertbpjscoding($data)
    {
        return $this->db->insert('SR01_BPJS_CODING', $data);
    }
    public function hapusbpjscoding($episodeid)
    {
        $query = "
            UPDATE SR01_BPJS_CODING
                SET AKTIF = '0'
            WHERE EPISODE_ID = '{$episodeid}'
        ";
        return $this->db->query($query);
    }
}
