<?php

namespace App\Controllers;
use App\Models\Data_diklat_model;
use App\Models\Data_perencana_model;
use App\Models\Data_administratif_model;
use App\Models\Model_datatable;
use Config\Services;
class Web extends BaseController
{
    
    public function index()
    {
        return view('fe/template/header')
        .view('fe/home')
        .view('fe/template/footer');
    }

    
	public function data_diklat($sub=null,$sub2=null,$type=null)
	{
        $data_diklat_model = new Data_diklat_model();
		$list_sub=['data-pelamar','data-penempatan','data-alumni'];
		$list_sub_summary=['summary-pendidikan','summary-pelatihan','summary-gabungan'];
		
		if (!in_array($sub,$list_sub)) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}else{
			$sub_title  = ucwords(str_replace("-"," ",$sub));
			$model_name = strtolower(str_replace("-","_",$sub));
		}
		
		$data['orig_title']     = $sub;
		$data['sub_title']      = $sub_title;
		$data['title']          = $sub_title;
		$data['param']          = $sub2;
		$data['model_name']     = $model_name;
		$data['model_init']     = 'Data_diklat_model';
		$data['init_datatable'] = true;
		$data['init_chart'] 	= true;
		
		if ($type==null) { //count all
			$send_type='count';
		}elseif ($type=='summary' ) { 
			$send_type='summary';
		}elseif ($type=='detail' ) { 
			$send_type='detail';

			$data['model']                  = 'Data_diklat';
			$data['method']                 = 'get_diklat_'.$model_name;
			$data['method_param']           = $sub2;
			$data['method_type']            = $send_type;
			$data['init_global_dttable_js'] = true;

		}
		if ($send_type!='detail') {
			$data[$send_type][$model_name]['pendidikan']	=$data_diklat_model->{'get_diklat_'.$model_name}('pendidikan',$send_type);
			$data[$send_type][$model_name]['pelatihan']		=$data_diklat_model->{'get_diklat_'.$model_name}('pelatihan',$send_type);
			$data[$send_type][$model_name]['gabungan']		=$data_diklat_model->{'get_diklat_'.$model_name}('gabungan',$send_type);
		}else{
			$data[$send_type][$model_name][$sub2]	=$data_diklat_model->{'get_diklat_'.$model_name}($sub2,$send_type);
		}
		
		
      
