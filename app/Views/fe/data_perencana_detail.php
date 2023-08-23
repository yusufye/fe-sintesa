<?php 
        $data_detail_pendidikan=$detail[$model_name][$param];
?>

<section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-sm-3">
                <label>Nama</label>
                <input class="form-control form-control-sm Globalfilters Perencanafilters" data-filtername="name" type="text" placeholder="Nama">
            </div>
            <div class="col-sm-3">
                <label>Jenis Kelamin</label>
                <select class="form-control form-control-sm Globalfilters Perencanafilters" data-filtertype="equal_to" data-filtername="gender" type="text" placeholder="Gender">
                    <option value="">- Select Gender -</option>
                    <option value="L">L</option>
                    <option value="P">P</option>
                </select>
            </div>
            <div class="col-sm-3">
                <label>Golongan</label>
                <select class="form-control form-control-sm Globalfilters Perencanafilters" data-filtertype="equal_to" data-filtername="golongan" type="text" placeholder="Golongan">
                    <option value="">- Select Golongan -</option>
                    <?php
                        foreach ($list_golongan as $row) {
                            echo "<option value='".$row['golongan']."'>".$row['golongan']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col-sm-3">
                <label>Instansi</label>
                <select class="form-control form-control-sm Globalfilters Perencanafilters" data-filtertype="equal_to" data-filtername="kementrian_name" type="text" placeholder="Instansi">
                <option value="">- Select Instansi -</option>
                    <?php
                        foreach ($list_instansi as $row) {
                            echo "<option value='".$row['kementrian_name']."'>".$row['kementrian_name']."</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3">
                <label>Unit Kerja</label>
                <select class="form-control form-control-sm Globalfilters Perencanafilters" data-filtertype="equal_to" data-filtername="unit_kerja" type="text" placeholder="Unit Kerja">
                    <option value="">- Select Unit Kerja -</option>
                    <?php
                        foreach ($list_unit_kerja as $row) {
                            echo "<option value='".$row['unit_kerja']."'>".$row['unit_kerja']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col-sm-3">
                <label>Jabatan</label>
                <select class="form-control form-control-sm Globalfilters Perencanafilters" data-filtertype="equal_to" data-filtername="jabatan" type="text" placeholder="Jabatan">
                    <option value="">- Select Jabatan -</option>
                    <?php
                        foreach ($list_jabatan as $row) {
                            echo "<option value='".$row['jabatan']."'>".$row['jabatan']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="col-sm-3">
                <label>Periode</label>
                <select class="form-control form-control-sm Globalfilters Perencanafilters" data-filtertype="equal_to" data-filtername="periode" type="text" placeholder="periode">
                    <option value="">- Select Periode -</option>
                    <?php
                        foreach ($list_periode as $row) {
                            echo "<option value='".$row['periode']."'>".$row['periode']."</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <br>

        <table id="tableDetailPendidikan" class="table dataTable table-striped">
            <thead class="table-primary">
                <tr>
                    <td>Nama</td>
                    <td>Jenis Kelamin</td>
                    <td>Golongan</td>
                    <td>Nama Instansi</td>
                    <td>Unit Kerja</td>
                    <td>Jabatan</td>
                    <td>Periode</td>
                </tr>
            </thead>
        </table>
    </div>
    <br>
    <br>
    <div class="container">
        <!-- <div class="row">
            <div class="col col-md-6">
                <canvas id="chartRadarGender"></canvas>
            </div>
            <div class="col col-md-6">
                <canvas id="chartAreaGender"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="col col-md-6">
                <canvas id="chartRadarPeriode"></canvas>
            </div>
            <div class="col col-md-6">
                <canvas id="chartAreaPeriode"></canvas>
            </div>
        </div> -->
        <div class="row">
            <div class="col col-md-4">
                <label for="chartBarGender">Grafik Berdasarkan Jenis Kelamin</label>
                <canvas id="chartBarGender"></canvas>
            </div>
            <div class="col col-md-4">
                <label for="chartBarPeriod">Grafik Berdasarkan Tahun</label>
                <canvas id="chartBarPeriod"></canvas>
            </div>
            <div class="col col-md-4">
                <label for="tablePeriod">Table Berdasarkan Tahun</label>
                <div id="tablePeriod"></div>
            </div>
        </div>
        
    </div>
</section>

<script>
var DtTableId     = 'tableDetailPendidikan';
var DtModelNaame  = '<?php echo $model_init; ?>';
var DtMethodName  = '<?php echo $method; ?>';
var DtMethodParam = '<?php echo $method_param; ?>';
var DtMethodType  = '<?php echo $method_type; ?>';
var type          = '<?php echo $orig_title; ?>';
var method_type   = '<?php echo $method_type; ?>';
</script>