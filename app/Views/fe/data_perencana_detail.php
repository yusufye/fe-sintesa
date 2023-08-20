<?php 
        $data_detail_pendidikan=$detail[$model_name][$param];
?>

<section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-sm-3">
                <label>Nama</label>
                <input class="form-control form-control-sm Globalfilters" data-filtername="name" type="text" placeholder="Nama">
            </div>
            <div class="col-sm-3">
                <label>Jenis Kelamin</label>
                <select class="form-control form-control-sm Globalfilters" data-filtername="gender" type="text" placeholder="Gender">
                    <option value="L">L</option>
                    <option value="P">P</option>
                </select>
            </div>
            <div class="col-sm-3">
                <label>Golongan</label>
                <select class="form-control form-control-sm Globalfilters" data-filtername="golongan" type="text" placeholder="Golongan">
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
                <select class="form-control form-control-sm Globalfilters" data-filtername="kementrian_name" type="text" placeholder="Instansi">
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
                <select class="form-control form-control-sm Globalfilters" data-filtername="unit_kerja" type="text" placeholder="Unit Kerja">
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
                <select class="form-control form-control-sm Globalfilters" data-filtername="jabatan" type="text" placeholder="Jabatan">
                    <option value="">- Select Jabatan -</option>
                    <?php
                        foreach ($list_jabatan as $row) {
                            echo "<option value='".$row['jabatan']."'>".$row['jabatan']."</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <br>

        <table id="tableDetailPendidikan" class="table">
            <thead>
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
</section>

<script>
var DtTableId = 'tableDetailPendidikan';
var DtModelNaame = '<?php echo $model_init; ?>';
var DtMethodName = '<?php echo $method; ?>';
var DtMethodParam = '<?php echo $method_param; ?>';
var DtMethodType = '<?php echo $method_type; ?>';
</script>