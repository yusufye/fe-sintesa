<section id="services" class="services">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-sm-3">
                <label>Nama Kegiatan</label>
                <input class="form-control form-control-sm Globalfilters" data-filtername="nama_kegiatan" type="text"
                    placeholder="Nama kegiatan">
            </div>
            <div class="col-sm-3">
                <label>Narasumber</label>
                <input class="form-control form-control-sm Globalfilters" data-filtername="nama" type="text"
                    placeholder="Narasumber">
            </div>
            <div class="col-sm-3">
                <label>Tanggal Kegiatan</label>
                <input class="form-control form-control-sm Globalfilters" data-filtername="tgl_kegiatan"
                    data-filtertype="date_range_start" type="date" placeholder="Tanggal Kegiatan">
            </div>
            <div class="col-sm-3">
                <label></label>
                <input class="form-control form-control-sm Globalfilters" data-filtername="tgl_kegiatan"
                    data-filtertype="date_range_end" type="date" placeholder="Tanggal Kegiatan">
            </div>
        </div>
        <br>
        <div class='table-responsive'>
            <table id="tableDetailKegiatan" class="table table-stripped">
                <thead class="table-primary">
                    <tr>
                        <th style="width: 5%">No</th>
                        <th style="width: 45%">Nama Kegiatan</th>
                        <th style="width: 20%">Paparan Narasumber</th>
                        <th style="width: 10%">Narasumber</th>
                        <th style="width: 5%">Tanggal Kegiatan</th>
                        <th style="width: 5%">Lokasi Kegiatan</th>
                        <th style="width: 5%">Download File</th>
                        <th style="width: 5%">Details</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="detailKegiatan" tabindex="-1" aria-labelledby="detailKegiatan" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Kegiatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table>
                    <tr>
                        <td>Nama Kegiatan</td>
                        <td>: </td>
                        <td id="dialog_kegiatan"></td>
                    </tr>
                    <tr>
                        <td>Paparan Narasumber</td>
                        <td>: </td>
                        <td id="dialog_paparan_narasumber"></td>
                    </tr>
                    <tr>
                        <td>Narasumber</td>
                        <td>: </td>
                        <td id="dialog_narasumber"></td>
                    </tr>
                    <tr>
                        <td>Tanggal Upload</td>
                        <td>: </td>
                        <td id="dialog_tgl_upload"></td>
                    </tr>
                    <tr>
                        <td>Tanggal Kegiatan</td>
                        <td>: </td>
                        <td id="dialog_tgl_kegiatan"></td>
                    </tr>
                    <tr>
                        <td>Lokasi Kegiatan</td>
                        <td>: </td>
                        <td id="dialog_lokasi"></td>
                    </tr>
                    <tr>
                        <td>Download File</td>
                        <td>: </td>
                        <td id="dialog_download_file"></td>
                    </tr>
                    <tr>
                        <td>Laporan Kegiatan</td>
                        <td>: </td>
                        <td id="dialog_laporan_kegiatan"></td>
                    </tr>
                    <tr>
                        <td>Dokumentasi</td>
                        <td>: </td>
                        <td id="dialog_dokumentasi"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<style>

</style>
<script>
var DtTableId = 'tableDetailKegiatan';
var DtModelNaame = '<?php echo $model_init; ?>';
var DtMethodName = '<?php echo $method; ?>';
var DtMethodParam = '<?php echo $method_param; ?>';
var DtMethodType = '<?php echo $method_type; ?>';
</script>