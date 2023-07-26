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
        }elseif ($param=='gabungan') {
            if ($type=='count') {   
                $db=$this->db->table('vw_perencana_pusat_summary')->select('SUM(total) as total');
            }elseif ($type=='summary') {
                $db=$this->db->table('vw_perencana_pusat_summary')->select('Program, `Perencana Ahli Pertama`, `Perencana Ahli Muda`, `Perencana Ahli Madya`, `Perencana Ahli Utama`, total', false);
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

    function get_chart_perencana_pusat_detail($filters=null){
        if (isset($filters)) {
            foreach ($filters as $row_filter) {
                if (isset($row_filter['value']) && $row_filter['value']!='') {
                    if ($row_filter['type']=='date_range_start') {
                        $this->dt->where($row_filter['field']." >=",$row_filter['value']);
                    }elseif ($row_filter['type']=='date_range_end') {
                        $this->dt->where($row_filter['field']." <=",$row_filter['value']);
                    }else{
                        $this->dt->like($row_filter['field'],$row_filter['value'],'both');
                    }
                }
            }
        }
        return $this->db->table('vw_perencana_pusat')->get()->getResultArray();
    }

}

/* End of file Data_diklat_model.php */
/* Location: ./application/models/Data_diklat_model.php */