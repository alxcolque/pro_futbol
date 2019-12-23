<?php
class UserModel extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_user($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('usuarios');
            return $query->result_array();
        }

        $query = $this->db->get_where('usuarios', array('user_id' => $id));
        return $query->row_array();
    }

    public function get_user_login($email, $password)
    {
        $query = $this->db->get_where('usuarios', array('email' => $email, 'clave' => md5($password)));
        //return $query->num_rows();
        return $query->row_array();
    }

    public function set_user($id = 0)
    {
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'apellido' => $this->input->post('apellido'),
            'email' => $this->input->post('email'),
            'clave' => $this->input->post('clave')
        );

        if ($id == 0) {
            return $this->db->insert('usuarios', $data);
        } else {
            $this->db->where('user_id', $id);
            return $this->db->update('usuarios', $data);
        }
    }

    public function delete_user($id)
    {
        $this->db->where('user_id', $id);
        return $this->db->delete('usuarios');
    }

}
