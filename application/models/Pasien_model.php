<?php
class Pasien_model extends CI_Model
{
    public function login_check()
    {
        $data = [
            "username" => $this->input->post('username',true),
            // "email" => $this->input->post('email',true),
            "password" => $this->input->post('password', true)
        ];
        $this->db->where('username', $data["username"]);
        // $this->db->where('email', $data["email"]);
        $this->db->where('password', $data["password"]);
        $que = $this->db->get("pasien");
        return $que->num_rows();
    }

    public function read($username, $password){
        $query = $this->db->query("SELECT * FROM pasien WHERE username = '$username' AND password='$password'");
        if ($query->num_rows() != 0){
            return $query->row();
        }else{
            return array();
        }
    }

    public function tambahPasien(){
        $data = [
            "nama_pasien" => $this->input->post('nama_pasien', true),
            "birthday" => $this->input->post('tanggal_lahir', true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
            "email" => $this->input->post('email_pasien', true),
            "username" => $this->input->post('username_pasien', true),
            "password" => $this->input->post('password_pasien', true),
            "alamat" => $this->input->post('alamat_pasien', true),
            "no_telepon" => $this->input->post('notelepon_pasien', true)
        ];
        return $this->db->insert('pasien', $data);
    }

    public function cekEmail($email){
        $this->db->where('email', $email);
        return $this->db->get('pasien')->num_rows();
    }

    public function cekUsername($username){
        $this->db->where('username', $username);
        return $this->db->get('pasien')->num_rows();
    }

    public function GetAllPasien(){
        $data = $this->db->get('pasien');
        return $data->result_array();
    }

    public function GetPasienById($id_pasien){
        $que = $this->db->query("SELECT * FROM pasien WHERE id_pasien = $id_pasien");
        return $que->result_array();
    }

    public function jadwalPeriksa(){
        $data = [
            "id_pasien" => $this->input->post('nama',true),
            "id_dokter" => $this->input->post('dokter',true),
            "jadwal" => $this->input->post('tgl',true),
            "keluhan" => $this->input->post('keluhan_pasien',true)
        ];
        // $this->db->select("id_pasien, id_dokter, nama_pasien, nama_dokter");
        // $this->db->from('pasien');
        // $this->db->join('dokter');
        // $this->db->where('id_pasien',$id_pasien);
        // $this->db->where('')
        // $this->db->insert('periksa', $data);

        // $que = $this->db->query("INSERT INTO periksa (id_pasien, id_dokter, jadwal, keluhan) VALUES ('?, ?, ?, ?') WHERE pasien.id_pasien = dokter.id_dokter");
        // return $que->result_array();
    }

    public function ubahProfil($id)
    {
        $config['upload_path']          =  './assets/gambar/'; //isi dengan nama folder tempat menyimpan gambar
        $config['allowed_types']        =  'gif|jpg|png|jpeg'; //isi dengan format/tipe gambar yang diterima
        
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('foto'))
        {
            $data=[
                "nama_pasien" => $this->input->post('nama',true),
                "username" => $this->input->post('username', true),
                "email" => $this->input->post('email',true),
                "jenis_kelamin" => $this->input->post('jk', true),
                "birthday" => $this->input->post('birth', true),
                "no_telepon" => $this->input->post('notelpon', true),
                "alamat" => $this->input->post('alamat', true)
            ];
            $this->db->where('id_pasien',$id);
            $this->db->update('pasien',$data);
        }
        else
        {
            $data=[
                "nama_pasien" => $this->input->post('nama',true),
                "username" => $this->input->post('username', true),
                "email" => $this->input->post('email',true),
                "jenis_kelamin" => $this->input->post('jk', true),
                "birthday" => $this->input->post('birth', true),
                "no_telepon" => $this->input->post('notelpon', true),
                "foto" => $this->upload->data('file_name'),
                "alamat" => $this->input->post('alamat', true)
            ];
            $this->db->where('id_pasien',$id);
            $this->db->update('pasien',$data);
            if ($this->input->post('foto_lama')!="default.jpg") {
                unlink('assets/gambar/'.$this->input->post('foto_lama'));    
            }
        }
        redirect('pasien/profil');
    }
}
?>