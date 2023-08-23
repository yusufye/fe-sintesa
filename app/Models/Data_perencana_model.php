<?php
namespace App\Models;
use CodeIgniter\Model;

class Data_perencana_model extends Model {
    public function get_perencana_data_perencana($param,$type='count')
    {
        if ($param=='pusat') {
            if ($type=='count') {   
                $db=$this->db->table('vw_perencana_pusat_summary')->select('SUM(total) as total');
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_perencana_pusat_summary')->select('Program, `Perencana Ahli Pertama`, `Perencana Ahli Muda`, `Perencana Ahli Madya`, `Perencana Ahli Utama`, total', false);


            }elseif ($type=='detail') {
                return array(
                'query'         => $this->db->table('vw_perencana_pusat'),
                'column_order'  => array('name', 'gender', 'golongan', 'kementrian_name', 'unit_kerja', 'jabatan', 'periode'),
                'order'         => array('name' => 'asc'),
                'column_search' => array('name', 'gender', 'golongan', 'kementrian_name', 'unit_kerja', 'jabatan', 'periode')
                );
            }
        }elseif ($param=='daerah') {
            if ($type=='count') {   
                $db=$this->db->table('vw_perencana_daerah_summary')->select('SUM(total) as total');
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_perencana_daerah_summary')->select('Program, `Perencana Ahli Pertama`, `Perencana Ahli Muda`, `Perencana Ahli Madya`, `Perencana Ahli Utama`, total', false);
            }elseif ($type=='detail') {
                return array(
                    'query'         => $this->db->table('vw_perencana_daerah'),
                    'column_order'  => array('name', 'gender', 'golongan', 'kementrian_name', 'unit_kerja', 'jabatan', 'periode'),
                    'order'         => array('name' => 'asc'),
                    'column_search' => array('name', 'gender', 'golongan', 'kementrian_name', 'unit_kerja', 'jabatan', 'periode')
                    );
            }
        }elseif ($param=='gabungan') {
            if ($type=='count') {   
                $db=$this->db->table('vw_perencana_gabungan_summary')->select('SUM(total) as total');
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_perencana_gabungan_summary')->select('Program, `Perencana Ahli Pertama`, `Perencana Ahli Muda`, `Perencana Ahli Madya`, `Perencana Ahli Utama`, total', false);
            }elseif ($type=='detail') {
                return array(
                    'query'         => $this->db->table('vw_perencana_gabungan'),
                    'column_order'  => array('name', 'gender', 'golongan', 'kementrian_name', 'unit_kerja', 'jabatan', 'periode'),
                    'order'         => array('name' => 'asc'),
                    'column_search' => array('name', 'gender', 'golongan', 'kementrian_name', 'unit_kerja', 'jabatan', 'periode')
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

    public function get_perencana_data_tim_penilai($param,$type='count')
    {
        if ($param=='pusat') {
            if ($type=='count') {   
                $db=$this->db->table('vw_penilai_pusat_summary')->select('SUM(total) as total');
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_penilai_pusat_summary')->select('Program, `Perencana Ahli Pertama`, `Perencana Ahli Muda`, `Perencana Ahli Madya`, `Perencana Ahli Utama`, total', false);
            }elseif ($type=='detail') {
                return array(
                'query'         => $this->db->table('vw_penilai_pusat'),
                'column_order'  => array('name', 'gender', 'golongan', 'kementrian_name', 'unit_kerja', 'jabatan', 'periode'),
                'order'         => array('name' => 'asc'),
                'column_search' => array('name', 'gender', 'golongan', 'kementrian_name', 'unit_kerja', 'jabatan', 'periode')
                );
            }
        }elseif ($param=='daerah') {
            if ($type=='count') {   
                $db=$this->db->table('vw_penilai_pusat_summary')->select('SUM(total) as total');
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_penilai_pusat_summary')->select('Program, `Perencana Ahli Pertama`, `Perencana Ahli Muda`, `Perencana Ahli Madya`, `Perencana Ahli Utama`, total', false);
            }elseif ($type=='detail') {
                return array(
                    'query'         => $this->db->table('vw_penilai_pusat'),
                    'column_order'  => array('name', 'gender', 'golongan', 'kementrian_name', 'unit_kerja', 'jabatan', 'periode'),
                    'order'         => array('name' => 'asc'),
                    'column_search' => array('name', 'gender', 'golongan', 'kementrian_name', 'unit_kerja', 'jabatan', 'periode')
                    );
            }
        }elseif ($param=='gabungan') {
            if ($type=='count') {   
                $db=$this->db->table('vw_penilai_pusat_summary')->select('SUM(total) as total');
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_penilai_pusat_summary')->select('Program, `Perencana Ahli Pertama`, `Perencana Ahli Muda`, `Perencana Ahli Madya`, `Perencana Ahli Utama`, total', false);
            }elseif ($type=='detail') {
                return array(
                    'query'         => $this->db->table('vw_penilai_gabungan'),
                    'column_order'  => array('name', 'gender', 'golongan', 'kementrian_name', 'unit_kerja', 'jabatan', 'periode'),
                    'order'         => array('name' => 'asc'),
                    'column_search' => array('name', 'gender', 'golongan', 'kementrian_name', 'unit_kerja', 'jabatan', 'periode')
                    );
            }
        }else{
            return false;
        }
        
        return $db->get()->getResultArray();
    }

    function get_chart_perencana_detail($param,$type,$group_by,$filters=null){
        $return=null;
        if ($type=='data-perencana') {
            if ($param=='pusat') {
                $return=$this->db->table('vw_perencana_pusat')->select("$group_by,count(jumlah) as jumlah")->groupBy($group_by);
            }elseif ($param=='daerah') {
                $return=$this->db->table('vw_perencana_daerah')->select("$group_by,count(jumlah) as jumlah")->groupBy($group_by);
            }elseif($param=='gabungan'){
                $return=$this->db->table('vw_perencana_gabungan')->select("$group_by,count(jumlah) as jumlah")->groupBy($group_by);
            }
        }else{
            if ($param=='pusat') {
                $return=$this->db->table('vw_penilai_pusat')->select("$group_by,count(jumlah) as jumlah")->groupBy($group_by);
            }elseif ($param=='daerah') {
                $return=$this->db->table('vw_penilai_daerah')->select("$group_by,count(jumlah) as jumlah")->groupBy($group_by);
            }elseif($param=='gabungan'){
                $return=$this->db->table('vw_penilai_gabungan')->select("$group_by,count(jumlah) as jumlah")->groupBy($group_by);
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

    function get_list_golongan(){
        return $this->db->query($this->db->table('vw_perencana_pusat')
        ->select('golongan')
        ->getCompiledSelect().' UNION '.$this->db->table('vw_perencana_daerah')
        ->select('golongan')
        ->getCompiledSelect().' UNION '.$this->db->table('vw_perencana_gabungan')
        ->select('golongan')
        ->getCompiledSelect())->getResultArray();
    }

    function get_list_instansi(){
        return $this->db->query($this->db->table('vw_perencana_pusat')
        ->select('kementrian_name')
        ->getCompiledSelect().' UNION '.$this->db->table('vw_perencana_daerah')
        ->select('kementrian_name')
        ->getCompiledSelect().' UNION '.$this->db->table('vw_perencana_gabungan')
        ->select('kementrian_name')
        ->getCompiledSelect())->getResultArray();
    }

    function get_list_unit_kerja(){
        return $this->db->query($this->db->table('vw_perencana_pusat')
        ->select('unit_kerja')
        ->getCompiledSelect().' UNION '.$this->db->table('vw_perencana_daerah')
        ->select('unit_kerja')
        ->getCompiledSelect().' UNION '.$this->db->table('vw_perencana_gabungan')
        ->select('unit_kerja')
        ->getCompiledSelect())->getResultArray();
    }
    
    function get_list_jabatan(){
        return $this->db->query($this->db->table('vw_perencana_pusat')
        ->select('jabatan')
        ->getCompiledSelect().' UNION '.$this->db->table('vw_perencana_daerah')
        ->select('jabatan')
        ->getCompiledSelect().' UNION '.$this->db->table('vw_perencana_gabungan')
        ->select('jabatan')
        ->getCompiledSelect())->getResultArray();
    }

    function get_list_periode(){
        return $this->db->query($this->db->table('vw_perencana_pusat')
        ->select('periode')
        ->getCompiledSelect().' UNION '.$this->db->table('vw_perencana_daerah')
        ->select('periode')
        ->getCompiledSelect().' UNION '.$this->db->table('vw_perencana_gabungan')
        ->select('periode')
        ->getCompiledSelect())->getResultArray();
    }

}

/* End of file Data_diklat_model.php */
/* Location: ./application/models/Data_diklat_model.php */