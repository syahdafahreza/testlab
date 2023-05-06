<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{

  public function __construct() //method untuk menerapkan seluruh fungsi didalamnya ke dalam seluruh method di controller
  {
    parent::__construct(); // syarat method
    is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['events'] = $this->db->get('listevent')->result_array();

    $this->load->view('admin/event', $data);

    // $this->load->view('templates/header', $data);
    // $this->load->view('templates/sidebar', $data);
    // $this->load->view('templates/topbar', $data);
    // $this->load->view('admin/index', $data);
    // $this->load->view('templates/footer');
  }

  public function role()
  {
    $data['title'] = 'Role';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //query get table user_role = mengambil semua data dari user_role dan mengirimkannya ke variable role
    $data['role'] = $this->db->get('user_role')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/role', $data);
    $this->load->view('templates/footer');
  }

  public function roleAccess($role_id)
  {
    $data['title'] = 'Role Access';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //query get table user_role = mengambil satu baris data user_role berserta id nya dari user_role dan mengirimkannya ke variable role
    $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

    //query get table user_menu = mengambil semua data user_menu dan mengirimkannya ke variable menu
    $this->db->where('id !=', 1); // semua data diambil kecuali data dengan id 1
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/role-access', $data);
    $this->load->view('templates/footer');
  }

  public function changeAccess()
  {
    $menu_id = $this->input->post('menuId');
    $role_id = $this->input->post('roleId');

    $data = [
      'role_id' => $role_id,
      'menu_id' => $menu_id
    ];

    $result = $this->db->get_where('user_access_menu', $data);
    if ($result->num_rows() < 1) {
      $this->db->insert('user_access_menu', $data);
    } else {
      $this->db->delete('user_access_menu', $data);
    }

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access changed</div>');
  }

  public function addRole()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //validation
    $this->form_validation->set_rules('role', 'Role', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/role', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'role' => $this->input->post('role')
      ];
      $this->db->insert('user_role', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New role added</div>');
      redirect('admin/role');
    }
  }

  public function deleteRole($id)
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->model('Admin_model', 'admin');
    $this->admin->deleteRole($id);

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role has been delete</div>');
    redirect('admin/role');
  }


  public function kelolaUser()
  {
    $data['title'] = 'Kelola User';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['kelolaUser'] = $this->db->get_where('user', ['role_id' => 1])->result_array();
    $this->load->view('admin/setUser', $data);

    // $this->load->view('templates/header', $data);
    // $this->load->view('templates/sidebar', $data);
    // $this->load->view('templates/topbar', $data);
    // $this->load->view('admin/kelola-user', $data);
    // $this->load->view('templates/footer');
  }
  public function change_status_user($id, $is_active)
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    if ($this->db->get_where('user', ['id' => $id, 'is_active' => $is_active = 1])->row_array()) {
      $this->db->where('id', $id);
      $this->db->update('user', ['is_active' => 0]);
    } else if ($this->db->get_where('user', ['id' => $id, 'is_active' => $is_active = 0])->row_array()) {
      $this->db->where('id', $id);
      $this->db->update('user', ['is_active' => 1]);
    }

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status user berhasil diubah</div>');
    redirect('admin/kelolaUser');
  }


  public function tambah_user()
  {
    $data['title'] = 'Tambah Data User';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //validation
    $this->form_validation->set_rules("name", "Name", "required|trim");
    $this->form_validation->set_rules("email", "Email", "required|valid_email|trim|is_unique[user.email]", [
      'is_unique' => 'This email has already registered'
    ]);
    $this->form_validation->set_rules("new_pasword1", "Password", "required|trim|min_length[3]|matches[new_pasword2]", [
      'matches' => 'Password dont match!',
      'min_length' => 'Password too short!'
    ]);
    $this->form_validation->set_rules("new_pasword2", "Password", "required|trim|min_length[3]|matches[new_pasword1]");
    if ($this->form_validation->run() == false) {
      // $this->load->view('templates/header', $data);
      // $this->load->view('templates/sidebar', $data);
      // $this->load->view('templates/topbar', $data);
      // $this->load->view('admin/tambah-user', $data);
      // $this->load->view('templates/footer');
      $this->load->view('admin/addUser', $data);
    } else {
      $email = $this->input->post('email', true);
      $data = [
        'name' => htmlspecialchars($this->input->post('name', true)),
        'email' => htmlspecialchars($email),
        'image' => 'default.jpg',
        'password' => password_hash($this->input->post('new_pasword1'), PASSWORD_DEFAULT),
        'role_id' => 1,
        'is_active' => 1,
        'date_created' => time()
      ];
      $this->db->insert('user', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created.</div>');
      redirect('admin/kelolaUser');
    }
  }
  public function delete_user($id)
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->model('Admin_model', 'admin');
    $this->admin->deleteUser($id);

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data user berhasil dihapus</div>');
    redirect('admin/kelolaUser');
  }

  public function addEvent()
  {
    $data['title'] = 'Dashboard';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['events'] = $this->db->get('listevent')->result_array();

    $this->form_validation->set_rules("name", "Name", "required");
    $this->form_validation->set_rules("tanggal", "Tanggal", "required");
    $this->form_validation->set_rules("jum_peserta", "Jumlah Peserta", "required");
    $this->form_validation->set_rules("harga", "Harga", "required");


    if ($this->form_validation->run() == false) {
      $this->load->view('admin/addEvent', $data);
    } else {
      $data = [
        'name' => htmlspecialchars($this->input->post('name', true)),
        'tgl' => $this->input->post('tanggal', true),
        'jum_peserta' => $this->input->post('jum_peserta', true),
        'harga' => $this->input->post('harga', true)

      ];
      $this->db->insert('listevent', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Event has been created.</div>');
      redirect('admin');
    }
  }

  public function delete_events($id)
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->db->where('id', $id);
    $this->db->delete('listevent');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data event berhasil dihapus</div>');
    redirect('admin');
  }

  public function participant($id)
  {
    $data['id_event'] = $id;


    $data['title'] = 'Participant';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['participant'] = $this->db->get_where('participant', ['id_events' => $id])->result_array();

    $this->form_validation->set_rules("name", "Name", "required");
    $this->form_validation->set_rules("contact", "Kontak", "required");
    $this->form_validation->set_rules("keterangan", "Keterangan", "required");


    if ($this->form_validation->run() == false) {
      $this->load->view('admin/participant', $data);
    } else {
      $id_event = $this->input->post('id_event', true);
      $data = [
        'name' => htmlspecialchars($this->input->post('name', true)),
        'contact' => $this->input->post('contact', true),
        'keterangan' => $this->input->post('keterangan', true),
        'id_events' => $this->input->post('id_event', true)

      ];
      $this->db->insert('participant', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Participant added.</div>');
      redirect('admin/participant/' . $id_event);
    }
  }
  public function delete_participant($id)
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->db->where('id', $id);
    $this->db->delete('participant');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Participant berhasil dihapus</div>');
    redirect('admin');
  }

  public function viewEvent($id)
  {
    $data['title'] = 'View Event';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['events'] = $this->db->get_where('listevent',['id'=>$id])->row_array();
    // $data['participant'] = $this->db->get('participant')->result_array();

    // $data['participant']=$this->db->get_where('participant',['id'=>$id])->result_array();
    // var_dump($data['participant']);
    $query = " SELECT * FROM participant where id_events=$id";
    $data['participant']=$this->db->query($query)->result_array();
    // $res = $this->db->query($query)->result_array();
    $data['jp']=$this->db->query($query)->num_rows();

    // // echo $res['dbget'];

    // var_dump($data['jp']);
    // die();

    $this->load->view('admin/viewEvent', $data);

    


  }

}
