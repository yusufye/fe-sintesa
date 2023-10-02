<?php
 
namespace App\Models;
 
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;
 
class Model_datatable extends Model
{
    protected $query;
    protected $column_order  = array();
    protected $column_search = array();
    protected $order         = array();
    protected $query_where   = array();
    protected $request;
    protected $db;
    protected $dt;
 
    function __construct(RequestInterface $request)
    {
        parent::__construct();
        $this->db = db_connect();
        $this->request = $request;
        
    }
    public function set_table($query,$column_order,$order,$column_search,$query_where)
    {
        $this->query         = $query;
        $this->column_order  = $column_order;
        $this->order         = $order;
        $this->column_search = $column_search;
        $this->query_where   = $query_where;
        $this->dt            = $this->query;
    }
    private function _get_datatables_query()
    {
        $i = 0;
        foreach ($this->column_search as $item) {
            if ($this->request->getPost('search')['value']) {
                if ($i === 0) {
                    $this->dt->groupStart();
                    $this->dt->like($item, $this->request->getPost('search')['value']);
                } else {
                    $this->dt->orLike($item, $this->request->getPost('search')['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->dt->groupEnd();
            }
            $i++;
        }
 
        if ($this->request->getPost('order')) {
            $this->dt->orderBy($this->column_order[$this->request->getPost('order')['0']['column']], $this->request->getPost('order')['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->dt->orderBy(key($order), $order[key($order)]);
        }

        if ($this->request->getPost('filters')) {
            foreach ($this->request->getPost('filters') as $row_filter) {
                if (isset($row_filter['value']) && $row_filter['value']!='') {
                    if ($row_filter['type']=='date_range_start') {
                        $this->dt->where($row_filter['field']." >=",$row_filter['value']);
                    }elseif ($row_filter['type']=='date_range_end') {
                        $this->dt->where($row_filter['field']." <=",$row_filter['value']);
                    }elseif ($row_filter['type']=='less_than') {
                        $this->dt->where($row_filter['field']." <",$row_filter['value']);
                    }elseif ($row_filter['type']=='equal_to') {
                        $this->dt->where($row_filter['field']." =",$row_filter['value']);
                    }elseif ($row_filter['type']=='perencana_program') {
                        if ($row_filter['value']=='pusat') {
                            $this->dt->where($row_filter['field']."<=",1);
                        }elseif ($row_filter['value']=='daerah') {
                            $this->dt->where($row_filter['field'].">=",2);
                        }
                    }
                    else{
                        $this->dt->like($row_filter['field'],$row_filter['value'],'both');
                    }
                }
            }
        }

        if (!empty($this->query_where)) {
            $this->dt->where($this->query_where);
        }
    }
    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($this->request->getPost('length') != -1)
            $this->dt->limit($this->request->getPost('length'), $this->request->getPost('start'));
        $query = $this->dt->get();
        return $query->getResult();
    }
    function count_filtered()
    {
        $this->_get_datatables_query();
        return $this->dt->countAllResults();
    }
    public function count_all()
    {
        $tbl_storage = $this->query;
        if (!empty($this->query_where)) {
            $this->dt->where($this->query_where);
        }
        return $tbl_storage->countAllResults();
    }
}