		return view('fe/template/header',$data)
		.view('fe/data_diklat_'.$send_type,$data)
		.view('fe/template/footer',$data);
	}

	public function globalDtTable($model, $method, $param, $type)
	{
		//generate model
		$m="\App\Models".'\\'.$model;               
		$new_model=new $m();
		$datatable=$new_model->{$method}($param,$type);

		$request = Services::request();
        $datamodel = new Model_datatable($request);
        if ($request->getMethod(true) == 'POST') {
            $datamodel->set_table(
				$datatable['query'],
				$datatable['column_order'],
				$datatable['order'],
				$datatable['column_search']
			);

            $lists = $datamodel->get_datatables();
			// $x=$datamodel->db->getLastQuery()->getQuery();
			// echo '<pre>';print_r($x);echo'</pre>';
			// exit();
			$data = [];
            $no = $request->getPost("start");
            foreach ($lists as $key=>$list) {
				$no++;
                $row = [];
				foreach (array_keys(get_object_vars($list)) as $col_name) {
					if($col_name=='gambar'){
						$send_row="<img src='".$list->$col_name."' style='max-width:50px'>";
					}elseif ($col_name=='btn_detail') {
						$send_row="<button type='button' class='btn btn-primary show_dialog_detail btn-sm' data-source='".$list->btn_detail_source."' data-id='".$list->$col_name."' >Detail</button>";
					}elseif ($col_name=='btn_download') {
						$send_row="<a class='btn btn-secondary btn-sm' target='_blank' href='".$list->btn_download."'>Download</a>";
					}elseif ($col_name=='btn_detail_source') {
						continue;
					}else{
						$send_row=$list->$col_name;
					}
					$row[]=$send_row;
				}
				
                $data[] = $row;
            }
            $output = [
                "draw" => $request->getPost('draw'),
                "recordsTotal" => $datamodel->count_all(),
                "recordsFiltered" => $datamodel->count_filtered(),
                "data" => $data
            ];
            echo json_encode($output);
        }
	}

	public function data_perencana($sub=null,$sub2=null,$type=null)
	{
        $data_perencana_model = new Data_perencana_model();
		$list_sub=['data-perencana','data-tim-penilai'];
		$list_sub_summary=['summary-pusat','summary-daerah','summary-gabungan'];
		
		if (!in_array($sub,$list_sub)) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}else{
			$sub_title  = ucwords(str_replace("-"," ",$sub));
			$model_name = strtolower(str_replace("-","_",$sub));
		}
		
		$data['orig_title']     = $sub;
		$data['sub_title']      = $sub_title;
		$data['title']          = $sub_title;
		$data['param']          = $sub2;
		$data['model_name']     = $model_name;
		$data['model_init']     = 'Data_perencana_model';
		$data['init_datatable'] = true;
		$data['init_chart'] 	= true;
		
		if ($type==null) { //count all
			$send_type='count';
		}elseif ($type=='summary' ) { 
			$send_type='summary';
		}elseif ($type=='detail' ) { 
			$send_type='detail';

			$data['model']                  = 'Data_perencana';
			$data['method']                 = 'get_perencana_'.$model_name;
			$data['method_param']           = $sub2;
			$data['method_type']            = $send_type;
			$data['init_global_dttable_js'] = true;

		}
		if ($send_type!='detail') {
			$data[$send_type][$model_name]['pusat']    = $data_perencana_model->{'get_perencana_'.$model_name}('pusat',$send_type);
			$data[$send_type][$model_name]['daerah']   = $data_perencana_model->{'get_perencana_'.$model_name}('daerah',$send_type);
			$data[$send_type][$model_name]['gabungan'] = $data_perencana_model->{'get_perencana_'.$model_name}('gabungan',$send_type);
		}else{
			$data[$send_type][$model_name][$sub2]	=$data_perencana_model->{'get_perencana_'.$model_name}($sub2,$send_type);
		}
		
		
      
		return view('fe/template/header',$data)
		.view('fe/data_perencana_'.$send_type,$data)
		.view('fe/template/footer',$data);
	}

	public function data_administratif_biodata_narasumber() 
	{
        $data_administratif_model = new Data_administratif_model();
		
		
		$data['title']                  = 'Biodata Narasumber';
		$data['model_init']             = 'Data_administratif_model';
		$data['init_datatable']         = true;
		$data['model']                  = 'data_administratif';
		$data['method']                 = 'get_administratif_data_biodata_narasumber';
		$data['method_param']           = 'biodata_narasumber';
		$data['method_type']            = 'detail';
		$data['init_global_dttable_js'] = true;
		
      
		return view('fe/template/header',$data)
		.view('fe/data_administratif_narasumber',$data)
		.view('fe/template/footer',$data);
	}
	
	public function detail_pegawai($id) {
		$data_administratif_model 	= new Data_administratif_model();
		$data_pegawai_detai			= $data_administratif_model->get_detail_pegawai($id);
		echo json_encode($data_pegawai_detai);
	}

	
	public function data_administratif_kegiatan() 
	{
        $data_administratif_model = new Data_administratif_model();
		
		
		$data['title']                  = 'Data Kegiatan';
		$data['model_init']             = 'Data_administratif_model';
		$data['init_datatable']         = true;
		$data['model']                  = 'data_administratif';
		$data['method']                 = 'get_administratif_kegiatan';
		$data['method_param']           = 'data_kegiatan';
		$data['method_type']            = 'detail';
		$data['init_global_dttable_js'] = true;
	
		return view('fe/template/header',$data)
		.view('fe/data_administratif_kegiatan',$data)
		.view('fe/template/footer',$data);
	}

	public function detail_kegiatan($id) {
		$data_administratif_model 	= new Data_administratif_model();
		$data_kegiatan_detail		= $data_administratif_model->get_detail_kegiatan($id);
		echo json_encode($data_kegiatan_detail);
	}

	public function data_administratif_lkj() 
	{
        $data_administratif_model = new Data_administratif_model();
		
		
		$data['title']                  = 'Data LKJ';
		$data['model_init']             = 'Data_administratif_model';
		$data['init_datatable']         = true;
		$data['model']                  = 'data_administratif';
		$data['method']                 = 'get_administratif_data_biodata_narasumber';
		$data['method_param']           = 'biodata_narasumber';
		$data['method_type']            = 'detail';
		$data['init_global_dttable_js'] = true;
		
      
		return view('fe/template/header',$data)
		.view('fe/data_administratif_lkj',$data)
		.view('fe/template/footer',$data);
	}
}
