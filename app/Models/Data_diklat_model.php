<?php
namespace App\Models;
use CodeIgniter\Model;

class Data_diklat_model extends Model {
    public function get_diklat_data_pelamar($param,$type='count')
    {
        if ($param=='pendidikan') {
            if ($type=='count') {   
                $db=$this->db->table('t_peserta tp')
                ->select('*,penempatan,pstat,ts.tahun AS tahun')
                ->join('t_datadiri td', 'tp.id_datadiri = td.id_datadiri', 'LEFT')
                ->join('t_seleksi ts', 'tp.id_seleksi = ts.id_seleksi', 'LEFT')
                // ->where('ts.tahun', '2022')
                ->like('ts.nama', 'DIKLAT GELAR', 'after')
                ->where('tp.delstat', 'a')
                ->orderBy('ts.tahun DESC');
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
        }elseif ($param=='pelatihan') {
            if ($type=='count') {   
                $db=$this->db->table('t_peserta tp')
                ->select('*,penempatan,pstat,ts.tahun AS tahun')
                ->join('t_datadiri td', 'tp.id_datadiri = td.id_datadiri', 'LEFT')
                ->join('t_seleksi ts', 'tp.id_seleksi = ts.id_seleksi', 'LEFT')
                // ->where('ts.tahun', '2022')
                ->where('tp.delstat', 'a')
                ->groupStart()
                ->like('ts.nama', 'DIKLAT NON', 'after')
                ->groupEnd()
                ->orderBy('ts.tahun DESC')
                ->limit(100);
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
                $db=$this->db->table('t_peserta tp')
                ->select('*,penempatan,pstat,ts.tahun AS tahun')
                ->join('t_datadiri td', 'tp.id_datadiri = td.id_datadiri', 'LEFT')
                ->join('t_seleksi ts', 'tp.id_seleksi = ts.id_seleksi', 'LEFT')
                // ->where('ts.tahun', '2022')
                ->like('ts.nama', 'GELAR', 'both')
                ->orderBy('ts.tahun DESC')
                ->limit(100);
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

    public function get_diklat_data_penempatan($param,$type='count')
    {

        if ($param=='pendidikan') {
            $db=$this->db->table('t_peserta tp')
            ->select('*,penempatan,pstat,ts.tahun AS tahun')
            ->join('t_datadiri td', 'tp.id_datadiri = td.id_datadiri', 'LEFT')
            ->join('t_seleksi ts', 'tp.id_seleksi = ts.id_seleksi', 'LEFT')
            ->where('penempatan !=', '')
            ->where('pstat', 1)
            ->where('ts.tahun', '2022')
            ->groupStart()
            ->like('ts.nama', 'GELAR', 'both')
            ->groupEnd()
            ->orderBy('ts.tahun DESC');
        }elseif ($param=='pelatihan') {
            $db=$this->db->table('t_peserta tp')
            ->select('*,penempatan,pstat,ts.tahun AS tahun')
            ->join('t_datadiri td', 'tp.id_datadiri = td.id_datadiri', 'LEFT')
            ->join('t_seleksi ts', 'tp.id_seleksi = ts.id_seleksi', 'LEFT')
            ->where('penempatan !=', '')
            ->where('pstat', 1)
            ->where('ts.tahun', '2022')
            ->groupStart()
            ->like('ts.nama', 'DIKLAT NON', 'after')
            ->groupEnd()
            ->orderBy('ts.tahun DESC');
        }elseif ($param=='gabungan') {
            $db=$this->db->table('t_peserta tp')
            ->select('*,penempatan,pstat,ts.tahun AS tahun')
            ->join('t_datadiri td', 'tp.id_datadiri = td.id_datadiri', 'LEFT')
            ->join('t_seleksi ts', 'tp.id_seleksi = ts.id_seleksi', 'LEFT')
            ->where(array('penempatan !=' => '','pstat' => 1,'ts.tahun' => '2022'))
            ->orderBy('ts.tahun DESC');
        }else{
            return false;
        }
        
        if ($type=='count') {
            return $db->countAllResults();
        }else{
            return $db->getResultArray();
        }
    }

    public function get_diklat_data_alumni($param,$type='count')
    {

        if ($param=='pendidikan') {
            $this->db->select('*,penempatan,pstat,ts.tahun AS tahun')
            ->from('t_peserta tp')
            ->join('t_datadiri td', 'tp.id_datadiri = td.id_datadiri', 'LEFT')
            ->join('t_seleksi ts', 'tp.id_seleksi = ts.id_seleksi', 'LEFT')
            ->join('t_alumni ta', 'tp.id_peserta = ta.id_peserta', 'LEFT')
            ->where('ta.tgl_lulus !=', '')
            ->group_start()
            ->like('ts.nama', 'DIKLAT GELAR', 'after')
            ->group_end()
            ->order_by('ts.tahun DESC');
        }elseif ($param=='pelatihan') {
            $this->db->select('*,penempatan,pstat,ts.tahun AS tahun')
            ->from('t_peserta tp')
            ->join('t_datadiri td', 'tp.id_datadiri = td.id_datadiri', 'LEFT')
            ->join('t_seleksi ts', 'tp.id_seleksi = ts.id_seleksi', 'LEFT')
            ->join('t_alumni ta', 'tp.id_peserta = ta.id_peserta', 'LEFT')
            ->where('ta.tgl_lulus !=', '')
            ->group_start()
            ->like('ts.nama', 'DIKLAT NON', 'after')
            ->group_end()
            ->order_by('ts.tahun DESC');
        }elseif ($param=='gabungan') {
            $this->db->select('*,penempatan,pstat,ts.tahun AS tahun')
            ->from('t_peserta tp')
            ->join('t_datadiri td', 'tp.id_datadiri = td.id_datadiri', 'LEFT')
            ->join('t_seleksi ts', 'tp.id_seleksi = ts.id_seleksi', 'LEFT')
            ->join('t_alumni ta', 'tp.id_peserta = ta.id_peserta', 'LEFT')
            ->where('ta.tgl_lulus !=', '')
            ->group_start()
            ->like('ts.nama', 'GELAR', 'both')
            ->group_end()
            ->order_by('ts.tahun DESC');
        }else{
            return false;
        }
        
        if ($type=='count') {
            return $db->countAllResults();
        }else{
            return $db->getResultArray();
        }
    }
}

/* End of file Data_diklat_model.php */
/* Location: ./application/models/Data_diklat_model.php */