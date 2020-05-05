<?php
class Pasien_model extends Core_Model{
    public function __construct(){
        parent::__construct();
        $this->table_name =  'pasien';
        $this->table_id = 'pasien_id';
    }

    // public function ubahProfil($id)
    // {
    //     $config['upload_path']          =  './assets/gambar/'; //isi dengan nama folder tempat menyimpan gambar
    //     $config['allowed_types']        =  'gif|jpg|png|jpeg'; //isi dengan format/tipe gambar yang diterima
        
    //     $this->load->library('upload', $config);
    //     if ( ! $this->upload->do_upload('foto'))
    //     {
    //         $data=[
    //             "nama_pasien" => $this->input->post('nama',true),
    //             "username" => $this->input->post('username', true),
    //             "email" => $this->input->post('email',true),
    //             "jenis_kelamin" => $this->input->post('jk', true),
    //             "birthday" => $this->input->post('birth', true),
    //             "no_telepon" => $this->input->post('notelpon', true),
    //             "alamat" => $this->input->post('alamat', true)
    //         ];
    //         $this->db->where('id_pasien',$id);
    //         $this->db->update('pasien',$data);
    //     }
    //     else
    //     {
    //         $data=[
    //             "nama_pasien" => $this->input->post('nama',true),
    //             "username" => $this->input->post('username', true),
    //             "email" => $this->input->post('email',true),
    //             "jenis_kelamin" => $this->input->post('jk', true),
    //             "birthday" => $this->input->post('birth', true),
    //             "no_telepon" => $this->input->post('notelpon', true),
    //             "foto" => $this->upload->data('file_name'),
    //             "alamat" => $this->input->post('alamat', true)
    //         ];
    //         $this->db->where('id_pasien',$id);
    //         $this->db->update('pasien',$data);
    //         if ($this->input->post('foto_lama')!="default.jpg") {
    //             unlink('assets/gambar/'.$this->input->post('foto_lama'));    
    //         }
    //     }
    //     redirect('pasien/profil');
    // }


    //For table
    public function get_list($limit, $start){
        $this->db->from('pasien', $limit, $start);
        $this->db->order_by("pasien_id", "asc");
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }
}
?>