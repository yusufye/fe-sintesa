<?php 
        $data_summary_pendidikan=$summary[$model_name]['pendidikan'];
        $data_summary_pelatihan=$summary[$model_name]['pelatihan'];
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
                <!-- <a class="nav-link active" id="pendidikan" data-toggle="tab" href="#home" role="tab" aria-controls="pendidikan" aria-selected="true">Pendidikan</a> -->
                <button class="nav-link <?php echo ($param=='pendidikan'?'active':'')?>" id="nav-pendidikan-tab"
                    data-bs-toggle="tab" data-bs-target="#nav-pendidikan" type="button" role="tab"
                    aria-controls="nav-pendidikan" aria-selected="false">Pendidikan</button>
            </li>
            <li class="nav-item">
                <!-- <a class="nav-link" id="pelatijan" data-toggle="tab" href="#pelatihan" role="tab" aria-controls="pelatihan" aria-selected="true">Pelatihan</a> -->
                <button class="nav-link <?php echo ($param=='pelatihan'?'active':'')?>" id="nav-pelatihan-tab"
                    data-bs-toggle="tab" data-bs-target="#nav-pelatihan" type="button" role="tab"
                    aria-controls="nav-pelatihan" aria-selected="false">Pelatihan</button>
            </li>
            <li class="nav-item">
                <!-- <a class="nav-link" id="gabungan" data-toggle="tab" href="#gabungan" role="tab" aria-controls="gabungan" aria-selected="true">Gabungan</a> -->
                <button class="nav-link <?php echo ($param=='gabungan'?'active':'')?>" id="nav-gabungan-tab"
                    data-bs-toggle="tab" data-bs-target="#nav-gabungan" type="button" role="tab"
                    aria-controls="nav-gabungan" aria-selected="false">Gabungan</button>

            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane <?php echo ($param=='pendidikan'?'active':'')?>" id="nav-pendidikan" role="tabpanel"
                aria-labelledby="nav-pendidikan-tab">
                <div class="row">


                    <div class="d-flex justify-content-end py-4">
                        <a href='<?php echo "/data-diklat/$orig_title/pendidikan/detail" ?>'
                            class="btn btn-primary">Info
                            Detail <i class="fa-regular fa-circle-right"></i></a>
                    </div>
                    <div class='table-responsive'>

                        <table id="tableCountPendidikan" class="table table-striped table-responsive">
                            <?php
                        $group_pendidikan=array();
                        if ($data_summary_pendidikan!=null) {
                            echo "<thead class='table-primary'>";
                            foreach ($data_summary_pendidikan as $key => $value) {
                                
                                if ($key==0) {
                                    echo "<tr>";
                                    $define_col=0;
                                    foreach (array_keys($value) as $field) {
                                        
                                        if (is_numeric($field)) {
                                            if ($field<0) {
                                                $field="<".((int)date('Y')-4);
                                            }elseif ($field==0) {
                                                $field=date('Y');
                                            }elseif ($field==1) {
                                                $field=date('Y')-1;
                                            }elseif ($field==2) {
                                                $field=date('Y')-2;
                                            }elseif ($field==3) {
                                                $field=date('Y')-3;
                                            }elseif ($field==4) {
                                                $field=date('Y')-4;
                                            }elseif ($field==5) {
                                                $field=date('Y')-5;
                                            }
                                        }
                                        
                                        ${"col_".$define_col}=$field;
                                        $define_col+=1;
                                        echo "<th>$field</th>";
                                    }
                                    echo "</tr></thead><tbody>";
                                }

                                echo "<tr>";
                                $define_row=0;
                                
                                foreach ($value as $key_row=>$row) {
                                    
                                    if($define_row==$define_col){
                                        

                                    }
                                    $define_operator='';
                                    $set_attr_col=${"col_".$define_row};
                                    if (!is_numeric(substr($set_attr_col,0,1)) && is_numeric(substr($set_attr_col,1,1))) {
                                        $define_operator='less_than';
                                        $set_attr_col=ltrim($set_attr_col,substr($set_attr_col,0,1));
                                    }
                                    
                                    if ($define_row>0) {
                                        $get_param=[];
                                        if (!empty($set_attr_col)) {
                                            if (is_numeric($set_attr_col)) {
                                                $get_param[]='tahun='.$set_attr_col;
                                            }
                                        }
                                        if (!empty($set_attr_row)) {
                                            $get_param[]='kode_program='.$set_attr_row;
                                        }
                                        if (!empty($define_operator)) {
                                            $get_param[]='operator_tahun='.urlencode($define_operator);
                                        }

                                        $send_get_param=(!empty($get_param))?'?'.join("&",$get_param):'';

                                        $url='/data-diklat/'.$orig_title.'/pendidikan/detail'.$send_get_param;
                                        echo "<td>".(is_null($row) || $row==''?'-':'<a target="_blank" href="'.$url.'">'.$row.'</a> ')."</td>";
                                    }else{
                                        echo "<td>".(is_null($row) || $row==''?'-':$row)."</td>";
                                        $set_attr_row=$row;
                                    }
                                    $define_row+=1;
                                    $group_pendidikan[$key_row][]=$row;
                                }
                                echo "</tr>";
                            }
                            echo "</tbody>";
                        }else{
                            echo "<thead class='table-primary'>";
                            echo "<tr><th>Data Not Found</th></tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            echo "</tbody>";
                        }


                    ?>
                        </table>
                    </div>
                </div>
                <div class="row" id="reportPage">
                    <div class="col col-md-6">
                        <?php button_chart_export('chartRadarCountPendidikan'); ?>
                        <canvas id="chartRadarCountPendidikan"></canvas>
                    </div>
                    <div class="col col-md-6">
                        <?php button_chart_export('chartAreaCountPendidikan'); ?>
                        <canvas id="chartAreaCountPendidikan"></canvas>
                    </div>
                </div>

            </div>

            <div class="tab-pane <?php echo ($param=='pelatihan'?'active':'')?>" id="nav-pelatihan" role="tabpanel"
                aria-labelledby="nav-pelatihan-tab">
                <div class="row">
                    <div class="d-flex justify-content-end py-4">
                        <a href='<?php echo "/data-diklat/$orig_title/pelatihan/detail" ?>' class="btn btn-primary">Info
                            Detail <i class="fa-regular fa-circle-right"></i></a>
                    </div>

                    <div class='table-responsive'>
                        <table id="tableCountPelatihan" class="table table-striped">
                            <?php
                        if ($data_summary_pelatihan!=null) {
                            $group_pelatihan[$key_row][]=$row;
                            echo "<thead class='table-primary'>";
                            foreach ($data_summary_pelatihan as $key => $value) {
                            
                                if ($key==0) {
                                    echo "<tr>";
                                    $define_col_pelatihan=0;
                                    foreach (array_keys($value) as $field) {
                                        if (is_numeric($field)) {
                                            if ($field<0) {
                                                $field="<".((int)date('Y')-4);
                                            }elseif ($field==0) {
                                                $field=date('Y');
                                            }elseif ($field==1) {
                                                $field=date('Y')-1;
                                            }elseif ($field==2) {
                                                $field=date('Y')-2;
                                            }elseif ($field==3) {
                                                $field=date('Y')-3;
                                            }elseif ($field==4) {
                                                $field=date('Y')-4;
                                            }elseif ($field==5) {
                                                $field=date('Y')-5;
                                            }
                                        }

                                        ${"col_".$define_col_pelatihan}=$field;
                                        $define_col_pelatihan+=1;
                                        echo "<th>$field</th>";
                                    }
                                    echo "</tr></thead><tbody>";
                                }

                                echo "<tr>";
                                $define_row_pelatihan=0;

                                foreach ($value as $key_row=>$row) {
                                    
                                    if($define_row_pelatihan==$define_col_pelatihan){
                                        

                                    }
                                    $define_operator_pelatihan='';
                                    $set_attr_col=${"col_".$define_row_pelatihan};
                                    if (!is_numeric(substr($set_attr_col,0,1)) && is_numeric(substr($set_attr_col,1,1))) {
                                        $define_operator_pelatihan='less_than';
                                        $set_attr_col=ltrim($set_attr_col,substr($set_attr_col,0,1));
                                    }
                                    
                                    if ($define_row_pelatihan>0) {
                                        $get_param=[];
                                        if (!empty($set_attr_col)) {
                                            if (is_numeric($set_attr_col)) {
                                                $get_param[]='tahun='.$set_attr_col;
                                            }
                                        }
                                        if (!empty($set_attr_row)) {
                                            $get_param[]='kode_program='.$set_attr_row;
                                        }
                                        if (!empty($define_operator_pelatihan)) {
                                            $get_param[]='operator_tahun='.urlencode($define_operator_pelatihan);
                                        }

                                        $send_get_param=(!empty($get_param))?'?'.join("&",$get_param):'';

                                        $url='/data-diklat/'.$orig_title.'/pelatihan/detail'.$send_get_param;
                                        echo "<td>".(is_null($row) || $row==''?'-':'<a target="_blank" href="'.$url.'">'.$row.'</a> ')."</td>";
                                    }else{
                                        echo "<td>".(is_null($row) || $row==''?'-':$row)."</td>";
                                        $set_attr_row=$row;
                                    }
                                    $define_row_pelatihan+=1;
                                    $group_pelatihan[$key_row][]=$row;
                                }
                                echo "</tr>";
                            }
                            echo "</tbody>";
                        }else{
                            echo "<thead class='table-primary'>";
                            echo "<tr><th>Data Not Found</th></tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            echo "</tbody>";
                        }


                    ?>

                        </table>
                    </div>
                </div>
                <div class="row">

                    <div class="col col-md-6">
                        <?php button_chart_export('chartRadarCountPelatihan'); ?>
                        <canvas id="chartRadarCountPelatihan"></canvas>
                    </div>
                    <div class="col col-md-6">
                        <?php button_chart_export('chartAreaCountPelatihan'); ?>
                        <canvas id="chartAreaCountPelatihan"></canvas>
                    </div>
                </div>

            </div>
            <div class="tab-pane <?php echo ($param=='gabungan'?'active':'')?>" id="nav-gabungan" role="tabpanel"
                aria-labelledby="nav-gabungan-tab">
                <div class="row">
                    <div class="d-flex justify-content-end py-4">
                        <a href='<?php echo "/data-diklat/$orig_title/gabungan/detail" ?>' class="btn btn-primary">Info
                            Detail <i class="fa-regular fa-circle-right"></i></a>
                    </div>
                    <div class='table-responsive'>
                        <table id="tableCountGabungan" class="table table-striped">
                            <?php
                        if ($data_summary_gabungan!=null) {
                            $group_gabungan[$key_row][]=$row;
                            echo "<thead class='table-primary'>";
                            foreach ($data_summary_gabungan as $key => $value) {
                                
                                if ($key==0) {
                                    echo "<tr>";
                                    $define_col_pelatihan=0;
                                    foreach (array_keys($value) as $field) {
                                        if (is_numeric($field)) {
                                            if ($field<0) {
                                                $field="<".((int)date('Y')-4);
                                            }elseif ($field==0) {
                                                $field=date('Y');
                                            }elseif ($field==1) {
                                                $field=date('Y')-1;
                                            }elseif ($field==2) {
                                                $field=date('Y')-2;
                                            }elseif ($field==3) {
                                                $field=date('Y')-3;
                                            }elseif ($field==4) {
                                                $field=date('Y')-4;
                                            }elseif ($field==5) {
                                                $field=date('Y')-5;
                                            }
                                        }

                                        ${"col_".$define_col_pelatihan}=$field;
                                        $define_col_pelatihan+=1;
                                        echo "<th>$field</th>";
                                    }
                                    echo "</tr></thead><tbody>";
                                }

                                
                                echo "<tr>";
                                $define_row_pelatihan=0;
                                foreach ($value as $key_row=>$row) {
                                    
                                    if($define_row_pelatihan==$define_col_pelatihan){
                                        

                                    }
                                    $define_operator_pelatihan='';
                                    $set_attr_col=${"col_".$define_row_pelatihan};
                                    if (!is_numeric(substr($set_attr_col,0,1)) && is_numeric(substr($set_attr_col,1,1))) {
                                        $define_operator_pelatihan='less_than';
                                        $set_attr_col=ltrim($set_attr_col,substr($set_attr_col,0,1));
                                    }
                                    
                                    if ($define_row_pelatihan>0) {
                                        $get_param=[];
                                        if (!empty($set_attr_col)) {
                                            if (is_numeric($set_attr_col)) {
                                                $get_param[]='tahun='.$set_attr_col;
                                            }
                                        }
                                        if (!empty($set_attr_row)) {
                                            $get_param[]='kode_program='.$set_attr_row;
                                        }
                                        if (!empty($define_operator_pelatihan)) {
                                            $get_param[]='operator_tahun='.urlencode($define_operator_pelatihan);
                                        }

                                        $send_get_param=(!empty($get_param))?'?'.join("&",$get_param):'';

                                        $url='/data-diklat/'.$orig_title.'/gabungan/detail'.$send_get_param;
                                        echo "<td>".(is_null($row) || $row==''?'-':'<a target="_blank" href="'.$url.'">'.$row.'</a> ')."</td>";
                                    }else{
                                        echo "<td>".(is_null($row) || $row==''?'-':$row)."</td>";
                                        $set_attr_row=$row;
                                    }
                                    $define_row_pelatihan+=1;
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
                            echo "</tbody>";
                            
                        }


                    ?>

                        </table>
                    </div>
                </div>


                <div class="row">

                    <div class="col col-md-6">
                        <?php button_chart_export('chartAreaCountPelatihan'); ?>
                        <canvas id="chartRadarCountGabungan"></canvas>
                    </div>

                    <div class="col col-md-6">
                        <?php button_chart_export('chartAreaCountPelatihan'); ?>
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
    $chart_data_pendidikan=array();
    if (!empty($group_pendidikan)) {
        foreach ($group_pendidikan as $key => $value) {
            if (is_numeric($key)) {
                if ($key<0) {
                    $key="< ".((int)date('Y')-4);
                }elseif ($key==0) {
                    $key=date('Y');
                }elseif ($key==1) {
                    $key=date('Y')-1;
                }elseif ($key==2) {
                    $key=date('Y')-2;
                }elseif ($key==3) {
                    $key=date('Y')-3;
                }elseif ($key==4) {
                    $key=date('Y')-4;
                }elseif ($key==5) {
                    $key=date('Y')-5;
                }
            }

            if ($key=='Program') {
                $chart_data_pendidikan['label']=$value;
            }
            if (!in_array($key,array('Program','total'))) {
                $chart_data_pendidikan['dataset'][]=array(
                    'label'                     => strval($key),
                    'data'                      => $value,
                    'backgroundColor'           => 'rgba('.rand(0,255).','.rand(0,255).', '.rand(0,255).', 0.2)',
                    'borderColor'               => 'rgb('.rand(0,255).', '.rand(0,255).', '.rand(0,255).')',
                    'fill'                      => true
                );
            }
        }
    }

    $chart_data_pelatihan=array();
    if (!empty($group_pelatihan)) {
        foreach ($group_pelatihan as $key => $value) {
            if (is_numeric($key)) {
                if ($key<0) {
                    $key="< ".((int)date('Y')-4);
                }elseif ($key==0) {
                    $key=date('Y');
                }elseif ($key==1) {
                    $key=date('Y')-1;
                }elseif ($key==2) {
                    $key=date('Y')-2;
                }elseif ($key==3) {
                    $key=date('Y')-3;
                }elseif ($key==4) {
                    $key=date('Y')-4;
                }elseif ($key==5) {
                    $key=date('Y')-5;
                }
            }

            if ($key=='Program') {
                $chart_data_pelatihan['label']=$value;
            }
            if (!in_array($key,array('Program','total'))) {
                $chart_data_pelatihan['dataset'][]=array(
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
            if (is_numeric($key)) {
                if ($key<0) {
                    $key="< ".((int)date('Y')-4);
                }elseif ($key==0) {
                    $key=date('Y');
                }elseif ($key==1) {
                    $key=date('Y')-1;
                }elseif ($key==2) {
                    $key=date('Y')-2;
                }elseif ($key==3) {
                    $key=date('Y')-3;
                }elseif ($key==4) {
                    $key=date('Y')-4;
                }elseif ($key==5) {
                    $key=date('Y')-5;
                }
            }

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
var datasetPendidikan = <?php echo json_encode($chart_data_pendidikan) ?>;
var datasetPelatihan = <?php echo json_encode($chart_data_pelatihan) ?>;
var datasetGabungan = <?php echo json_encode($chart_data_gabungan) ?>;
</script>