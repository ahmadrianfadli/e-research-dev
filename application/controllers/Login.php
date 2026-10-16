<?php
class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Modellogin', 'md');
    }

    public function index()
    {
        $data['title'] = 'E-RESEARCH';
        $this->load->view('login', $data);
    }

    public function loginsystem()
    {
        $username             = $this->input->post("username");
        $password             = $this->input->post("password");
        $resultcheckuserlogin = $this->md->checkuserlogin($username, $password);

        if (!empty($resultcheckuserlogin)) {
            $datasession = $this->md->datasession($username, $password);
            if ($datasession) {
                $newdata = array(
                    'userid'         => $datasession->USER_ID,
                    'useridlogin'    => $datasession->USERIDLOGIN,
                    'nik'            => $datasession->NIK,
                    'nama'           => $datasession->NAMA,
                    'jenisuser'      => $datasession->JENIS_USER,
                    'loggedIn'       => true,
                    'timeout'        => false,
                    'aksesaplikasi'  => $datasession->AKSES_APLIKASI
                );

                $this->session->set_userdata($newdata);

                $data['responCode'] = '00';
                $data['responDesc'] = "Username dan Password Valid";
                $data['url'] = base_url() . "index.php/dashboard";
            } else {
                $data['responCode'] = '01';
                $data['responDesc'] = "Username dan atau Password Anda Salah Silakan Masukan Kembali";
            }
        } else {
            $data['responCode'] = '01';
            $data['responDesc'] = "Username dan atau Password Anda Salah Silakan Masukan Kembali";
        }

        echo json_encode($data);
    }

    public function logoutsystem()
    {
        $this->session->unset_userdata(
            $_SESSION['userid'],
            $_SESSION['useridlogin'],
            $_SESSION['nik'],
            $_SESSION['nama'],
            $_SESSION['jenisuser'],
            $_SESSION['loggedIn'],
            $_SESSION['timeout']
        );

        $this->session->sess_destroy();
        $login = base_url() . 'index.php/login';
        redirect($login);
    }
}
