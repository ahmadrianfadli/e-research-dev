<?php
    class Modellogin extends CI_Model{

        function checkuserlogin($username, $password){
            $query =
                    "
                        SELECT A.USER_ID, A.NAMA
                        FROM SR01_GEN_USER_DATA A
                        WHERE A.LOKASI_ID='001'
                        AND   A.AKTIF='1'
                        AND   A.JENIS_USER IN ('JLEV1','JLEV6','JLEV7','JLEV11','JLEV14','JLEV16')
                        AND   UPPER(A.PASSWORD)=UPPER('".$password."')
                        AND   UPPER(A.USER_ID)=UPPER('".$username."') OR 'SIRS01_'||UPPER(A.USER_ID)=UPPER('".$username."')
                    ";

            $recordset = $this->db->query($query);
            return $recordset;
        }

        function datasession($username,$password){
            $query =
                    "
                        SELECT 'SIRS01_'||UPPER(A.USER_ID) USER_ID, USER_ID USERIDLOGIN, NIK, UPPER(NAMA) NAMA, JENIS_USER, A.AKSES_APLIKASI
                        FROM SR01_GEN_USER_DATA A
                        WHERE A.LOKASI_ID='001'
                        AND   A.AKTIF='1'
                        AND   A.NIK IS NOT NULL
                        AND   A.JENIS_USER IN ('JLEV1','JLEV6','JLEV7','JLEV11','JLEV14','JLEV16')
                        AND   UPPER(A.PASSWORD)=UPPER('".$password."')
                        AND   UPPER(A.USER_ID)=UPPER('".$username."') OR 'SIRS01_'||UPPER(A.USER_ID)=UPPER('".$username."')
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->row();
            return $recordset;
        }
        
    }
