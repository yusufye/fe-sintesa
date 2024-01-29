<?php 
    echo csrf_field();
    $data_detail_pendidikan=$detail[$model_name][$param];
?>

<section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="d-flex justify-content-end pb-4">
                    <a class="btn btn-secondary btn-sm" title="Print Page" onclick="window.print();"><i class="fa fa-print"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <label>Nama</label>
                <input class="form-control form-control-sm Globalfilters Diklatfilters" data-filtername="nama"
                    type="text" placeholder="Nama">
            </div>
            <div class="col-sm-3">
                <label>Jenis Kelamin</label>
                <select class="form-control form-control-sm Globalfilters Diklatfilters" data-filtertype="equal_to"
                    data-filtername="gender" type="text" placeholder="Gender">
                    <option value="">- Select Gender -</option>
                    <option value="L">L</option>
                    <option value="P">P</option>
                </select>
            </div>
            <div class="col-sm-3">
                <label>Instansi</label>
                <select class="form-control form-control-sm Globalfilters Diklatfilters" data-filtertype="equal_to"
                    data-filtername="nama_inst" type="text" placeholder="Instansi">
                    <option value="">- Select Instansi -</option>
                    <?php
                        foreach ($list_instansi as $row) {
                            echo "<option value='".$row['nama_inst']."'>".$row['nama_inst']."</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="col-sm-3">
                <label>Periode</label>
                <select id="FilterPeriodID" class="form-control form-control-sm Globalfilters Diklatfilters" data-filtertype="<?php echo (isset($filtersGET['operator_tahun'])?'less_than':'equal_to');?>"
                    data-filtername="tahun" type="text" placeholder="periode">
                    <option value="">- Select Periode -</option>
                    <?php
                        $list_set_periode=array(
                            "<".((int)date('Y')-4),
                            date('Y')-4,
                            date('Y')-3,
                            date('Y')-2,
                            date('Y')-1,
                            date('Y')
                        );
                        foreach ($list_set_periode as $row) {
                            // $period_selected=false;
                            // if (isset($filtersGET['tahun'])) {
                            //     if ($filtersGET['tahun']==$row['tahun']) {
                            //         $period_selected=true;
                            //     }
                            // }
                            // echo "<option value='".$row['tahun']."'".($period_selected?'selected':'')." >".$row['tahun']."</option>";

                            $period_selected=false;
                            if (isset($filtersGET['tahun'])) {
                                if (isset($filtersGET['operator_tahun'])) {
                                    $opt_thn="<";
                                    if (substr($row,0,1)==$opt_thn) {
                                        $period_selected=true;
                                    }
                                }else{
                                    if ($filtersGET['tahun']==$row) {
                                        $period_selected=true;
                                    }
                                }
                            }
                            $period_attr='';
                            $select_val=$row;
                            $select_label=$row;
                            if (!is_numeric(substr($row,0,1))) {
                                $period_attr='data-operator="true"';
                                $select_val=ltrim($row,substr($row,0,1));
                            }
                            echo "<option ".$period_attr." value='".$select_val."'".($period_selected?'selected':'')." >".$select_label."</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <label>Program</label>
                <select class="form-control form-control-sm Globalfilters Diklatfilters" data-filtertype="equal_to"
                    data-filtername="kode_program" type="text" placeholder="Kode Program">
                    <option value="">- Select Program -</option>
                    <?php
                        foreach ($list_program as $row) {
                            $program_selected=false;
                            if (isset($filtersGET['kode_program'])) {
                                if ($filtersGET['kode_program']==$row['kode_program']) {
                                    $program_selected=true;
                                }
                            }
                            echo "<option value='".$row['kode_program']."'".($program_selected?'selected':'').">".$row['kode_program']."</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <br>

        <table id="tableDetailPendidikan" class="table  dataTable table-striped">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Wilayah</th>
                    <th>Instansi</th>
                    <th>Provinsi</th>
                    <th>Pendidikan</th>
                    <th>Jurusan</th>
                    <th>Penempatan</th>
                    <th>Tahun</th>
                </tr>
            </thead>
        </table>
    </div>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col col-md-8">
                <?php button_chart_export('chartBarGender'); ?>
                <br>
                <label for="chartBarGender">Grafik Berdasarkan Jenis Kelamin</label>
                <canvas id="chartBarGender"></canvas>
            </div>
            <div class="col col-md-4">
                <?php button_chart_export('chartPieGender'); ?>
                <br>
                <label for="chartPieGender">Grafik Berdasarkan Jenis Kelamin</label>
                <canvas id="chartPieGender"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col col-md-8">
                <?php button_chart_export('chartBarPeriod'); ?>
                <br>
                <label for="chartBarPeriod">Grafik Berdasarkan Tahun</label>
                <canvas id="chartBarPeriod"></canvas>
            </div>
            <div class="col col-md-4">
                <?php button_chart_export('chartPiePeriod'); ?>
                <br>
                <label for="chartPiePeriod">Grafik Berdasarkan Tahun</label>
                <canvas id="chartPiePeriod"></canvas>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col col-md-3">
                <?php //button_chart_export('tablePeriod',true); ?>
                <br>
                <label for="tablePeriod">Table Berdasarkan Tahun</label>
                <div id="tablePeriod"></div>
            </div>
        </div> -->
    </div>
</section>
<?= csrf_field(); ?>



<script>
var DtTableId = 'tableDetailPendidikan';
var DtModelNaame = '<?php echo $model_init; ?>';
var DtMethodName = '<?php echo $method; ?>';
var DtMethodParam = '<?php echo $method_param; ?>';
var DtMethodType = '<?php echo $method_type; ?>';
var type = '<?php echo $orig_title; ?>';
var method_type = '<?php echo $method_type; ?>';
var csrf_name = '<?php echo $csrf_name; ?>';
var csrf_hash = '<?php echo $csrf_hash; ?>';
</script>