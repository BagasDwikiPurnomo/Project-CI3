<?php
class Menu extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Menus_model'); // Corrected the model name to 'Menus_model'
    }

    public function index() {
        $data['menus'] = $this->Menus_model->get_menus(); // Corrected the model name
        $this->load->view('menus_view', $data);
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
    public function create() {
        // Proses pembuatan menu baru
        $data = array(
            'name' => 'John Doe',
            'type' => 'Example Type', // Add a type for the menu
            'price' => 10.99 // Add a price for the menu
        );
        $this->Menus_model->create_menus($data);
    }
    public function edit($menus_id) {
        // Mendefinisikan $menus_id
        $data['menus_id'] = $menus_id;
        
        // Retrieve the menu's information based on the provided ID
        $data['menus'] = $this->Menus_model->get_menu_by_id($menus_id);
        
        if ($data['menus']) {
            // Load the edit menu view with the menu's data
            $this->load->view('edit_menus', $data);
        } else {
            echo "Menu not found"; // Anda mungkin ingin menangani kasus ini dengan lebih baik
        }
    }

    
    public function update($menus_id) {
        // Proses pembaruan data menu berdasarkan ID
        $data = array(
            'menu_name' => $this->input->post('menu_name'),
            'type' => $this->input->post('type'),
            'price' => $this->input->post('price'),
        );
        $this->Menus_model->update_menus($menus_id, $data);
        
        // Kirim notifikasi real-time ke Pusher ketika pengguna diperbarui
        $this->trigger_pusher_notification('Menu dengan ID ' . $menus_id . ' telah diperbarui.');
    
        redirect(base_url('menu'));
    }

    public function delete($menus_id) {
        // Proses penghapusan menu berdasarkan ID
        $this->Menus_model->delete_menus($menus_id);
        // Kirim notifikasi real-time ke Pusher ketika pengguna dihapus
        $this->trigger_pusher_notification('Menu dengan ID ' . $menus_id . ' telah dihapus.');
        
        redirect(base_url('menu'));
    }

    public function create_menus(){
        if($this->input->post()){
            $data = array(
                'menu_name' => $this->input->post('menu_name'),
                'type' => $this->input->post('type'), // Change 'menusname' to 'type'
                'price' => $this->input->post('price')
            );
            $menus_id = $this->Menus_model->create_menus($data);
            if ($menus_id) {
              // Kirim notifikasi real-time ke Pusher ketika pengguna dibuat
              $this->trigger_pusher_notification('Menu berhasil dibuat dengan ID: ' . $menus_id);
              echo '<script>
                  Swal.fire("Sukses!", "Menu berhasil dibuat dengan ID: ' . $menus_id . '", "success");
              </script>';
          } else {
              $this->trigger_pusher_notification('Gagal membuat Menu.');
              echo '<script>
                  Swal.fire("Gagal!", "Gagal membuat menu.", "error");
              </script>';
          }
        }
        $data['menus'] = $this->Menus_model->get_menus(); // Corrected the variable name
        $this->load->view('menus_view', $data);

           
        redirect(base_url('menu'));
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
