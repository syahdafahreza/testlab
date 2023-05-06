<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
  public function deleteRole($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('user_role');
  }
  public function deleteUser($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('user');
  }
}
