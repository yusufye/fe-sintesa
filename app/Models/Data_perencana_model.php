<?php
namespace App\Models;
use CodeIgniter\Model;

class Data_perencana_model extends Model {
    public function get_perencana_data_perencana($param,$type='count')
    {
        if ($param=='pusat') {
            if ($type=='count') {   
                $db=$this->db->table('users u')
                ->join('edupak_periodes ep', 'u.id = ep.`iduser`', 'LEFT')
                ->where('LEVEL', 'mm')
                ->where('approved', 1)
                ->where('u.status', 1)
                ->groupStart()
                ->where('kemcategory', 0)
                ->orWhere('kemcategory', 1)
                ->groupEnd();
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_pelamar_pendidikan_summary')->select('*');
            }elseif ($type=='detail') {
                return array(
                'query'         => $this->db->table('vw_pelamar_pendidikan_detail'),
                'column_order'  => array('nip','nama',null,null,null,null),
                'order'         => array('nama' => 'asc'),
                'column_search' => array('nip','nama')
                );
            }
        }elseif ($param=='daerah') {
            if ($type=='count') {   
                $db=$this->db->table('users u')
                ->join('edupak_periodes ep', 'u.id = ep.`iduser`', 'LEFT')
                ->where('LEVEL', 'mm')
                ->where('approved', 1)
                ->where('u.status', 1)
                ->groupStart()
                ->where('kemcategory', 2)
                ->orWhere('kemcategory', 3)
                ->groupEnd();
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_pelamar_pelatihan_summary')->select('*');
            }elseif ($type=='detail') {
                return array(
                    'query'         => $this->db->table('vw_pelamar_pelatihan_detail'),
                    'column_order'  => array('nip','nama',null,null,null,null),
                    'order'         => array('nama' => 'asc'),
                    'column_search' => array('nip','nama')
                    );
            }
        }elseif ($param=='gabungan') {
            if ($type=='count') {   
                $db=$this->db->table('users u')
                ->join('edupak_periodes ep', 'u.id = ep.`iduser`', 'LEFT')
                ->where('LEVEL', 'mm')
                ->where('approved', 1)
                ->where('u.status', 1)
                ->groupStart()
                ->where('kemcategory', 0)
                ->orWhere('kemcategory', 1)
                ->orWhere('kemcategory', 2)
                ->orWhere('kemcategory', 3)
                ->groupEnd();
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_pelamar_gabungan_summary')->select('*');
            }elseif ($type=='detail') {
                return array(
                    'query'         => $this->db->table('vw_pelamar_gabungan_detail'),
                    'column_order'  => array('nip','nama',null,null,null,null),
                    'order'         => array('nama' => 'asc'),
                    'column_search' => array('nip','nama')
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

    public function get_perencana_data_tim_penilai($param,$type='count')
    {

        if ($param=='pusat') {
            if ($type=='count') {   
                $db=$this->db->table('users u')
                ->join('edupak_periodes ep', 'u.id = ep.`iduser`', 'LEFT')
                ->where('LEVEL', 'pp')
                ->where('approved', 1)
                ->where('u.status', 1)
                ->groupStart()
                ->where('kemcategory', 0)
                ->orWhere('kemcategory', 1)
                ->groupEnd();
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_pelamar_pendidikan_summary')->select('*');
            }elseif ($type=='detail') {
                return array(
                'query'         => $this->db->table('vw_pelamar_pendidikan_detail'),
                'column_order'  => array('nip','nama',null,null,null,null),
                'order'         => array('nama' => 'asc'),
                'column_search' => array('nip','nama')
                );
            }
        }elseif ($param=='daerah') {
            if ($type=='count') {   
                $db=$this->db->table('users u')
                ->join('edupak_periodes ep', 'u.id = ep.`iduser`', 'LEFT')
                ->where('LEVEL', 'pp')
                ->where('approved', 1)
                ->where('u.status', 1)
                ->groupStart()
                ->where('kemcategory', 2)
                ->orWhere('kemcategory', 3)
                ->groupEnd();
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_pelamar_pendidikan_summary')->select('*');
            }elseif ($type=='detail') {
                return array(
                'query'         => $this->db->table('vw_pelamar_pendidikan_detail'),
                'column_order'  => array('nip','nama',null,null,null,null),
                'order'         => array('nama' => 'asc'),
                'column_search' => array('nip','nama')
                );
            }
            
        }elseif ($param=='gabungan') {
            if ($type=='count') {   
                $db=$this->db->table('users u')
                ->join('edupak_periodes ep', 'u.id = ep.`iduser`', 'LEFT')
                ->where('LEVEL', 'pp')
                ->where('approved', 1)
                ->where('u.status', 1)
                ->groupStart()
                ->where('kemcategory', 0)
                ->orWhere('kemcategory', 1)
                ->orWhere('kemcategory', 2)
                ->orWhere('kemcategory', 3)
                ->groupEnd();
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_pelamar_pendidikan_summary')->select('*');
            }elseif ($type=='detail') {
                return array(
                'query'         => $this->db->table('vw_pelamar_pendidikan_detail'),
                'column_order'  => array('nip','nama',null,null,null,null),
                'order'         => array('nama' => 'asc'),
                'column_search' => array('nip','nama')
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

}

/* End of file Data_diklat_model.php */
/* Location: ./application/models/Data_diklat_model.php */