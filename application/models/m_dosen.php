<?php
class M_dosen extends CI_Model {
    public function tampil_data() {
       return $this->db->get('tb_dosen');
    }

    public function input_data($data, $table) {
        $this->db->insert($table, $data);
    }

    public function hapus_data($where, $table) {
        $this->db->where($where);
        $this->db->delete($table);
    }
   
    public function edit_data($edit, $table) {
        return $this->db->get_where($table, $edit);
    }

    public function update_data($where, $data, $table) {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function detail_data($id = NULL) {
        return $this->db->get_where('tb_dosen', array('id' => $id))->row();
    }

    public function get_keyword($keyword) {
        $this->db->select('*');
        $this->db->from('tb_dosen');
        $this->db->like('nama', $keyword);
        $this->db->or_like('nip' , $keyword);
        $this->db->or_like('tgl_lahir' , $keyword);
        $this->db->or_like('alamat' , $keyword);
        $this->db->or_like('email' , $keyword);
        return $this->db->get()->result();
    }
}