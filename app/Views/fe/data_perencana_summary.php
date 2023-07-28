<?php 
        $data_summary_pusat=$summary[$model_name]['pusat'];
        $data_summary_daerah=$summary[$model_name]['daerah'];
        $data_summary_gabungan=$summary[$model_name]['gabungan'];
?>
<section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <!-- <a class="nav-link active" id="pusat" data-toggle="tab" href="#home" role="tab" aria-controls="pusat" aria-selected="true">pusat</a> -->
                <button class="nav-link <?php echo ($param=='pusat'?'active':'')?>" id="nav-pusat-tab"
                    data-bs-toggle="tab" data-bs-target="#nav-pusat" type="button" role="tab"
                    aria-controls="nav-pusat" aria-selected="false">Pusat</button>
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
                        <a href='<?php echo base_url()."/data-perencana/$orig_title/pusat/detail" ?>'
                            class="btn btn-primary">Info
                            Detail <i class="fa-regular fa-circle-right"></i></a>
                    </div>
                    <table id="tableCountPusat" class="table table-striped">
                        <?php
                        $group_pusat=array();
                        if ($data_summary_pusat!=null) {
                            foreach ($data_summary_pusat as $key => $value) {
                            
                                if ($key==0) {
                                    echo "<thead class='table-primary'><tr>";
                                    foreach (array_keys($value) as $field) {
                                        echo "<th>$field</th>";
                                    }
                                    echo "</tr></thead>";
                                    
                                    
                                }

                                echo "<tbody><tr>";
                                foreach ($value as $key_row=>$row) {
                                    echo "<td>".(is_null($row) || $row==''?'-':$row)."</td>";
                                    $group_pusat[$key_row][]=$row;
                                }
                                echo "</tr></tbody>";
                            }
                        }else{
                            echo "<tr><td>Data Not Found</td></tr>";
                        }


                    ?>
                    </table>
                </div>
                <div class="row">
                    <div class="col col-md-6">
                        <canvas id="chartRadarCountPusat"></canvas>
                    </div>
                    <div class="col col-md-6">
                        <canvas id="chartAreaCountPusat"></canvas>
                    </div>
                </div>

            </div>

            <div class="tab-pane <?php echo ($param=='daerah'?'active':'')?>" id="nav-daerah" role="tabpanel"
                aria-labelledby="nav-daerah-tab">
                <div class="row">
                    <div class="d-flex justify-content-end py-4">
                        <a href='<?php echo base_url()."/data-perencana/$orig_title/daerah/detail" ?>' class="btn btn-primary">Info
                            Detail <i class="fa-regular fa-circle-right"></i></a>
                    </div>

                    <table id="tableCountDaerah" class="table table-striped">
                        <?php
                        if ($data_summary_daerah!=null) {
                            $group_daerah[$key_row][]=$row;
                            foreach ($data_summary_daerah as $key => $value) {
                            
                                if ($key==0) {
                                    echo "<thead class='table-primary'><tr>";
                                    foreach (array_keys($value) as $field) {
                                        echo "<th>$field</th>";
                                    }
                                    echo "</tr></thead>";
                                    
                                    
                                }

                                echo "<tbody><tr>";
                                foreach ($value as $key_row=>$row) {
                                    echo "<td>".(is_null($row) || $row==''?'-':$row)."</td>";
                                    $group_daerah[$key_row][]=$row;

                                }
                                echo "</tr></tbody>";
                            }
                        }else{
                            echo "<tr><td>Data Not Found</td></tr>";
                        }


                    ?>

                    </table>
                </div>
                <div class="row">

                    <div class="col col-md-6">
                        <canvas id="chartRadarCountDaerah"></canvas>
                    </div>
                    <div class="col col-md-6">
                        <canvas id="chartAreaCountDaerah"></canvas>
                    </div>
                </div>

            </div>
            <div class="tab-pane <?php echo ($param=='gabungan'?'active':'')?>" id="nav-gabungan" role="tabpanel"
                aria-labelledby="nav-gabungan-tab">
                <div class="row">
                    <div class="d-flex justify-content-end py-4">
                        <a href='<?php echo base_url()."/data-perencana/$orig_title/gabungan/detail" ?>' class="btn btn-primary">Info
                            Detail <i class="fa-regular fa-circle-right"></i></a>
                    </div>

                    <table id="tableCountGabungan" class="table table-striped">
                        <?php
                        if ($data_summary_gabungan!=null) {
                            $group_gabungan[$key_row][]=$row;
                            foreach ($data_summary_gabungan as $key => $value) {
                            
                                if ($key==0) {
                                    echo "<thead class='table-primary'><tr>";
                                    foreach (array_keys($value) as $field) {
                                        echo "<th>$field</th>";
                                    }
                                    echo "</tr></thead>";
                                    
                                    
                                }

                                echo "<tbody><tr>";
                                foreach ($value as $key_row=>$row) {
                                    echo "<td>".(is_null($row) || $row==''?'-':$row)."</td>";
                                    $group_gabungan[$key_row][]=$row;

                                }
                                echo "</tr></tbody>";
                            }
                        }else{
                            echo "<tr><td>Data Not Found</td></tr>";
                        }


                    ?>

                    </table>

                </div>


                <div class="row">

                    <div class="col col-md-6">
                        <canvas id="chartRadarCountGabungan"></canvas>
                    </div>

                    <div class="col col-md-6">
                        <canvas id="chartAreaCountGabungan"></canvas>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

<script>
<?php 
        $chart_data_pusat=array();
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

        $chart_data_daerah=array();
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

        $chart_data_gabungan=array();
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
   ?>
var datasetPusat = <?php echo json_encode($chart_data_pusat) ?>;
var datasetDaerah = <?php echo json_encode($chart_data_daerah) ?>;
var datasetGabungan = <?php echo json_encode($chart_data_gabungan) ?>;
</script>