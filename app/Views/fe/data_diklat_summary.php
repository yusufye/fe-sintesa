<?php 
        $data_summary_pendidikan=$summary[$model_name]['pendidikan'];
        $data_summary_pelatihan=$summary[$model_name]['pelatihan'];
        $data_summary_gabungan=$summary[$model_name]['gabungan'];
?>
<section id="services" class="services">
    <div class="container" data-aos="fade-up">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <!-- <a class="nav-link active" id="pendidikan" data-toggle="tab" href="#home" role="tab" aria-controls="pendidikan" aria-selected="true">Pendidikan</a> -->
            <button class="nav-link <?php echo ($param=='pendidikan'?'active':'')?>" id="nav-pendidikan-tab" data-bs-toggle="tab" data-bs-target="#nav-pendidikan" type="button" role="tab" aria-controls="nav-pendidikan" aria-selected="false">Pendidikan</button>
        </li>
        <li class="nav-item">
            <!-- <a class="nav-link" id="pelatijan" data-toggle="tab" href="#pelatihan" role="tab" aria-controls="pelatihan" aria-selected="true">Pelatihan</a> -->
            <button class="nav-link <?php echo ($param=='pelatihan'?'active':'')?>" id="nav-pelatihan-tab" data-bs-toggle="tab" data-bs-target="#nav-pelatihan" type="button" role="tab" aria-controls="nav-pelatihan" aria-selected="false">Pelatihan</button>
        </li>
        <li class="nav-item">
            <!-- <a class="nav-link" id="gabungan" data-toggle="tab" href="#gabungan" role="tab" aria-controls="gabungan" aria-selected="true">Gabungan</a> -->
            <button class="nav-link <?php echo ($param=='gabungan'?'active':'')?>" id="nav-gabungan-tab" data-bs-toggle="tab" data-bs-target="#nav-gabungan" type="button" role="tab" aria-controls="nav-gabungan" aria-selected="false">Gabungan</button>

        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
    <div class="tab-pane <?php echo ($param=='pendidikan'?'active':'')?>" id="nav-pendidikan" role="tabpanel" aria-labelledby="nav-pendidikan-tab">
        <div class="d-flex justify-content-end py-4">
            <a href='<?php echo "/data-diklat/$orig_title/pendidikan/detail" ?>' class="btn btn-primary">Info Detail<i class="fa fa-arrow-right"></i></a>
        </div>
        <table id="tableCountPendidikan" class="table table-striped">
        <?php
        if ($data_summary_pendidikan!=null) {
            foreach ($data_summary_pendidikan as $key => $value) {
            
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
                }
                echo "</tr></tbody>";
            }
        }else{
            echo "<tr><td>Data Not Found</td></tr>";
        }


        ?>
        
        </table>
    </div>

    <div class="tab-pane <?php echo ($param=='pelatihan'?'active':'')?>" id="nav-pelatihan" role="tabpanel" aria-labelledby="nav-pelatihan-tab">
        <div class="d-flex justify-content-end py-4">
            <a href='<?php echo "/data-diklat/$orig_title/pelatihan/detail" ?>' class="btn btn-primary">Info Detail<i class="fa fa-arrow-right"></i></a>
        </div>

        <table id="tableCountPelatihan" class="table table-striped">
        <?php
        if ($data_summary_pelatihan!=null) {
            foreach ($data_summary_pelatihan as $key => $value) {
            
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
                }
                echo "</tr></tbody>";
            }
        }else{
            echo "<tr><td>Data Not Found</td></tr>";
        }


        ?>
        
        </table>
    </div>
    <div class="tab-pane <?php echo ($param=='gabungan'?'active':'')?>" id="nav-gabungan" role="tabpanel" aria-labelledby="nav-gabungan-tab">
        <div class="d-flex justify-content-end py-4">
            <a href='<?php echo "/data-diklat/$orig_title/gabungan/detail" ?>' class="btn btn-primary">Info Detail<i class="fa fa-arrow-right"></i></a>
        </div>

        <table id="tableCountGabungan" class="table table-striped">
        <?php
        if ($data_summary_gabungan!=null) {
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
                }
                echo "</tr></tbody>";
            }
        }else{
            echo "<tr><td>Data Not Found</td></tr>";
        }


        ?>
        
        </table>
    </div>
    </div>
    </div>
</section>