<?php
    class Modelparsiallab extends CI_Model{

        function datatransaksi(){
            $query =
                    "  
                        SELECT Y.*,
                                ( SELECT STATUS   FROM SAMPEL_PDF_LOG WHERE LOKASI_ID='001' AND SAMPEL_ID=Y.SAMPELIDLAB )STATUSPDFLAB,
                                ( SELECT FILENAME FROM SAMPEL_PDF_LOG WHERE LOKASI_ID='001' AND SAMPEL_ID=Y.SAMPELIDLAB )FILENAMELAB,
                                ( SELECT DIR_FILE FROM SAMPEL_PDF_LOG WHERE LOKASI_ID='001' AND SAMPEL_ID=Y.SAMPELIDLAB )DIRFILELAB
                                
                        FROM(
                            SELECT X.*,
                                    ( SELECT INT_PASIEN_ID                      FROM SR01_GEN_PASIEN_MS WHERE LOKASI_ID='001' AND PASIEN_ID=X.PASIEN_ID )MRPAS,
                                    ( SELECT NAMA                               FROM SR01_GEN_PASIEN_MS WHERE LOKASI_ID='001' AND PASIEN_ID=X.PASIEN_ID )NAMAPASIEN,
                                    ( SELECT NO_IDENTITAS                       FROM SR01_GEN_PASIEN_MS WHERE LOKASI_ID='001' AND PASIEN_ID=X.PASIEN_ID )NOKTP,
                                    ( SELECT DECODE(SEX_ID,'L','MALE','FEMALE') FROM SR01_GEN_PASIEN_MS WHERE LOKASI_ID='001' AND PASIEN_ID=X.PASIEN_ID )SEXID,
                                    ( SELECT TO_CHAR(TGL_LAHIR,'DD.MM.YYYY')    FROM SR01_GEN_PASIEN_MS WHERE LOKASI_ID='001' AND PASIEN_ID=X.PASIEN_ID )TGLLAHIR,
                                    
                                    ( SELECT TRANS_ID  FROM SR01_WORKLIST_LAB WHERE LOKASI_ID='001' AND AKTIF='1' AND PASIEN_ID=X.PASIEN_ID AND EPISODE_ID=X.EPISODE_ID )TRANSIDLAB,
                                    ( SELECT TRANS_CO  FROM SR01_WORKLIST_LAB WHERE LOKASI_ID='001' AND AKTIF='1' AND PASIEN_ID=X.PASIEN_ID AND EPISODE_ID=X.EPISODE_ID )TRANSCOLAB,
                                    ( SELECT STATUS    FROM SR01_WORKLIST_LAB WHERE LOKASI_ID='001' AND AKTIF='1' AND PASIEN_ID=X.PASIEN_ID AND EPISODE_ID=X.EPISODE_ID )STATUSLAB,
                                    ( SELECT SAMPEL_ID FROM SR01_WORKLIST_LAB WHERE LOKASI_ID='001' AND AKTIF='1' AND PASIEN_ID=X.PASIEN_ID AND EPISODE_ID=X.EPISODE_ID )SAMPELIDLAB
                                    
                            FROM(
                                SELECT A.EPISODE_ID, PASIEN_ID, TO_CHAR(CREATED_DATE,'DD.MM.YYYY HH24:MI:SS')TANGGALTRANSAKSI
                                FROM SR01_KEU_EPISODE A
                                WHERE A.LOKASI_ID='001'
                                AND   A.AKTIF='1'
                                AND   A.REKANAN_ID='RSUD0000000002'
                                AND   A.EPISODE_ID IN ( SELECT EPISODE_ID FROM SR01_WORKLIST_LAB WHERE LOKASI_ID='001' AND AKTIF='1' AND PASIEN_ID=A.PASIEN_ID AND EPISODE_ID=A.EPISODE_ID )
                            )X
                            ORDER BY TO_DATE(TANGGALTRANSAKSI,'DD.MM.YYYY HH24:MI:SS') DESC, NAMAPASIEN ASC
                        )Y
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
            
        }

        
    }
?>