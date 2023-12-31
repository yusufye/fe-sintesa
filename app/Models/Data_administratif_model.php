<?php
namespace App\Models;
use CodeIgniter\Model;

class Data_administratif_model extends Model {
    public function get_administratif_data_biodata_narasumber($param,$type='count')
    {
        if ($param=='biodata_narasumber') {
            if ($type=='count' && $type=='summary') {   
                $db=$this->db->table('pegawai')->select('nama,
                jabatan,
                instansi,
                gambar,
                tgl_update,
                pegawai_id');
            }elseif ($type=='detail') {
                return array(
                'query'         => $this->db->table('pegawai')->select('"",nama, jabatan, instansi, gambar, tgl_update, pegawai_id as btn_detail,"biodata_narasumber" as btn_detail_source'),
                'column_order'  => array('nama','jabatan','instansi','gambar','tgl_update','pegawai_id'),
                'order'         => array('nama' => 'asc'),
                'column_search' => array('nama','jabatan','instansi')
                );
            }
        }else{
            return false;
        }
        
        if ($type=='count') {
            return $db->countAllResults();
        }else{
            return $db->get()->getResultArray();
        }
    }

    public function get_detail_pegawai($id){
        return $this->db->table('pegawai')->where('pegawai_id', $id)->get()->getRow();
    }

    public function get_administratif_kegiatan($param,$type='count')
    {
        if ($param=='data_kegiatan') {
            if ($type=='count' && $type=='summary') {   
                $db=$this->db->table('vw_kegiatan');
            }elseif ($type=='detail') {
                return array(
                'query'         => $this->db->table('vw_kegiatan')->select('
                    "",
                    nama_kegiatan,
                    nama_bankdata,
                    nama,
                    tgl_kegiatan,
                    lokasi,
                    file_url as btn_download,
                    nama_kegiatan as btn_detail,
                    "data_kegiatan" as btn_detail_source
                '),
                'column_order'  => array('nama_kegiatan', 'nama_bankdata', 'nama', 'tgl_kegiatan', 'lokasi','btn_download','btn_detail' ),
                'order'         => array('tgl_kegiatan' => 'asc'),
                'column_search' => array('nama_kegiatan', 'nama','lokasi')
                );
            }
        }else{
            return false;
        }
        
        if ($type=='count') {
            return $db->countAllResults();
        }else{
            return $db->get()->getResultArray();
        }
    }

    public function get_detail_kegiatan($kegiatan){
        return $this->db->table('vw_kegiatan')->like('nama_kegiatan',$kegiatan,'both')->get()->getRow();
    }

    public function get_data_administratif_kerjasama($param,$type='count')
    {
        if ($type=='count') {   
            if ($param=='prodi') {      
                $db=$this->db->table('kerjasama')->select('count(kerjasama_id) as total')->where('kategori','Prodi');
            }elseif($param=='pusat'){      
                $db=$this->db->table('kerjasama')->select('count(kerjasama_id) as total')->where('kategori','Pusat');
            }elseif ($param=='daerah') {      
                $db=$this->db->table('kerjasama')->select('count(kerjasama_id) as total')->where('kategori','Daerah');
            }
        }elseif ($type=='detail') {
            if ($param=='prodi') {
                return array(
                    'query'         => $this->db->table('kerjasama')->select('"",kategori, nama_kerjasama, deskripsi, durasi, start_date, end_date, file_url as btn_download, input_date, modify_date' ),
                    'column_order'  => array('kategori','nama_kerjasama','deskripsi','durasi','start_date','end_date','btn_download','input_date','modify_date'),
                    'order'         => array('nama_kerjasama' => 'asc'),
                    'column_search' => array('nama_kerjasama'),
                    'query_where'   => array('kategori'=>'Prodi')
                );
            }elseif($param=='pusat'){
                return array(
                    'query'         => $this->db->table('kerjasama')->select('"",kategori, nama_kerjasama, deskripsi, durasi, start_date, end_date, file_url as btn_download, input_date, modify_date' ),
                    'column_order'  => array('kategori','nama_kerjasama','deskripsi','durasi','start_date','end_date','btn_download','input_date','modify_date'),
                    'order'         => array('nama_kerjasama' => 'asc'),
                    'column_search' => array('nama_kerjasama'),
                    'query_where'   => array('kategori'=>'Pusat')
                );
            }elseif ($param=='daerah') {
                return array(
                    'query'         => $this->db->table('kerjasama')->select('"",kategori, nama_kerjasama, deskripsi, durasi, start_date, end_date, file_url as btn_download, input_date, modify_date' ),
                    'column_order'  => array('kategori','nama_kerjasama','deskripsi','durasi','start_date','end_date','btn_download','input_date','modify_date'),
                    'order'         => array('nama_kerjasama' => 'asc'),
                    'column_search' => array('nama_kerjasama'),
                    'query_where'   => array('kategori'=>'Daerah')
                );
            }
        }
       
        
        return $db->get()->getResultArray();
    }

}

/* End of file Data__model.php */
/* Location: ./application/models/Data__model.php */