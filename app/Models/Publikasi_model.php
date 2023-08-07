<?php
namespace App\Models;
use CodeIgniter\Model;

class Publikasi_model extends Model {
    public function get_publikasi_kebijakan_diklat($param,$type='count')
    {
        if ($type=='count') {   
            $db=$this->db->table('bankdata')->select('count(nama_kegiatan) as total')->where('kategorivideo_id','1');
        }elseif ($type=='detail') {
            if ($param=='video') {
                $db=$this->db->table('bankdata')->select('nama_kegiatan, nama_bankdata, tgl_upload, tgl_update, file_url, video_url,kategorivideo_id,tgl_kegiatan' )->where('kategorivideo_id','1');
            }else{
                return array(
                    'query'         => $this->db->table('bankdata')->select('nama_kegiatan,tgl_kegiatan,nama_bankdata, tgl_upload, tgl_update, file_url as btn_download,bankdata_id as btn_detail,"Kebijakan Diklat" as btn_detail_source' ),
                    'column_order'  => array('nama_kegiatan','tgl_kegiatan','nama_bankdata', 'tgl_upload', 'tgl_update','btn_download','btn_detail'),
                    'order'         => array('nama_kegiatan' => 'asc'),
                    'column_search' => array('nama_kegiatan'),
                    'query_where'   => array('kategorivideo_id'=>'1')
                );
            }
        }
       
        
        return $db->get()->getResultArray();
    }

    public function get_publikasi_kebijakan_jfp($param,$type='count')
    {
        if ($type=='count') {   
            $db=$this->db->table('bankdata')->select('count(nama_kegiatan) as total')->where('kategorivideo_id','2');
        }elseif ($type=='detail') {
            if ($param=='video') {
                $db=$this->db->table('bankdata')->select('nama_kegiatan, nama_bankdata, tgl_upload, tgl_update, file_url, video_url,kategorivideo_id,tgl_kegiatan' )->where('kategorivideo_id','2');
            }else{
                return array(
                    'query'         => $this->db->table('bankdata')->select('nama_kegiatan,tgl_kegiatan,nama_bankdata, tgl_upload, tgl_update, file_url as btn_download,bankdata_id as btn_detail,"Kebijakan JFP" as btn_detail_source' ),
                    'column_order'  => array('nama_kegiatan','tgl_kegiatan','nama_bankdata', 'tgl_upload', 'tgl_update','btn_download','btn_detail'),
                    'order'         => array('nama_kegiatan' => 'asc'),
                    'column_search' => array('nama_kegiatan'),
                    'query_where'   => array('kategorivideo_id'=>'2')

                );
            }
        }
       
        
        return $db->get()->getResultArray();
    }

    public function get_publikasi_kebijakan_umum($param,$type='count')
    {
        if ($type=='count') {   
            $db=$this->db->table('bankdata')->select('count(nama_kegiatan) as total')->where('kategorivideo_id',3);
        }elseif ($type=='detail') {
            if ($param=='video') {
                $db=$this->db->table('bankdata')->select('nama_kegiatan, nama_bankdata, tgl_upload, tgl_update, file_url, video_url,kategorivideo_id,tgl_kegiatan' )->where('kategorivideo_id',3);
            }else{
                return array(
                    'query'         => $this->db->table('bankdata')->select('nama_kegiatan,tgl_kegiatan,nama_bankdata, tgl_upload, tgl_update, file_url as btn_download,bankdata_id as btn_detail,"Kebijakan Umum" as btn_detail_source' ),
                    'column_order'  => array('nama_kegiatan','tgl_kegiatan','nama_bankdata', 'tgl_upload', 'tgl_update','btn_download','btn_detail'),
                    'order'         => array('nama_kegiatan' => 'asc'),
                    'column_search' => array('nama_kegiatan'),
                    'query_where'   => array('kategorivideo_id'=>'3')

                );
            }
        }
       
        
        return $db->get()->getResultArray();
    }

    public function get_detail_publikasi($id){
        return $this->db->table('bankdata')->where('bankdata_id',$id)->get()->getRow();
    }

}

/* End of file Data__model.php */
/* Location: ./application/models/Data__model.php */