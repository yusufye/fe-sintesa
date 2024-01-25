<?php 
        $data_summary_pusat=$summary[$model_name]['pusat'];
        $data_summary_daerah=$summary[$model_name]['daerah'];
        $data_summary_gabungan=$summary[$model_name]['gabungan'];
?>
<section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="d-flex justify-content-end pb-4">
                    <a class="btn btn-secondary btn-sm" alt="Print Page" onclick="window.print();"><i class="fa fa-print"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <!-- <a class="nav-link active" id="pusat" data-toggle="tab" href="#home" role="tab" aria-controls="pusat" aria-selected="true">pusat</a> -->
                <button class="nav-link <?php echo ($param=='pusat'?'active':'')?>" id="nav-pusat-tab"
                    data-bs-toggle="tab" data-bs-target="#nav-pusat" type="button" role="tab" aria-controls="nav-pusat"
                    aria-selected="false">Pusat</button>
            </li>
            <li class="nav-item">
                <!-- <a class="nav-link" id="pelatijan" data-toggle="tab" href="#daerah" role="tab" aria-controls="daerah" aria-selected="true">daerah</a> -->
                <button class="nav-link <?php echo ($param=='daerah'?'active':'')?>" id="nav-daerah-tab"
                    data-bs-toggle="tab" data-bs-target="#nav-daerah" type="button" role="tab"
                    aria-controls="nav-daerah" aria-selected="false">Daerah</button>
            </li>
            <li class="nav-item">
                <!-- <a class="nav-link" id="gabungan" data-toggle="tab" href="#gabungan" role="tab" aria-controls="gabungan" aria-selected="true">Gabungan</a> -->
                <button class="nav-link <?php echo ($param=='gabungan'?'active':'')?>" id="nav-gabungan-tab"
                    data-bs-toggle="tab" data-bs-target="#nav-gabungan" type="button" role="tab"
                    aria-controls="nav-gabungan" aria-selected="false">Gabungan</button>

            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane <?php echo ($param=='pusat'?'active':'')?>" id="nav-pusat" role="tabpanel"
                aria-labelledby="nav-pusat-tab">
                <div class="row">


                    <div class="d-flex justify-content-end py-4">
                        <a href='<?php echo base_url()."data-perencana/$orig_title/pusat/detail" ?>'
                            class="btn btn-primary">Info
                            Detail <i class="fa-regular fa-circle-right"></i></a>
                    </div>
                    <table id="tableCountPusat" class="table table-striped">
                        <?php
                        $group_pusat=array();
                        if ($data_summary_pusat!=null) {
                            echo "<thead class='table-primary'>";
                            foreach ($data_summary_pusat as $key => $value) {
                            
                                if ($key==0) {
                                    $define_col=0;
                                    echo "<tr>";
                                    foreach (array_keys($value) as $field) {
                                        ${"col_".$define_col}=$field;
                                        $define_col+=1;
                                        echo "<th>".ucfirst($field)."</th>";
                                    }
                                    echo "</tr></thead></tbody>";
                                }

                                echo "<tr>";
                                $define_row=0;
                                foreach ($value as $key_row=>$row) {
                                    $get_param=[];
                                    $set_attr_col=${"col_".$define_row};

                                    if ($define_row>0) {
                                        
                                        if (!empty($set_attr_col) && $set_attr_col<>'total') {
                                            $get_param[]=array('jabatan'=>$set_attr_col);
                                        }
                                        if (!empty($set_attr_row)) {
                                            $get_param[]=array('program'=>$set_attr_row);
                                        }

                                        $send_get_param=(!empty($get_param))?'?data='.base64_encode(json_encode($get_param)):'';

                                        $url=base_url().'data-perencana/'.$orig_title.'/pusat/detail'.$send_get_param;
                                        echo "<td>".(is_null($row) || $row==''?'-':($row>0?'<a target="_blank" href="'.$url.'">'.$row.'</a> ':$row))."</td>";
                                    }else{
                                        echo "<td>".(is_null($row) || $row==''?'-':$row)."</td>";
                                        $set_attr_row=$row;
                                    }
                                    $define_row+=1;

                                    
                                    $group_pusat[$key_row][]=$row;
                                }
                                echo "</tr>";
                            }
                            echo "</tbody>";
                        }else{
                            echo "<thead class='table-primary'>";
                            echo "<tr><th>Data Not Found</th></tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            echo "</tbody>";;
                        }


                    ?>
                    </table>
                </div>
                <div class="row">
                    <div class="col col-md-6">
                        <?php button_chart_export('chartRadarCountPusat'); ?>
                        <canvas id="chartRadarCountPusat"></canvas>
                    </div>
                    <div class="col col-md-6">
                        <?php button_chart_export('chartAreaCountPusat'); ?>
                        <canvas id="chartAreaCountPusat"></canvas>
                    </div>
                </div>

            </div>

            <div class="tab-pane <?php echo ($param=='daerah'?'active':'')?>" id="nav-daerah" role="tabpanel"
                aria-labelledby="nav-daerah-tab">
                <div class="row">
                    <div class="d-flex justify-content-end py-4">
                        <a href='<?php echo base_url()."data-perencana/$orig_title/daerah/detail" ?>'
                            class="btn btn-primary">Info
                            Detail <i class="fa-regular fa-circle-right"></i></a>
                    </div>

                    <table id="tableCountDaerah" class="table table-striped">
                    <?php
                        $group_daerah=array();
                        if ($data_summary_daerah!=null) {
                            echo "<thead class='table-primary'>";
                            foreach ($data_summary_daerah as $key => $value) {
                            
                                if ($key==0) {
                                    $define_col=0;
                                    echo "<tr>";
                                    foreach (array_keys($value) as $field) {
                                        ${"col_".$define_col}=$field;
                                        $define_col+=1;
                                        echo "<th>".ucfirst($field)."</th>";
                                    }
                                    echo "</tr></thead></tbody>";
                                }

                                echo "<tr>";
                                $define_row=0;
                                foreach ($value as $key_row=>$row) {
                                    $set_attr_col=${"col_".$define_row};

                                    if ($define_row>0) {
                                        $get_param=[];
                                        if (!empty($set_attr_col) && $set_attr_col<>'total') {
                                            $get_param[]=array('jabatan'=>$set_attr_col);
                                        }
                                        if (!empty($set_attr_row)) {
                                            $get_param[]=array('program'=>$set_attr_row);
                                        }

                                        $send_get_param=(!empty($get_param))?'?data='.base64_encode(json_encode($get_param)):'';

                                        $url=base_url().'data-perencana/'.$orig_title.'/daerah/detail'.$send_get_param;
                                        echo "<td>".(is_null($row) || $row==''?'-':($row>0?'<a target="_blank" href="'.$url.'">'.$row.'</a> ':$row))."</td>";
                                    }else{
                                        echo "<td>".(is_null($row) || $row==''?'-':$row)."</td>";
                                        $set_attr_row=$row;
                                    }
                                    $define_row+=1;

                                    
                                    $group_daerah[$key_row][]=$row;
                                }
                                echo "</tr>";
                            }
                            echo "</tbody>";
                        }else{
                            echo "<thead class='table-primary'>";
                            echo "<tr><th>Data Not Found</th></tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            echo "</tbody>";;
                        }


                    ?>

                    </table>
                </div>
                <div class="row">

                    <div class="col col-md-6">
                        <?php button_chart_export('chartRadarCountDaerah'); ?>
                        <canvas id="chartRadarCountDaerah"></canvas>
                    </div>
                    <div class="col col-md-6">
                        <?php button_chart_export('chartAreaCountDaerah'); ?>
                        <canvas id="chartAreaCountDaerah"></canvas>
                    </div>
                </div>

            </div>
            <div class="tab-pane <?php echo ($param=='gabungan'?'active':'')?>" id="nav-gabungan" role="tabpanel"
                aria-labelledby="nav-gabungan-tab">
                <div class="row">
                    <div class="d-flex justify-content-end py-4">
                        <a href='<?php echo base_url()."data-perencana/$orig_title/gabungan/detail" ?>' class="btn btn-primary">Info Detail <i class="fa-regular fa-circle-right"></i></a>
                    </div>

                    <table id="tableCountGabungan" class="table table-striped">
                    <?php
                        $group_gabungan=array();
                        if ($data_summary_gabungan!=null) {
                            echo "<thead class='table-primary'>";
                            foreach ($data_summary_gabungan as $key => $value) {
                            
                                if ($key==0) {
                                    $define_col=0;
                                    echo "<tr>";
                                    foreach (array_keys($value) as $field) {
                                        ${"col_".$define_col}=$field;
                                        $define_col+=1;
                                        echo "<th>".ucfirst($field)."</th>";
                                    }
                                    echo "</tr></thead></tbody>";
                                }

                                echo "<tr>";
                                $define_row=0;
                                foreach ($value as $key_row=>$row) {
                                    $set_attr_col=${"col_".$define_row};

                                    if ($define_row>0) {
                                        $get_param=[];
                                        if (!empty($set_attr_col) && $set_attr_col<>'total') {
                                            $get_param[]=array('jabatan'=>$set_attr_col);
                                        }
                                        if (!empty($set_attr_row)) {
                                            $get_param[]=array('program'=>$set_attr_row);
                                        }

                                        $send_get_param=(!empty($get_param))?'?data='.base64_encode(json_encode($get_param)):'';

                                        $url=base_url().'data-perencana/'.$orig_title.'/gabungan/detail'.$send_get_param;
                                        echo "<td>".(is_null($row) || $row==''?'-':'<a target="_blank" href="'.$url.'">'.$row.'</a> ')."</td>";
                                    }else{
                                        echo "<td>".(is_null($row) || $row==''?'-':$row)."</td>";
                                        $set_attr_row=$row;
                                    }
                                    $define_row+=1;

                                    
                                    $group_gabungan[$key_row][]=$row;
                                }
                                echo "</tr>";
                            }
                            echo "</tbody>";
                        }else{
                            echo "<thead class='table-primary'>";
                            echo "<tr><th>Data Not Found</th></tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            echo "</tbody>";;
                        }


                    ?>

                    </table>

                </div>


                <div class="row">

                    <div class="col col-md-6">
                        <?php button_chart_export('chartRadarCountGabungan'); ?>
                        <canvas id="chartRadarCountGabungan"></canvas>
                    </div>

                    <div class="col col-md-6">
                        <?php button_chart_export('chartAreaCountGabungan'); ?>
                        <canvas id="chartAreaCountGabungan"></canvas>
                    </div>
                </div>

            </div>
        </div>

    </div>
    </div>
