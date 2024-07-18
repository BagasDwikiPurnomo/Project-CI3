<?php
class Auth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
    }
                                                                                                                                                                                                                                                                                                            

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->User_model->get_user_by_username($username, $password); // Fix: 'User_model' instead of 'user_model'

        if ($user) {
            echo "Berhasil login!";
            $user_data = array(
                'user_id' => $user->id, // Fix: Use => instead of =>
                'user_username' => $user->username,
            );
            $this->session->set_userdata($user_data);

            redirect('User');
        } else {
            echo "Gagal login";
            $this->session->set_flashdata('error', 'Invalid username or password');
            redirect('user'); // Fix: Add a semicolon at the end
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
?>
