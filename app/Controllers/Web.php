<?php

namespace App\Controllers;
use App\Models\Data_diklat_model;
use App\Models\Data_perencana_model;
use App\Models\Data_administratif_model;
use App\Models\Publikasi_model;
use App\Models\Model_datatable;
use Config\Services;
class Web extends BaseController
{
    
    public function index()
    {
		$data['menu_title']   			= 'Home';
        return view('fe/template/header',$data)
        .view('fe/home')
        .view('fe/template/footer');
    }

    
	public function data_diklat($sub=null,$sub2=null,$type=null)
	{
		$request           = Services::request();
		$filtersGET	   	   = $request->getGet();
		
		$data_diklat_model = new Data_diklat_model();
		$list_sub=['data-pelamar','data-penempatan','data-alumni'];
		$list_sub_summary=['summary-pendidikan','summary-pelatihan','summary-gabungan'];
		
		if (!in_array($sub,$list_sub)) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}else{
			$sub_title  = ucwords(str_replace("-"," ",$sub));
			$model_name = strtolower(str_replace("-","_",$sub));
		}
		
		$data['menu_title']   	= 'Data Diklat';
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
			if (!session('login')) {
				return redirect()->to(base_url('/login'));
			}
		}elseif ($type=='detail' ) { 
			if (!session('login')) {
				return redirect()->to(base_url('/login'));
			}
			$send_type='detail';

			$data['model']                  = 'Data_diklat';
			$data['method']                 = 'get_diklat_'.$model_name;
			$data['method_param']           = $sub2;
			$data['method_type']            = $send_type;
			$data['init_global_dttable_js'] = true;
			$data['list_instansi'] 			= $data_diklat_model->get_list_instansi($sub);
			$data['list_periode']	 		= $data_diklat_model->get_list_periode($sub);
			$data['list_program']	 		= $data_diklat_model->get_list_program($sub);
			$data['filtersGET']		 		= $filtersGET;

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

	public function get_chart_diklat_detail() {
		$request              = Services::request();
		$data_diklat_model 	  = new Data_diklat_model();

		$param                = $request->getPost('param');
		$type                 = $request->getPost('type');
		$filters              = $request->getPost('filters');

		$chart_data_gender           = $data_diklat_model->get_chart_diklat_detail($param,$type,'gender',$filters);	
		$chart_data_period           = $data_diklat_model->get_chart_diklat_detail($param,$type,'tahun',$filters);
		
		$chart_data=array();
		if ($chart_data_gender!=null) {
			
			$chart_data['gender']['bar']['label'][]=['Gender'];
			$pie_group_gender=array();
			foreach ($chart_data_gender as $key => $value) {
				$pie_group_gender['gender'][]=$value['gender'];
				$pie_group_gender['jumlah'][]=$value['jumlah'];
				$pie_group_gender['pie_color'][]='rgba('.rand(0,255).','.rand(0,255).', '.rand(0,255).', 0.2)';
				$pie_group_gender['border_color'][]='rgba('.rand(0,255).','.rand(0,255).', '.rand(0,255).', 0.2)';


				$chart_data['gender']['bar']['dataset'][]=array(
					'label'                     => $value['gender'],
					'data'                      => [$value['jumlah']],
					'backgroundColor'           => 'rgba('.rand(0,255).','.rand(0,255).', '.rand(0,255).', 0.2)',
					'borderColor'               => 'rgb('.rand(0,255).', '.rand(0,255).', '.rand(0,255).')',
					'fill'                      => true
				);
			}

			$chart_data['gender']['pie']['label']=$pie_group_gender['gender'];
			$chart_data['gender']['pie']['dataset'][]=array(
				// 'label'                     => $pie_group_gender['gender'],
				'data'                      => $pie_group_gender['jumlah'],
				'backgroundColor'           => $pie_group_gender['pie_color'],
				'borderColor'               => $pie_group_gender['border_color'],
				'fill'                      => true
			);

		}

		if ($chart_data_period!=null) {
			
			$chart_data['period']['label'][]=['Periode'];
			$chart_data['table_period']='<table id="ChartTabularPeriode" class="table table-bordered"> <thead class="table-primary"> <tr> <td>Periode</td> <td>Jumlah</td> </tr></thead>';

			$pie_group_period=array();
			foreach ($chart_data_period as $key => $value) {

				$pie_group_period['tahun'][]=$value['tahun'];
				$pie_group_period['jumlah'][]=$value['jumlah'];
				$pie_group_period['pie_color'][]='rgba('.rand(0,255).','.rand(0,255).', '.rand(0,255).', 0.2)';
				$pie_group_period['border_color'][]='rgba('.rand(0,255).','.rand(0,255).', '.rand(0,255).', 0.2)';

				$chart_data['period']['dataset'][]=array(
					'label'                     => $value['tahun'],
					'data'                      => [$value['jumlah']],
					'backgroundColor'           => 'rgba('.rand(0,255).','.rand(0,255).', '.rand(0,255).', 0.2)',
					'borderColor'               => 'rgb('.rand(0,255).', '.rand(0,255).', '.rand(0,255).')',
					'fill'                      => true
				);

				$chart_data['table_period'].="<tr><td>".$value['tahun']."</td><td>".$value['jumlah']."</td></tr>";
			}
			$chart_data['table_period'].='</table>';
			
			$chart_data['period']['pie']['label']=$pie_group_period['tahun'];
			$chart_data['period']['pie']['dataset'][]=array(
				// 'label'                     => $pie_group_period['period'],
				'data'                      => $pie_group_period['jumlah'],
				'backgroundColor'           => $pie_group_period['pie_color'],
				'borderColor'               => $pie_group_period['border_color'],
				'fill'                      => true
			);
		
		}
		
		echo json_encode($chart_data);
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
				$datatable['column_search'],
				$datatable['query_where']??[]
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
		$request           = Services::request();
		$filtersGET	   	   = $request->getGet();

        $data_perencana_model = new Data_perencana_model();
		$list_sub=['data-perencana','data-tim-penilai'];
		$list_sub_summary=['summary-pusat','summary-daerah','summary-gabungan'];
		
		if (!in_array($sub,$list_sub)) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}else{
			$sub_title  = ucwords(str_replace("-"," ",$sub));
			$model_name = strtolower(str_replace("-","_",$sub));
		}
		
		$data['menu_title']   	= 'Data Perencana';
		$data['orig_title']     = $sub;
		$data['sub_title']      = $sub_title;
		$data['title']          = $sub_title;
		$data['param']          = $sub2;
		$data['model_name']     = $model_name;
		$data['model_init']     = 'Data_perencana_model';
		$data['init_datatable'] = true;
		$data['init_chart'] 	= true;
		$data['filtersGET']		= $filtersGET;
		
		if ($type==null) { //count all
			$send_type='count';
		}elseif ($type=='summary' ) { 
			$send_type='summary';
			if (!session('login')) {
				return redirect()->to(base_url('/login'));
			}
		}elseif ($type=='detail' ) { 
			if (!session('login')) {
				return redirect()->to(base_url('/login'));
			}
			$send_type='detail';

			$data['model']                  = 'Data_perencana';
			$data['method']                 = 'get_perencana_'.$model_name;
			$data['method_param']           = $sub2;
			$data['method_type']            = $send_type;
			$data['init_global_dttable_js'] = true;
			$data['list_golongan'] 			= $data_perencana_model->get_list_golongan();
			$data['list_instansi'] 			= $data_perencana_model->get_list_instansi();
			$data['list_unit_kerja'] 		= $data_perencana_model->get_list_unit_kerja();
			$data['list_jabatan']	 		= $data_perencana_model->get_list_jabatan();
			$data['list_periode']	 		= $data_perencana_model->get_list_periode();

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
		if (!session('login')) {
			return redirect()->to(base_url('/login'));
		}
        $data_administratif_model = new Data_administratif_model();
		
		$data['menu_title']   			= 'Data Administratif';
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
		if (!session('login')) {
			return redirect()->to(base_url('/login'));
		}

        $data_administratif_model = new Data_administratif_model();
		
		$data['menu_title']   			= 'Data Administratif';
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
		if (!session('login')) {
			return redirect()->to(base_url('/login'));
		}

        $data_administratif_model = new Data_administratif_model();
		
		$data['menu_title']   			= 'Data Administratif';
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

	public function get_chart_perencana_detail() {
		$request              = Services::request();
		$data_perencana_model = new Data_perencana_model();

		$param                = $request->getPost('param');
		$type                 = $request->getPost('type');
		$filters              = $request->getPost('filters');

		$chart_data_gender           = $data_perencana_model->get_chart_perencana_detail($param,$type,'gender',$filters);
		
			
		$chart_data_period           = $data_perencana_model->get_chart_perencana_detail($param,$type,'periode',$filters);
		
			
		$chart_data=array();
		if ($chart_data_gender!=null) {
			
			$chart_data['gender']['bar']['label'][]=['Gender'];
			$pie_group_gender=array();
			foreach ($chart_data_gender as $key => $value) {
				$pie_group_gender['gender'][]=$value['gender'];
				$pie_group_gender['jumlah'][]=$value['jumlah'];
				$pie_group_gender['pie_color'][]='rgba('.rand(0,255).','.rand(0,255).', '.rand(0,255).', 0.2)';
				$pie_group_gender['border_color'][]='rgba('.rand(0,255).','.rand(0,255).', '.rand(0,255).', 0.2)';

				$chart_data['gender']['bar']['dataset'][]=array(
					'label'                     => $value['gender'],
					'data'                      => [$value['jumlah']],
					'backgroundColor'           => 'rgba('.rand(0,255).','.rand(0,255).', '.rand(0,255).', 0.2)',
					'borderColor'               => 'rgb('.rand(0,255).', '.rand(0,255).', '.rand(0,255).')',
					'fill'                      => true
				);
			}
			$chart_data['gender']['pie']['label']=$pie_group_gender['gender'];
			$chart_data['gender']['pie']['dataset'][]=array(
				// 'label'                     => $pie_group_gender['gender'],
				'data'                      => $pie_group_gender['jumlah'],
				'backgroundColor'           => $pie_group_gender['pie_color'],
				'borderColor'               => $pie_group_gender['border_color'],
				'fill'                      => true
			);
		}

		if ($chart_data_period!=null) {
			
			$chart_data['period']['label'][]=['Periode'];
			$chart_data['table_period']='<table id="ChartTabularPeriode" class="table table-bordered"> <thead class="table-primary"> <tr> <td>Periode</td> <td>Jumlah</td> </tr></thead>';

			$pie_group_period=array();
			foreach ($chart_data_period as $key => $value) {

				$pie_group_period['tahun'][]=$value['periode'];
				$pie_group_period['jumlah'][]=$value['jumlah'];
				$pie_group_period['pie_color'][]='rgba('.rand(0,255).','.rand(0,255).', '.rand(0,255).', 0.2)';
				$pie_group_period['border_color'][]='rgba('.rand(0,255).','.rand(0,255).', '.rand(0,255).', 0.2)';

				$chart_data['period']['dataset'][]=array(
					'label'                     => $value['periode'],
					'data'                      => [$value['jumlah']],
					'backgroundColor'           => 'rgba('.rand(0,255).','.rand(0,255).', '.rand(0,255).', 0.2)',
					'borderColor'               => 'rgb('.rand(0,255).', '.rand(0,255).', '.rand(0,255).')',
					'fill'                      => true
				);

				$chart_data['table_period'].="<tr><td>".$value['periode']."</td><td>".$value['jumlah']."</td></tr>";
			}
			$chart_data['table_period'].='</table>';

			$chart_data['period']['pie']['label']=$pie_group_period['tahun'];
			$chart_data['period']['pie']['dataset'][]=array(
				// 'label'                     => $pie_group_period['period'],
				'data'                      => $pie_group_period['jumlah'],
				'backgroundColor'           => $pie_group_period['pie_color'],
				'borderColor'               => $pie_group_period['border_color'],
				'fill'                      => true
			);
		
		}
		
		echo json_encode($chart_data);
	}

	function data_administratif_kerjasama($sub2=null,$type=null) {
		if (!session('login')) {
			return redirect()->to(base_url('/login'));
		}
		$data_administratif_model = new Data_administratif_model();
		// $list_sub=['data-kerjasama'];
		

		// $sub_title  = ucwords(str_replace("-"," ",$sub));
		// 	$model_name = strtolower(str_replace("-","_",$sub));
		
		$data['menu_title']   	= 'data_administratif';
		$data['orig_title']     = 'data-kerjasama';
		$data['sub_title']      = 'Data Kerjasama';
		$data['title']          = 'Data Kerjasama';
		$data['param']          = $sub2;
		$data['model_name']     = 'data_kerjasama';
		$data['model_init']     = 'Data_administratif_model';
		$data['init_datatable'] = ($sub2<>'video')?true:false;
		$data['init_chart'] 	= false;

		
		if ($type==null) { //count all
			$send_type='count';
		}elseif ($type=='summary' ) { 
			$send_type='summary';
		}elseif ($type=='detail' ) { 
			if (!session('login')) {
				return redirect()->to(base_url('/login'));
			}
			$send_type='detail';

			$data['model']                  = 'data_administratif';
			$data['method']                 = 'get_data_administratif_kerjasama';
			$data['method_param']           = $sub2;
			$data['method_type']            = $send_type;
			$data['init_global_dttable_js'] = true;

		}
		
		
		
		if ($send_type!='detail') {
			$data[$send_type]['data_kerjasama']['prodi']		=$data_administratif_model->{'get_data_administratif_kerjasama'}('prodi',$send_type);
			$data[$send_type]['data_kerjasama']['pusat']	=$data_administratif_model->{'get_data_administratif_kerjasama'}('pusat',$send_type);
			$data[$send_type]['data_kerjasama']['daerah']	=$data_administratif_model->{'get_data_administratif_kerjasama'}('daerah',$send_type);
		}else{
			$data[$send_type]['data_kerjasama'][$sub2]		=$data_administratif_model->{'get_data_administratif_kerjasama'}($sub2,$send_type);
		}
		return view('fe/template/header',$data)
		.view('fe/data_administratif_kerjasama_'.$send_type,$data)
		.view('fe/template/footer',$data);
	}

	public function publikasi($sub=null,$sub2=null,$type=null)
	{
        $publikasi_model = new Publikasi_model();
		$list_sub=['kebijakan-diklat','kebijakan-jfp','kebijakan-umum','kurikulum-pelatihan'];
		$list_sub_summary=['video','paparan'];
		
		if (!in_array($sub,$list_sub)) {
			throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
		}else{
			$sub_title  = ucwords(str_replace("-"," ",$sub));
			$model_name = strtolower(str_replace("-","_",$sub));
		}
		
		$data['menu_title']   	= 'Publikasi';
		$data['orig_title']     = $sub;
		$data['sub_title']      = $sub_title;
		$data['title']          = $sub_title;
		$data['param']          = $sub2;
		$data['model_name']     = $model_name;
		$data['model_init']     = 'Publikasi_model';
		$data['init_datatable'] = ($sub2<>'video')?true:false;
		$data['init_chart'] 	= false;

		if ($sub=='kurikulum-pelatihan') {
			return view('fe/template/header',$data)
			.view('fe/kurikulum-pelatihan',$data)
			.view('fe/template/footer',$data);
		}
		
		if ($type==null) { //count all
			$send_type='count';
		}elseif ($type=='summary' ) { 
			$send_type='summary';
		}elseif ($type=='detail' ) { 
			$send_type='detail';

			$data['model']                  = 'Publikasi';
			$data['method']                 = 'get_publikasi_'.$model_name;
			$data['method_param']           = $sub2;
			$data['method_type']            = $send_type;
			$data['init_global_dttable_js'] = true;

		}
		
		
		
		if ($send_type!='detail') {
			$data[$send_type][$model_name]['video']		=$publikasi_model->{'get_publikasi_'.$model_name}('video',$send_type);
			$data[$send_type][$model_name]['paparan']	=$publikasi_model->{'get_publikasi_'.$model_name}('paparan',$send_type);
		}else{
			$data[$send_type][$model_name][$sub2]		=$publikasi_model->{'get_publikasi_'.$model_name}($sub2,$send_type);
		}
		return view('fe/template/header',$data)
		.view('fe/publikasi_'.$send_type,$data)
		.view('fe/template/footer',$data);
	}

	public function detail_publikasi($id) {
		$data_publikasi_model 		= new Publikasi_model();
		$data_publikasi_detai		= $data_publikasi_model->get_detail_publikasi($id);
		echo json_encode($data_publikasi_detai);
	}
	
}
