<section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-sm-3">
                <input class="form-control form-control-sm Globalfilters" data-filtername="nama" type="text"
                    placeholder="Nama Narasumber">
            </div>
            <div class="col-sm-3">
                <input class="form-control form-control-sm Globalfilters" data-filtername="tgl_update" type="date"
                    placeholder="Tanggal Update">
            </div>
        </div>
        <br>
        <!-- <select name="filter_kota" id="filter_kota" data-filtername="kota" class="filters">
        <option value="Sendai"></option>
        <option value="Tokyo"></option>
        <option value="Yokohama"></option>
    </select>

    <select name="filter_kode" id="filter_kode" data-filtername="kode" class="filters">
        <option value="RIKYO"></option>
        <option value="TOY"></option>
        <option value="TAKU"></option>
    </select> -->
        <div class='table-responsive'>
            <table id="tableDetailPendidikan" class="table tablex table-stripped">
                <thead class="table-primary">
                    <tr>
                        <th style="width:20%">Nama Narasumber</th>
                        <th style="width:20%">Jabatan</th>
                        <th style="width:20%">Nama Instansi</th>
                        <th style="width:10%">Foto</th>
                        <th style="width:20%">Tanggal Update</th>
                        <th style="width:10%">Details</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="detail_pegawai" tabindex="-1" aria-labelledby="detail_pegawaiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Biodata Narasumber</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table>
                    <tr>
                        <td>Nama Narasumber</td>
                        <td>:</td>
                        <td id="dialog_nama"></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td id="dialog_jk"></td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td id="dialog_agama"></td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td id="dialog_jabatan"></td>
                    </tr>
                    <tr>
                        <td>Nama Instansi</td>
                        <td>:</td>
                        <td id="dialog_instansi"></td>
                    </tr>
                    <tr>
                        <td>Foto</td>
                        <td>:</td>
                        <td id="dialog_foto"></td>
                    </tr>
                    <tr>
                        <td>Tanggal Update</td>
                        <td>:</td>
                        <td id="dialog_tgl_update"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
var DtTableId = 'tableDetailPendidikan';
var DtModelNaame = '<?php echo $model_init; ?>';
var DtMethodName = '<?php echo $method; ?>';
var DtMethodParam = '<?php echo $method_param; ?>';
var DtMethodType = '<?php echo $method_type; ?>';
</script>