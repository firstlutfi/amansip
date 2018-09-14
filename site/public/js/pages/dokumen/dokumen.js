jQuery(document).ready(function() {
	$("#nomor-kegiatan").inputmask("B/NOTULEN/99/9999/2099", {});
	$(".tanggal-kegiatan").inputmask("d/m/2099", {});

	$('.dropify').dropify({
		error: {
        'fileSize': 'Ukuran berkas terlalu besar (Max {{ value }}).',
        'fileExtension': 'Jenis berkas tidak sesuai (Hanya {{ value }}).'
    }
	});

	$("#select-jenis").change(function(){
		if ($(this).val() == 1) {
			$("#form-foto").show(500);
			$("#form-laporan").hide(500);
			$("#form-notulen").hide(500);
		}else if ($(this).val() == 2) {
			$("#form-foto").hide(500);
			$("#form-laporan").show(500);
			$("#form-notulen").hide(500);
		}else if ($(this).val() == 3) {
			$("#form-foto").hide(500);
			$("#form-laporan").hide(500);
			$("#form-notulen").show(500);
		}
	});

    $(".button-add").click(function(){
		$("#modals-create").modal('show');
	});

	$(".btn-view").click(function(){
		$.ajax({
            url: 'dokumen/get/' + $(this).data('id'),
			dataType: 'json',
            type: 'GET',
            data:{
				  
				},
            beforeSend : function() {
               App.blockUI({
	                boxed: true,
	                message: 'Please wait...'
	            });
            },
            complete: function () {
                App.unblockUI();
            },
            success: function (data) {
                if (data.jenis == 1) {
					$("#view-foto").show();
					$("#view-laporan").hide();
					$("#view-notulen").hide();
					$("#nama-foto").html(data.nama_kegiatan);
					$("#tanggal-foto").html(data.tanggal_kegiatan);
					$("#tempat-foto").html(data.tempat_kegiatan);
					$("#modals-view").modal('show');
				}else if (data.jenis == 2) {
					$("#view-foto").hide();
					$("#view-laporan").show();
					$("#view-notulen").hide();
					$("#nama-laporan").html(data.nama_kegiatan);
					$("#tanggal-laporan").html(data.tanggal_kegiatan);
					$("#modals-view").modal('show');
				}else if (data.jenis == 3) {
					$("#view-foto").hide();
					$("#view-laporan").hide();
					$("#view-notulen").show();
					$("#nomor-notulen").html(data.nomor);
					$("#tanggal-notulen").html(data.tanggal_kegiatan);
					$("#pimpinan-notulen").html(data.pimpinan);
					$("#tempat-notulen").html(data.tempat_kegiatan);
					$("#nama-notulen").html(data.nama_kegiatan);
					$("#dasar-notulen").html(data.dasar);
					$("#isi-notulen").html(data.isi);
					$("#modals-view").modal('show');
				}
            },
            error: function () {

                alert('xxx');
            }
        });
	});

	$(".btn-edit").click(function(){
		$.ajax({
            url: 'dokumen/get/' + $(this).data('id'),
			dataType: 'json',
            type: 'GET',
            data:{
				  
				},
            beforeSend : function() {
               App.blockUI({
	                boxed: true,
	                message: 'Please wait...'
	            });
            },
            complete: function () {
                App.unblockUI();
            },
            success: function (data) {
            	var drDestroy = $('.dropify').dropify();
                drDestroy = drDestroy.data('dropify');      
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
		                
                if (data.jenis == 1) {
					$("#edit-foto").show();
					$("#edit-laporan").hide();
					$("#edit-notulen").hide();
					$("#id-dokumen-foto").val(data.id_dokumen);
					$("#edit-nama-foto").val(data.nama_kegiatan);
					$("#edit-tanggal-foto").val(data.tanggal_kegiatan);
					$("#edit-tempat-foto").val(data.tempat_kegiatan);
					$("#file-foto").val(data.file_kegiatan);
					$("#modals-edit").modal('show');
				}else if (data.jenis == 2) {
					$("#edit-foto").hide();
					$("#edit-laporan").show();
					$("#edit-notulen").hide();
					$("#id-dokumen-laporan").val(data.id_dokumen);
					$("#edit-nama-laporan").val(data.nama_kegiatan);
					$("#modals-edit").modal('show');
				}else if (data.jenis == 3) {
					$("#edit-foto").hide();
					$("#edit-laporan").hide();
					$("#edit-notulen").show();
					$("#id-dokumen-notulen").val(data.id_dokumen);
					$("#edit-nomor-notulen").val(data.nomor);
					$("#edit-tanggal-notulen").val(data.tanggal_kegiatan);
					$("#edit-pimpinan-notulen").val(data.pimpinan);
					$("#edit-tempat-notulen").val(data.tempat_kegiatan);
					$("#edit-nama-notulen").val(data.nama_kegiatan);
					$("#edit-dasar-notulen").val(data.dasar);
					$("#edit-isi-notulen").val(data.isi);
					$("#modals-edit").modal('show');
				}
            },
            error: function () {

                alert('xxx');
            }
        });
	});
	
	$(".btn-delete").click(function(){
		$.ajax({
            url: 'dokumen/delete/' + $(this).data('id'),
			dataType: 'json',
            type: 'GET',
            data:{
				  
				},
            beforeSend : function() {
               App.blockUI({
	                boxed: true,
	                message: 'Please wait...'
	            });
            },
            complete: function () {
                App.unblockUI();
            },
            success: function (data) {
            	swal("Data berhasil dihapus!", "", "success");
                    $('.swal2-actions').hide();
                    setTimeout(function(){
                    	location.reload() },
                    2000);
            },
            error: function () {
                alert('xxx');
            }
        });
	});

});