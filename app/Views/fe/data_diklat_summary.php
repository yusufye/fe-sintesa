<?php 
        $data_summary_pendidikan=$summary[$model_name]['pendidikan'];
?>
<section id="services" class="services">
    <div class="container" data-aos="fade-up">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pendidikan" data-toggle="tab" href="#home" role="tab" aria-controls="pendidikan" aria-selected="true">Pendidikan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pelatijan" data-toggle="tab" href="#pelatihan" role="tab" aria-controls="pelatihan" aria-selected="true">Pelatihan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="gabungan" data-toggle="tab" href="#gabungan" role="tab" aria-controls="gabungan" aria-selected="true">Gabungan</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="pendidikan">
        <div class="pull-right">
            <a href="" class="btn btn-primary">Info Detail<i class="fa fa-arrow-right"></i></a>
        </div>
        <table id="tableCountPendidikan" class="table">
        <?php
        if ($data_summary_pendidikan!=null) {
            foreach ($data_summary_pendidikan as $key => $value) {
            
                if ($key==0) {
                    echo "<thead><tr>";
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
    <div class="tab-pane fade" id="pelatihan" role="tabpanel" aria-labelledby="pelatijan">...</div>
    <div class="tab-pane fade" id="gabungan" role="tabpanel" aria-labelledby="gabungan">...</div>
    </div>
    </div>
</section>