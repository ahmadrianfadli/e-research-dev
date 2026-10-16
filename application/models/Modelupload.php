<?php
    class Modelupload extends CI_Model{

        function typedocument($parameter,$pasienid,$episodeid){
            $query =
                    "  
                        SELECT A.JNS_DOC, UPPER(KETERANGAN)KETERANGAN,
                                ( SELECT COUNT(NM_FILE) FROM SR01_DOCUMENT WHERE SHOW_ITEM='1' AND JNS_DOC=A.JNS_DOC AND PASIEN_ID='".$pasienid."' AND EPISODE_ID='".$episodeid."' )JMLUPLOAD
                        FROM SR01_MS_TYPE_DOCUMENT A
                        WHERE A.SHOW_ITEM='1'
                        AND   A.IS_TYPE<>'00'
                        AND   A.KETERANGAN IS NOT NULL
                        AND   UPPER(A.KETERANGAN) LIKE UPPER('%".$parameter."%')
                        ORDER BY KETERANGAN ASC
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
            
        }

        function viewfile($pasienid,$episodeid,$userid){
            $query =
                    "  
                    SELECT A.PASIEN_ID, EPISODE_ID, JNS_DOC, NM_FILE, 'dist/filescan/'||DIR_URL||'/'||NM_FILE URLSIMPAN, TO_CHAR(A.CREATED_DATE, 'DD.MM.YYYY HH24:MI:SS')TANGGAL, 
                        ( SELECT UPPER(KETERANGAN) FROM SR01_MS_TYPE_DOCUMENT WHERE SHOW_ITEM='1' AND JNS_DOC=A.JNS_DOC )NAMADOKUMEN,
                        CASE
                            WHEN A.CREATED_BY = '".$userid."' THEN
                            '1'
                            ELSE
                            '0'
                        END STATUS
                    FROM SR01_DOCUMENT A
                    WHERE A.SHOW_ITEM='1'
                    AND   A.PASIEN_ID='".$pasienid."'
                    AND   A.EPISODE_ID='".$episodeid."'
                    
                    ORDER BY A.CREATED_DATE DESC
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
            
        }

        function datapasien($parameter){
            $query =
                    "  
                        SELECT A.PASIEN_ID, EPISODE_ID, REKANAN_ID, POLI_ID, RUANGRWT_ID, DOKTER_ID, TO_CHAR(TGL_MASUK, 'DD.MM.YYYY HH24:MI:SS')TGLMASUK, TO_CHAR(TGL_KELUAR, 'DD.MM.YYYY HH24:MI:SS')TGLKELUAR, JENIS_EPISODE, STATUS_EPISODE,
                                DECODE(A.JENIS_EPISODE, 'O', 'Rawat Jalan', 'Rawat Inap' )JENISEPISODE,
                                ( SELECT INT_PASIEN_ID FROM SR01_GEN_PASIEN_MS WHERE LOKASI_ID='001' AND AKTIF='1' AND PASIEN_ID=A.PASIEN_ID )MRPAS,
                                SR01_GET_SUFFIX (A.PASIEN_ID)NAMAPASIEN,
                                ( SELECT NAMA FROM SR01_MED_DOKTER_MS WHERE LOKASI_ID='001' AND DOKTER_ID=A.DOKTER_ID )NAMADOKTER,
                                CASE
                                    WHEN A.JENIS_EPISODE = 'O' THEN
                                    ( SELECT KETERANGAN FROM SR01_MED_POLI_MS WHERE LOKASI_ID='001' AND AKTIF='1' AND POLI_ID=A.POLI_ID )
                                    ELSE
                                    A.RUANGRWT_ID
                                END ASALPASIEN,
                                'dist/filescan/'||SUBSTR(A.PASIEN_ID,1,2)||'/'||SUBSTR(A.PASIEN_ID,3,2)||'/'||SUBSTR(A.PASIEN_ID,5,2)||'/'||SUBSTR(A.PASIEN_ID,7,2)URLSIMPAN,
                                SUBSTR(A.PASIEN_ID,1,2)||'/'||SUBSTR(A.PASIEN_ID,3,2)||'/'||SUBSTR(A.PASIEN_ID,5,2)||'/'||SUBSTR(A.PASIEN_ID,7,2)DIRURL,
                                SUBSTR(A.PASIEN_ID,1,2)||'\'||SUBSTR(A.PASIEN_ID,3,2)||'\'||SUBSTR(A.PASIEN_ID,5,2)||'\'||SUBSTR(A.PASIEN_ID,7,2)DIRFILE
                                
                        FROM SR01_KEU_EPISODE A
                        WHERE A.LOKASI_ID='001'
                        AND   A.AKTIF='1'
                        AND   A.STATUS_EPISODE<>'99'
                        AND   A.EPISODE_ID NOT LIKE 'A%'
                        AND   A.EPISODE_ID NOT LIKE 'M%'
                        AND   A.PASIEN_ID = ( SELECT PASIEN_ID FROM SR01_GEN_PASIEN_MS WHERE LOKASI_ID='001' AND AKTIF='1' AND INT_PASIEN_ID='".$parameter."' OR NO_IDENTITAS='".$parameter."' OR BPJS_NO='".$parameter."' )
                        AND TRUNC(A.TGL_MASUK) <= TRUNC(SYSDATE)
                        ORDER BY MRPAS ASC, A.TGL_MASUK DESC
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
            
        }

        function simpandata($pasienid,$jnsdoc,$dirfile,$namafile,$episodeid,$tanggal,$dirurl,$jenisepisode,$createdby){
            $query = "
                        INSERT INTO SR01_DOCUMENT
                            (PASIEN_ID, JNS_DOC, DIR_FILE, NM_FILE, EPISODE_ID, TANGGAL, DIR_URL, JENIS_EPISODE, PINDAH, CREATED_BY)
                        VALUES
                            ( '$pasienid','$jnsdoc','$dirfile','$namafile','$episodeid',TO_DATE('$tanggal', 'DD.MM.YYYY'),'$dirurl','$jenisepisode','Y','$createdby')
                    ";

            $result = $this->db->query($query);
            return $result;
        }

        function hapusdok($pasienid, $episodeid, $namefile, $data){           
            $sql =   $this->db->update("SR01_DOCUMENT",$data,array("PASIEN_ID"=>$pasienid, "EPISODE_ID"=>$episodeid, "NM_FILE"=>$namefile,  "SHOW_ITEM"=>"1"));
            return $sql;
        }

    }
?>