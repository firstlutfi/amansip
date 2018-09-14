jQuery(document).ready(function() {
	$("#nomor-permen").inputmask("99/2099", {});
	$("#nomor-mou").inputmask("9999/9999/9999", {});
	$("#nomor-pks").inputmask("PKS/9999/9999/2099", {});

	$('.dropify').dropify({
		error: {
        'fileSize': 'Ukuran berkas terlalu besar (Max {{ value }}).',
        'fileExtension': 'Jenis berkas tidak sesuai (Hanya {{ value }}).'
    }
	});

	$("#select-jenis").change(function(){
		if ($(this).val() == 1) {
			$("#form-permen").show(500);
			$("#form-mou").hide(500);
			$("#form-pks").hide(500);
		}else if ($(this).val() == 2) {
			$("#form-permen").hide(500);
			$("#form-mou").show(500);
			$("#form-pks").hide(500);
		}else if ($(this).val() == 3) {
			$("#form-permen").hide(500);
			$("#form-mou").hide(500);
			$("#form-pks").show(500);
		}
	});

    $(".button-add").click(function(){
		$("#modals-create").modal('show');
	});

	$(".btn-view").click(function(){
		$.ajax({
            url: 'produkhukum/get/' + $(this).data('id'),
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
					$("#view-permen").show();
					$("#view-mou").hide();
					$("#view-pks").hide();
					$("#view-nomor-permen").html(data.nomor);
					$("#tentang-permen").html(data.tentang);
					$("#modals-view").modal('show');
				}else if (data.jenis == 2) {
					$("#view-permen").hide();
					$("#view-mou").show();
					$("#view-pks").hide();
					$("#view-nomor-mou").html(data.nomor);
					$("#dengan-mou").html(data.dengan);
					$("#tentang-mou").html(data.tentang);
					$("#modals-view").modal('show');
				}else if (data.jenis == 3) {
					$("#view-permen").hide();
					$("#view-mou").hide();
					$("#view-pks").show();
					$("#view-nomor-pks").html(data.nomor);
					$("#dengan-pks").html(data.dengan);
					$("#tentang-pks").html(data.tentang);
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
            url: 'produkhukum/get/' + $(this).data('id'),
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
					$("#edit-permen").show();
					$("#edit-mou").hide();
					$("#edit-pks").hide();
					$("#id-dokumen-permen").val(data.id_dokumen);
					$("#edit-nomor-permen").val(data.nomor);
					$("#edit-tentang-permen").val(data.tentang);
					$("#file-permen").val(data.file_produkhukum);
					$("#modals-edit").modal('show');
				}else if (data.jenis == 2) {
					$("#edit-permen").hide();
					$("#edit-mou").show();
					$("#edit-pks").hide();
					$("#id-dokumen-mou").val(data.id_dokumen);
					$("#edit-nomor-mou").val(data.nomor);
					$("#edit-dengan-mou").val(data.dengan);
					$("#edit-tentang-mou").val(data.tentang);
					$("#file-mou").val(data.file_produkhukum);
					$("#modals-edit").modal('show');
				}else if (data.jenis == 3) {
					$("#edit-permen").hide();
					$("#edit-mou").hide();
					$("#edit-pks").show();
					$("#id-dokumen-pks").val(data.id_dokumen);
					$("#edit-nomor-pks").val(data.nomor);
					$("#edit-dengan-pks").val(data.dengan);
					$("#edit-tentang-pks").val(data.tentang);
					$("#file-mou").val(data.file_produkhukum);
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
            url: 'produkhukum/delete/' + $(this).data('id'),
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