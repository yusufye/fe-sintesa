<?php
namespace App\Models;
use CodeIgniter\Model;

class Data_diklat_model extends Model {
    public function get_diklat_data_pelamar($param,$type='count')
    {
        if ($param=='pendidikan') {
            if ($type=='count') {   
                $db=$this->db->table('vw_pelamar_pendidikan_summary')->select('SUM(total) as total');
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_pelamar_pendidikan_summary')->select('*');
            }elseif ($type=='detail') {
                return array(
                'query'         => $this->db->table('vw_pelamar_pendidikan')->select('nama,email,gender,wilayah,nama_inst,prop_inst,pnddkn,jurusan,penempatan,tahun'),
                'column_order'  => array('nama', 'gender', 'wilayah','nama_inst', 'pnddkn', 'jurusan', 'penempatan', 'tahun'),
                'order'         => array('tahun' => 'asc'),
                'column_search' => array('nama', 'gender', 'wilayah','nama_inst', 'pnddkn', 'jurusan', 'penempatan','email','prop_inst')
                );
            }
        }elseif ($param=='pelatihan') {
            if ($type=='count') {   
                $db=$this->db->table('vw_pelamar_pelatihan_summary')->select('SUM(total) as total');
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_pelamar_pelatihan_summary')->select('*');
            }elseif ($type=='detail') {
                return array(
                'query'         => $this->db->table('vw_pelamar_pelatihan')->select('nama,email,gender,wilayah,nama_inst,prop_inst,pnddkn,jurusan,penempatan,tahun'),
                'column_order'  => array('nama', 'gender', 'wilayah','nama_inst', 'pnddkn', 'jurusan', 'penempatan', 'tahun'),
                'order'         => array('tahun' => 'asc'),
                'column_search' => array('nama', 'gender', 'wilayah','nama_inst', 'pnddkn', 'jurusan', 'penempatan','email','prop_inst')
                );
            }
        }elseif ($param=='gabungan') {
            if ($type=='count') {   
                $db=$this->db->table('vw_pelamar_gabungan_summary')->select('SUM(total) as total');
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_pelamar_gabungan_summary')->select('*');
            }elseif ($type=='detail') {
                return array(
                    'query'         => $this->db->table('vw_pelamar_gabungan')->select('nemail,ama,gender,wilayah,prop_inst,nama_inst,pnddkn,jurusan,penempatan,tahun'),
                    'column_order'  => array('nama', 'gender', 'wilayah','nama_inst', 'pnddkn', 'jurusan', 'penempatan', 'tahun'),
                    'order'         => array('tahun' => 'asc'),
                    'column_search' => array('nama', 'gender', 'wilayah','nama_inst', 'pnddkn', 'jurusan', 'penempatan','email','prop_inst')
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
                $db=$this->db->table('vw_penempatan_pendidikan_summary')->select('SUM(total) as total');
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_penempatan_pendidikan_summary')->select('*');
            }elseif ($type=='detail') {
                return array(
                    'query'         => $this->db->table('vw_penempatan_pendidikan')->select('nemail,ama,gender,wilayah,prop_inst,nama_inst,pnddkn,jurusan,penempatan,tahun'),
                    'column_order'  => array('nama', 'gender', 'wilayah','nama_inst', 'pnddkn', 'jurusan', 'penempatan', 'tahun'),
                    'order'         => array('tahun' => 'asc'),
                    'column_search' => array('nama', 'gender', 'wilayah','nama_inst', 'pnddkn', 'jurusan', 'penempatan','email','prop_inst')
                    );
            }
        }elseif ($param=='pelatihan') {
            if ($type=='count') {   
                $db=$this->db->table('vw_penempatan_pelatihan_summary')->select('SUM(total) as total');
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_penempatan_pelatihan_summary')->select('*');
            }elseif ($type=='detail') {
                return array(
                    'query'         => $this->db->table('vw_penempatan_pelatihan')->select('nemail,ama,gender,wilayah,prop_inst,nama_inst,pnddkn,jurusan,penempatan,tahun'),
                    'column_order'  => array('nama', 'gender', 'wilayah','nama_inst', 'pnddkn', 'jurusan', 'penempatan', 'tahun'),
                    'order'         => array('tahun' => 'asc'),
                    'column_search' => array('nama', 'gender', 'wilayah','nama_inst', 'pnddkn', 'jurusan', 'penempatan','email','prop_inst')
                    );
            }
            
        }elseif ($param=='gabungan') {
            if ($type=='count') {   
                $db=$this->db->table('vw_penempatan_gabungan_summary')->select('SUM(total) as total');
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_penempatan_gabungan_summary')->select('*');
            }elseif ($type=='detail') {
                return array(
                'query'         => $this->db->table('vw_penempatan_gabungan')->select('nama,email,gender,wilayah,nama_inst,prop_inst,pnddkn,jurusan,penempatan,tahun'),
                'column_order'  => array('nama', 'gender', 'wilayah','nama_inst', 'pnddkn', 'jurusan', 'penempatan', 'tahun'),
                'order'         => array('tahun' => 'asc'),
                'column_search' => array('nama', 'gender', 'wilayah','nama_inst', 'pnddkn', 'jurusan', 'penempatan','email','prop_inst')
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
                    'query'         => $this->db->table('vw_alumni_pendidikan')->select('nemail,ama,gender,wilayah,prop_inst,nama_inst,pnddkn,jurusan,penempatan,tahun'),
                    'column_order'  => array('nama', 'gender', 'wilayah','nama_inst', 'pnddkn', 'jurusan', 'penempatan', 'tahun'),
                    'order'         => array('tahun' => 'asc'),
                    'column_search' => array('nama', 'gender', 'wilayah','nama_inst', 'pnddkn', 'jurusan', 'penempatan','email','prop_inst')
                    );
            }
        }elseif ($param=='pelatihan') {
            if ($type=='count') {   
                $db=$this->db->table('vw_alumni_pelatihan_summary')->select('SUM(total) as total');
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_alumni_pelatihan_summary')->select('*');
            }elseif ($type=='detail') {
                return array(
                    'query'         => $this->db->table('vw_alumni_pelatihan')->select('nemail,ama,gender,wilayah,prop_inst,nama_inst,pnddkn,jurusan,penempatan,tahun'),
                    'column_order'  => array('nama', 'gender', 'wilayah','nama_inst', 'pnddkn', 'jurusan', 'penempatan', 'tahun'),
                    'order'         => array('tahun' => 'asc'),
                    'column_search' => array('nama', 'gender', 'wilayah','nama_inst', 'pnddkn', 'jurusan', 'penempatan','email','prop_inst')
                    );
            }
            
        }elseif ($param=='gabungan') {
            if ($type=='count') {   
                $db=$this->db->table('vw_alumni_gabungan_summary')->select('SUM(total) as total');
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_alumni_gabungan_summary')->select('*');
            }elseif ($type=='detail') {
                return array(
                    'query'         => $this->db->table('vw_alumni_gabungan')->select('nemail,ama,gender,wilayah,prop_inst,nama_inst,pnddkn,jurusan,penempatan,tahun'),
                    'column_order'  => array('nama', 'gender', 'wilayah','nama_inst', 'pnddkn', 'jurusan', 'penempatan', 'tahun'),
                    'order'         => array('tahun' => 'asc'),
                    'column_search' => array('nama', 'gender', 'wilayah','nama_inst', 'pnddkn', 'jurusan', 'penempatan','email','prop_inst')
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

    function get_chart_diklat_detail($param,$type,$group_by,$filters=null){
        $return=null;
        if ($type=='data-pelamar') {
            if ($param=='pendidikan') {
                $return=$this->db->table('vw_pelamar_pendidikan')->select("$group_by,count(jumlah) as jumlah")->groupBy($group_by);
            }elseif ($param=='pelatihan') {
                $return=$this->db->table('vw_pelamar_pelatihan')->select("$group_by,count(jumlah) as jumlah")->groupBy($group_by);
            }elseif($param=='gabungan'){
                $return=$this->db->table('vw_pelamar_gabungan')->select("$group_by,count(jumlah) as jumlah")->groupBy($group_by);
            }
        }elseif ($type=='data-penempatan') {
            if ($param=='pendidikan') {
                $return=$this->db->table('vw_penempatan_pendidikan')->select("$group_by,count(jumlah) as jumlah")->groupBy($group_by);
            }elseif ($param=='pelatihan') {
                $return=$this->db->table('vw_penempatan_pelatihan')->select("$group_by,count(jumlah) as jumlah")->groupBy($group_by);
            }elseif($param=='gabungan'){
                $return=$this->db->table('vw_penempatan_gabungan')->select("$group_by,count(jumlah) as jumlah")->groupBy($group_by);
            }
        }elseif ($type=='data-alumni') {
            if ($param=='pendidikan') {
                $return=$this->db->table('vw_alumni_pendidikan')->select("$group_by,count(jumlah) as jumlah")->groupBy($group_by);
            }elseif ($param=='pelatihan') {
                $return=$this->db->table('vw_alumni_pelatihan')->select("$group_by,count(jumlah) as jumlah")->groupBy($group_by);
            }elseif($param=='gabungan'){
                $return=$this->db->table('vw_alumni_gabungan')->select("$group_by,count(jumlah) as jumlah")->groupBy($group_by);
            }
        }

        if (isset($filters)) {
            foreach ($filters as $row_filter) {
                if (isset($row_filter['value']) && $row_filter['value']!='') {
                    if ($row_filter['type']=='date_range_start') {
                        $return->where($row_filter['field']." >=",$row_filter['value']);
                    }elseif ($row_filter['type']=='date_range_end') {
                        $return->where($row_filter['field']." <=",$row_filter['value']);
                    }elseif ($row_filter['type']=='equal_to') {
                        $return->where($row_filter['field']."=",$row_filter['value']);
                    }else{
                        $return->like($row_filter['field'],$row_filter['value'],'both');
                    }
                }
            }
        }
        
        return ($return==null)?$return:$return->get()->getResultArray();
    }

    function get_list_instansi($sub){
        if ($sub=='data-pelamar') {
            return $this->db->query($this->db->table('vw_pelamar_pendidikan')
            ->select('nama_inst')
            ->getCompiledSelect().' UNION '.$this->db->table('vw_pelamar_pelatihan')
            ->select('nama_inst')
            ->getCompiledSelect().' UNION '.$this->db->table('vw_pelamar_gabungan')
            ->select('nama_inst')
            ->getCompiledSelect())->getResultArray();
        }elseif ($sub=='data-penempatan') {
            return $this->db->query($this->db->table('vw_penempatan_pendidikan')
            ->select('nama_inst')
            ->getCompiledSelect().' UNION '.$this->db->table('vw_penempatan_pelatihan')
            ->select('nama_inst')
            ->getCompiledSelect().' UNION '.$this->db->table('vw_penempatan_gabungan')
            ->select('nama_inst')
            ->getCompiledSelect())->getResultArray();
        }elseif ($sub=='data-alumni') {
            return $this->db->query($this->db->table('vw_alumni_pendidikan')
            ->select('nama_inst')
            ->getCompiledSelect().' UNION '.$this->db->table('vw_alumni_pelatihan')
            ->select('nama_inst')
            ->getCompiledSelect().' UNION '.$this->db->table('vw_alumni_gabungan')
            ->select('nama_inst')
            ->getCompiledSelect())->getResultArray();
        }
    }

    function get_list_periode($sub){
        if ($sub=='data-pelamar') {
            return $this->db->query($this->db->table('vw_pelamar_pendidikan')
            ->select('tahun')
            ->getCompiledSelect().' UNION '.$this->db->table('vw_pelamar_pelatihan')
            ->select('tahun')
            ->getCompiledSelect().' UNION '.$this->db->table('vw_pelamar_gabungan')
            ->select('tahun')
            ->getCompiledSelect())->getResultArray();
        }elseif ($sub=='data-penempatan') {
            return $this->db->query($this->db->table('vw_penempatan_pendidikan')
            ->select('tahun')
            ->getCompiledSelect().' UNION '.$this->db->table('vw_penempatan_pelatihan')
            ->select('tahun')
            ->getCompiledSelect().' UNION '.$this->db->table('vw_penempatan_gabungan')
            ->select('tahun')
            ->getCompiledSelect())->getResultArray();
        }elseif ($sub=='data-alumni') {
            return $this->db->query($this->db->table('vw_alumni_pendidikan')
            ->select('tahun')
            ->getCompiledSelect().' UNION '.$this->db->table('vw_alumni_pelatihan')
            ->select('tahun')
            ->getCompiledSelect().' UNION '.$this->db->table('vw_alumni_gabungan')
            ->select('tahun')
            ->getCompiledSelect())->getResultArray();
        }
    }
}

/* End of file Data_diklat_model.php */
/* Location: ./application/models/Data_diklat_model.php */