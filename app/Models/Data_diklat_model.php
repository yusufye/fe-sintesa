<?php
namespace App\Models;
use CodeIgniter\Model;

class Data_diklat_model extends Model {
    public function get_diklat_data_pelamar($param,$type='count')
    {
        if ($param=='pendidikan') {
            if ($type=='count') {   
                $db=$this->db->table('vw_alumni_pendidikan_summary')->select('SUM(total) as total');
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_alumni_pendidikan_summary')->select('*');
            }elseif ($type=='detail') {
                return array(
                'query'         => $this->db->table('vw_alumni_pendidikan_summary'),
                'column_order'  => array('nip','nama',null,null,null,null),
                'order'         => array('nama' => 'asc'),
                'column_search' => array('nip','nama')
                );
            }
        }elseif ($param=='pelatihan') {
            if ($type=='count') {   
                $db=$this->db->table('vw_alumni_pelatihan_summary')->select('SUM(total) as total');
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_alumni_pelatihan_summary')->select('*');
            }elseif ($type=='detail') {
                return array(
                    'query'         => $this->db->table('vw_alumni_pelatihan_summary'),
                    'column_order'  => array('nip','nama',null,null,null,null),
                    'order'         => array('nama' => 'asc'),
                    'column_search' => array('nip','nama')
                    );
            }
        }elseif ($param=='gabungan') {
            if ($type=='count') {   
                $db=$this->db->table('vw_alumni_gabungan_summary')->select('SUM(total) as total');
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_alumni_gabungan_summary')->select('*');
            }elseif ($type=='detail') {
                return array(
                    'query'         => $this->db->table('vw_alumni_gabungan_summary'),
                    'column_order'  => array('nip','nama',null,null,null,null),
                    'order'         => array('nama' => 'asc'),
                    'column_search' => array('nip','nama')
                    );
            }
        }else{
            return false;
        }
        
        // if ($type=='count') {
        //     return $db->countAllResults();
        // }else{
        // }
        return $db->get()->getResultArray();
    }

    public function get_diklat_data_penempatan($param,$type='count')
    {

        if ($param=='pendidikan') {
            if ($type=='count') {   
                $db=$this->db->table('vw_alumni_pendidikan_summary')->select('SUM(total) as total');
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_alumni_pendidikan_summary')->select('*');
            }elseif ($type=='detail') {
                return array(
                'query'         => $this->db->table('vw_alumni_pendidikan_summary'),
                'column_order'  => array('nip','nama',null,null,null,null),
                'order'         => array('nama' => 'asc'),
                'column_search' => array('nip','nama')
                );
            }
        }elseif ($param=='pelatihan') {
            if ($type=='count') {   
                $db=$this->db->table('vw_alumni_pelatihan_summary')->select('SUM(total) as total');
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_alumni_pelatihan_summary')->select('*');
            }elseif ($type=='detail') {
                return array(
                'query'         => $this->db->table('vw_alumni_pelatihan_summary'),
                'column_order'  => array('nip','nama',null,null,null,null),
                'order'         => array('nama' => 'asc'),
                'column_search' => array('nip','nama')
                );
            }
            
        }elseif ($param=='gabungan') {
            if ($type=='count') {   
                $db=$this->db->table('vw_alumni_gabungan_summary')->select('SUM(total) as total');
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_alumni_gabungan_summary')->select('*');
            }elseif ($type=='detail') {
                return array(
                'query'         => $this->db->table('vw_alumni_gabungan_summary'),
                'column_order'  => array('nip','nama',null,null,null,null),
                'order'         => array('nama' => 'asc'),
                'column_search' => array('nip','nama')
                );
            }
            
        }else{
            return false;
        }
        
        // if ($type=='count') {
        //     return $db->countAllResults();
        // }else{
        // }
        return $db->get()->getResultArray();
    }

    public function get_diklat_data_alumni($param,$type='count')
    {

        if ($param=='pendidikan') {
            if ($type=='count') {   
                $db=$this->db->table('vw_alumni_pendidikan_summary')->select('SUM(total) as total');
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_alumni_pendidikan_summary')->select('*');
            }elseif ($type=='detail') {
                return array(
                'query'         => $this->db->table('vw_alumni_pendidikan_summary'),
                'column_order'  => array('nip','nama',null,null,null,null),
                'order'         => array('nama' => 'asc'),
                'column_search' => array('nip','nama')
                );
            }
        }elseif ($param=='pelatihan') {
            if ($type=='count') {   
                $db=$this->db->table('vw_alumni_pelatihan_summary')->select('SUM(total) as total');
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_alumni_pelatihan_summary')->select('*');
            }elseif ($type=='detail') {
                return array(
                'query'         => $this->db->table('vw_alumni_pelatihan_summary'),
                'column_order'  => array('nip','nama',null,null,null,null),
                'order'         => array('nama' => 'asc'),
                'column_search' => array('nip','nama')
                );
            }
            
        }elseif ($param=='gabungan') {
            if ($type=='count') {   
                $db=$this->db->table('vw_alumni_gabungan_summary')->select('SUM(total) as total');
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_alumni_gabungan_summary')->select('*');
            }elseif ($type=='detail') {
                return array(
                'query'         => $this->db->table('vw_alumni_gabungan_summary'),
                'column_order'  => array('nip','nama',null,null,null,null),
                'order'         => array('nama' => 'asc'),
                'column_search' => array('nip','nama')
                );
            }
           
        }else{
            return false;
        }
        
        // if ($type=='count') {
        //     return $db->countAllResults();
        // }else{
        // }
        return $db->get()->getResultArray();
    }
}

/* End of file Data_diklat_model.php */
/* Location: ./application/models/Data_diklat_model.php */