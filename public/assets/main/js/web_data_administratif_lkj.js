var myModal = new bootstrap.Modal(document.getElementById('detail_pegawai'))

$(document).ready(function () {
    $(document).on("click", ".show_dialog_detail", function () {
        showDetail($(this).data('source'),$(this).data('id'),function(data){
            myModal.show();
            $('#dialog_nama').text(data.nama);
            $('#dialog_jk').text(data.jk);
            $('#dialog_agama').text(data.agama);
            $('#dialog_jabatan').text(data.jabatan);
            $('#dialog_instansi').text(data.instansi);
            $('#dialog_foto').html('<img src="'+data.gambar+'" style="max-width:200px"></img>');
            $('#dialog_tgl_update').text(data.tgl_update);
        })
    })
});

function showDetail(source,id,callback){
    if (source=='biodata_narasumber') {
        to_url=baseUrl+"web/detail_pegawai/"+id;
    }else{
        to_url=baseUrl+"web/detail_pegawai/"+id;
    }

    $.ajax({
        type: "POST",
        url: to_url,
        dataType: "json",
        success: callback,
        data: {[csrf_name]:$('input[name='+csrf_name+']').val()},
        beforeSend: function() {
            $("#ajax_loader").show();
        },
        complete: function() {
            $("#ajax_loader").hide();
        }
    });
}