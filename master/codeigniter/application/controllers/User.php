<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<?php
class User extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index() {
        $data['users'] = $this->User_model->get_users();
        $this->load->view('user_view', $data);
        // $this->load->view('login'); 
    }

    
    public function view_user(){
        $data['users'] = $this->User_model->get_users();
        $this->load->view('user_view',$data);
    }
    
    public function trigger_event() {
        require __DIR__ . '\vendor\autoload.php';

        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            '16b3ce37a71813c0e1e8',
            '533121e56f38321fc86e',
            '1697472',
            $options
        );

        $data['message'] = 'hello world';
        $pusher->trigger('my-channel', 'my-event', $data);
    }


    
    public function edit($id) {
        // Retrieve the user's information based on the provided ID
        $data['user'] = $this->User_model->get_user_by_id($id);
        $data['user_id'] = $id; // Pass the user_id to the view
    
        if ($data['user']) {
            // Load the edit user view with the user's data
            $this->load->view('edit_user', $data);
        } else {
            echo "User not found"; // You may want to handle this case more gracefully
        }
    }
    
    public function update($id) {
        $this->load->model('User_model');
        $data = array(
            'name' => $this->input->post('name'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level')
        );
        $this->User_model->update_user($id, $data);
    
        // Kirim notifikasi real-time ke Pusher ketika pengguna diperbarui
        $this->trigger_pusher_notification('Pengguna dengan ID ' . $id . ' telah diperbarui.');
    
        redirect(base_url('../'));
    }
    
    public function delete($id) {
        // Proses penghapusan pengguna berdasarkan ID
        $this->User_model->delete_user($id);
    
        // Kirim notifikasi real-time ke Pusher ketika pengguna dihapus
        $this->trigger_pusher_notification('Pengguna dengan ID ' . $id . ' telah dihapus.');
        
        redirect(base_url('../'));
    }
    

    public function create_user() {
        if ($this->input->post()) {
            $data = array(
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'level' => $this->input->post('level')
            );
            $user_id = $this->User_model->create_user($data);
    
            if ($user_id) {
                // Kirim notifikasi real-time ke Pusher ketika pengguna dibuat
                $this->trigger_pusher_notification('User berhasil dibuat dengan ID: ' . $user_id);
                echo '<script>
                    Swal.fire("Sukses!", "User berhasil dibuat dengan ID: ' . $user_id . '", "success");
                </script>';
            } else {
                $this->trigger_pusher_notification('Gagal membuat user.');
                echo '<script>
                    Swal.fire("Gagal!", "Gagal membuat user.", "error");
                </script>';
            }
        }
    
        $data['users'] = $this->User_model->get_users();
        $this->load->view('user_view', $data);
        redirect(base_url('../'));
    }
    
    
    private function trigger_pusher_notification($message) {
        // Inisialisasi Pusher
        require_once __DIR__ . '\vendor\autoload.php';
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            '16b3ce37a71813c0e1e8',
            '533121e56f38321fc86e',
            '1697472',
            $options
        );
    
        // Kirim notifikasi real-time ke saluran 'my-channel' dengan event 'my-event'
        $data = ['Hello World!' => $message];
        $pusher->trigger('my-channel', 'my-event', $data);
    }

    
    
}

?>
</body>