</section>

<script>
<?php 
        $chart_data_pusat=array();
        if (!empty($group_pusat)) {
            
            foreach ($group_pusat as $key => $value) {
                if ($key=='Program') {
                    $chart_data_pusat['label']=$value;
                }
                if (!in_array($key,array('Program','total'))) {
                    $chart_data_pusat['dataset'][]=array(
                    'label'                     => strval($key),
                    'data'                      => $value,
                    'backgroundColor'           => 'rgba('.rand(0,255).','.rand(0,255).', '.rand(0,255).', 0.2)',
                    'borderColor'               => 'rgb('.rand(0,255).', '.rand(0,255).', '.rand(0,255).')',
                    'fill'                      => true
                );
                }
            }
        }

        $chart_data_daerah=array();
        if (!empty($group_daerah)) {
            
            foreach ($group_daerah as $key => $value) {
                if ($key=='Program') {
                    $chart_data_daerah['label']=$value;
                }
                if (!in_array($key,array('Program','total'))) {
                    $chart_data_daerah['dataset'][]=array(
                    'label'                     => strval($key),
                    'data'                      => $value,
                    'backgroundColor'           => 'rgba('.rand(0,255).','.rand(0,255).', '.rand(0,255).', 0.2)',
                    'borderColor'               => 'rgb('.rand(0,255).', '.rand(0,255).', '.rand(0,255).')',
                    'fill'                      => true
                );
                }
            }
        }

        $chart_data_gabungan=array();
        if (!empty($group_gabungan)) {
            
            foreach ($group_gabungan as $key => $value) {
                if ($key=='Program') {
                    $chart_data_gabungan['label']=$value;
                }
                if (!in_array($key,array('Program','total'))) {
                    $chart_data_gabungan['dataset'][]=array(
                    'label'                     => strval($key),
                    'data'                      => $value,
                    'backgroundColor'           => 'rgba('.rand(0,255).','.rand(0,255).', '.rand(0,255).', 0.2)',
                    'borderColor'               => 'rgb('.rand(0,255).', '.rand(0,255).', '.rand(0,255).')',
                    'fill'                      => true
                );
                }
            }
        }
   ?>
var datasetPusat = <?php echo json_encode($chart_data_pusat) ?>;
var datasetDaerah = <?php echo json_encode($chart_data_daerah) ?>;
var datasetGabungan = <?php echo json_encode($chart_data_gabungan) ?>;
</script>