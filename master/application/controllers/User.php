<?php
class User extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index() {
        $data['users'] = $this->User_model->get_users();
        $this->load->view('user_view', $data);
    }

    public function trigger_event() {
        require __DIR__ . '/vendor/autoload.php';

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
    public function create() {
        // Proses pembuatan pengguna baru
        $data = array(                           
            'name' => 'John Doe',
            'email' => 'johndoe@example.com'
        );
        $this->User_model->create_user($data);
    }

    public function update($id) {
        // Proses pembaruan data pengguna berdasarkan ID
        $data = array(
            'name' => 'Updated Name',
            'email' => 'updated@example.com'
        );
        $this->User_model->update_user($id, $data);
    }

    public function delete($id) {
        // Proses penghapusan pengguna berdasarkan ID
        $this->User_model->delete_user($id);
    }
}
?>
