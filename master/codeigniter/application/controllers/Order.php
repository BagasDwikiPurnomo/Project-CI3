<?php
class order extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('order_model');
    }

    public function index() {
        $data['order'] = $this->order_model->get_order();
        $this->load->view('order_view', $data);
    }

    public function create() {
        // Proses pembuatan pengguna baru
        $data = array(
            'name' => 'John Doe',
            'email' => 'johndoe@example.com'
        );
        $this->order_model->create_order($data);
    }

    public function update($order_id) {
        // Proses pembaruan data pengguna berdasarkan ID
        $this->load->model('order_model');
        $data = array(
            'order_date' => $this->input->post('order_date'),
            'id_user' => $this->input->post('id_user'),
            'id_menu' => $this->input->post('id_menu'),
            'status_payment' => $this->input->post('status_payment')
        );
        $this->order_model->update_order($order_id, $data);
        // Kirim notifikasi real-time ke Pusher ketika pengguna diperbarui
        $this->trigger_pusher_notification('Order dengan ID ' . $order_id . ' telah diperbarui.');
    
        redirect(base_url('order'));
    }

    public function edit($order_id) {
        // Retrieve the user's information based on the provided ID
        $data['order'] = $this->order_model->get_order_by_id($order_id);
        $data['order_id'] = $order_id; // Pass the user_id to the view
    
        if ($data['order']) {
            // Load the edit user view with the user's data
            $this->load->view('edit_order', $data);
        } else {
            echo "order not found"; // You may want to handle this case more gracefully
        }
    }
    
    public function delete($id_order) {
        $this->order_model->delete($id_order);
       // Kirim notifikasi real-time ke Pusher ketika pengguna dihapus
       $this->trigger_pusher_notification('Order dengan ID ' . $id_order . ' telah dihapus.');
        
       redirect(base_url('order'));
    }

    public function create_order(){
        if($this->input->post()){
            $data = array(
                'order_date' => $this->input->post('order_date'),
                'id_user' => $this->input->post('id_user'),
                'id_menu' => $this->input->post('id_menu'),
                'status_payment' => $this->input->post('status_payment')
            );
            
            $order_id = $this->order_model->create_order($data);
            if ($order_id) {
                // Kirim notifikasi real-time ke Pusher ketika pengguna dibuat
                $this->trigger_pusher_notification('Order berhasil dibuat dengan ID: ' . $order_id);
            } else {
                $this->trigger_pusher_notification('Gagal membuat order.');
            }
        } 
        $data['order'] = $this->order_model->get_order(); // Corrected the variable name
        $this->load->view('order_view', $data);
        
        redirect(base_url('order'));
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
