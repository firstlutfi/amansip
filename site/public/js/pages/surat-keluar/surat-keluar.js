jQuery(document).ready(function() {
	$("#nomor-surat-perintah").inputmask("SPRIN/9999/9999/2099", {});
	$("#nomor-surat-edaran").inputmask("SE/9999/9999/2099", {});
	$("#nomor-surat-biasa").inputmask("B/9999/9999/9999/9999/9999", {});
	$("#nomor-nota-dinas").inputmask("B/ND/9999/9999/2099", {});
	$("#nomor-undangan").inputmask("B/Un\\d/9999/9999/2099", {});
	$("#edit-tanggal-surat-edaran").inputmask("d/m/2099", {});
	$("#tanggal-surat-biasa").inputmask("d/m/2099", {});
	$("#tanggal-undangan").inputmask("d/m/2099", {});

	$('.dropify').dropify({
		error: {
        'fileSize': 'Ukuran berkas terlalu besar (Max {{ value }}).',
        'fileExtension': 'Jenis berkas tidak sesuai (Hanya {{ value }}).'
    }
	});

	$("#select-jenis-surat").change(function(){
		if ($(this).val() == 1) {
			$("#form-surat-perintah").show(500);
			$("#form-surat-edaran").hide(500);
			$("#form-surat-biasa").hide(500);
			$("#form-nota-dinas").hide(500);
			$("#form-undangan").hide(500);
		}else if ($(this).val() == 2) {
			$("#form-surat-perintah").hide(500);
			$("#form-surat-edaran").show(500);
			$("#form-surat-biasa").hide(500);
			$("#form-nota-dinas").hide(500);
			$("#form-undangan").hide(500);
		}else if ($(this).val() == 3) {
			$("#form-surat-perintah").hide(500);
			$("#form-surat-edaran").hide(500);
			$("#form-surat-biasa").show(500);
			$("#form-nota-dinas").hide(500);
			$("#form-undangan").hide(500);
		}else if ($(this).val() == 4) {
			$("#form-surat-perintah").hide(500);
			$("#form-surat-edaran").hide(500);
			$("#form-surat-biasa").hide(500);
			$("#form-nota-dinas").show(500);
			$("#form-undangan").hide(500);
		}else if ($(this).val() == 5) {
			$("#form-surat-perintah").hide(500);
			$("#form-surat-edaran").hide(500);
			$("#form-surat-biasa").hide(500);
			$("#form-nota-dinas").hide(500);
			$("#form-undangan").show(500);
		}
	});

    $(".button-add").click(function(){
		$("#modals-create").modal('show');
	});

	$(".btn-view").click(function(){
		$.ajax({
            url: 'surat/get/' + $(this).data('id'),
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
                if (data.tipe_surat == 1) {
					$("#view-surat-perintah").show();
					$("#view-surat-edaran").hide();
					$("#view-surat-biasa").hide();
					$("#view-nota-dinas").hide();
					$("#view-surat-undangan").hide();
					$("#view-nomor-surat-perintah").html(data.nomor);
					$("#view-tanggal-surat-perintah").html(data.tanggal_surat);
					$("#view-dari-surat-perintah").html(data.dari);
					$("#view-kepada-surat-perintah").html(data.kepada);
					$("#modals-view").modal('show');
				}else if (data.tipe_surat == 2) {
					$("#view-surat-perintah").hide();
					$("#view-surat-edaran").show();
					$("#view-surat-biasa").hide();
					$("#view-nota-dinas").hide();
					$("#view-surat-undangan").hide();
					$("#view-nomor-surat-edaran").html(data.nomor);
					$("#view-tanggal-surat-edaran").html(data.tanggal_surat);
					$("#view-tentang-surat-edaran").html(data.tentang);
					$("#modals-view").modal('show');
				}else if (data.tipe_surat == 3) {
					$("#view-surat-perintah").hide();
					$("#view-surat-edaran").hide();
					$("#view-surat-biasa").show();
					$("#view-nota-dinas").hide();
					$("#view-undangan").hide();
					$("#view-nomor-surat-biasa").html(data.nomor);
					$("#view-tanggal-surat-biasa").html(data.tanggal_surat);
					$("#view-kepada-surat-biasa").html(data.kepada);
					if (data.klasifikasi == 1) {
						$("#view-klasifikasi-surat-biasa").html("Rahasia");
					}else if (data.klasifikasi == 2) {
						$("#view-klasifikasi-surat-biasa").html("Kilat");
					}else if (data.klasifikasi == 3) {
						$("#view-klasifikasi-surat-biasa").html("Biasa");
					}else{
						$("#view-klasifikasi-surat-biasa").html("Segera");
					}
					$("#view-lampiran-surat-biasa").html(data.lampiran);
					$("#view-perihal-surat-biasa").html(data.perihal);
					$("#modals-view").modal('show');
				}else if (data.tipe_surat == 4) {
					$("#view-surat-perintah").hide();
					$("#view-surat-edaran").hide();
					$("#view-surat-biasa").hide();
					$("#view-nota-dinas").show();
					$("#view-surat-undangan").hide();
					$("#view-nomor-nota-dinas").html(data.nomor);
					$("#view-tanggal-nota-dinas").html(data.tanggal_surat);
					$("#view-kepada-nota-dinas").html(data.kepada);
					$("#view-dari-nota-dinas").html(data.dari);
					$("#view-hal-nota-dinas").html(data.perihal);
					$("#modals-view").modal('show');
				}else if (data.tipe_surat == 5) {
					$("#view-surat-perintah").hide();
					$("#view-surat-edaran").hide();
					$("#view-surat-biasa").hide();
					$("#view-nota-dinas").hide();
					$("#view-surat-undangan").show();
					$("#view-nomor-surat-undangan").html(data.nomor);
					$("#view-tanggal-surat-undangan").html(data.tanggal_surat);
					$("#view-kepada-surat-undangan").html(data.kepada);
					$("#view-klasifikasi-surat-undangan").html("Biasa");
					$("#view-lampiran-surat-undangan").html(data.lampiran);
					$("#view-perihal-surat-undangan").html(data.perihal);
					$("#view-isi-surat-undangan").html(data.tentang);
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
            url: 'surat/get/' + $(this).data('id'),
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
		                
                if (data.tipe_surat == 1) {
					$("#form-edit-surat-perintah").show();
					$("#form-edit-surat-edaran").hide();
					$("#form-edit-surat-biasa").hide();
					$("#form-edit-nota-dinas").hide();
					$("#form-edit-undangan").hide();
					$("#edit-nomor-surat-perintah").val(data.nomor);
					$("#edit-dari-surat-perintah").val(data.dari);
					$("#edit-kepada-surat-perintah").val(data.kepada);
					$("#modals-edit").modal('show');
				}else if (data.tipe_surat == 2) {
					$("#form-edit-surat-perintah").hide();
					$("#form-edit-surat-edaran").show();
					$("#form-edit-surat-biasa").hide();
					$("#form-edit-nota-dinas").hide();
					$("#form-edit-undangan").hide();
					$("#edit-nomor-surat-edaran").val(data.nomor);
					$("#edit-tanggal-surat-edaran").val(data.tanggal_surat);
					$("#edit-tentang-surat-edaran").val(data.tentang);
					$("#modals-edit").modal('show');
				}else if (data.tipe_surat == 3) {
					$("#form-edit-surat-perintah").hide();
					$("#form-edit-surat-edaran").hide();
					$("#form-edit-surat-biasa").show();
					$("#form-edit-nota-dinas").hide();
					$("#form-edit-undangan").hide();
					$("#edit-nomor-surat-biasa").val(data.nomor);
					$("#edit-tanggal-surat-biasa").val(data.tanggal_surat);
					$("#edit-kepada-surat-biasa").val(data.kepada);
					if (data.klasifikasi == 1) {
						$("#edit-rahasia").attr("checked", true);
					}else if (data.klasifikasi == 2) {
						$("#edit-kilat").attr("checked", true);
					}else if (data.klasifikasi == 3) {
						$("#edit-biasa").attr("checked", true);
					}else{
						$("#edit-segera").attr("checked", true);
					}
					$("#edit-lampiran-surat-biasa").val(data.lampiran);
					$("#edit-perihal-surat-biasa").val(data.perihal);
					$("#modals-edit").modal('show');
				}else if (data.tipe_surat == 4) {
					$("#form-edit-surat-perintah").hide();
					$("#form-edit-surat-edaran").hide();
					$("#form-edit-surat-biasa").hide();
					$("#form-edit-nota-dinas").show();
					$("#form-edit-undangan").hide();
					$("#edit-nomor-nota-dinas").val(data.nomor);
					$("#edit-tanggal-nota-dinas").val(data.tanggal_surat);
					$("#edit-kepada-nota-dinas").val(data.kepada);
					$("#edit-dari-nota-dinas").val(data.dari);
					$("#edit-hal-nota-dinas").val(data.perihal);
					$("#modals-edit").modal('show');
				}else if (data.tipe_surat == 5) {
					$("#form-edit-surat-perintah").hide();
					$("#form-edit-surat-edaran").hide();
					$("#form-edit-surat-biasa").hide();
					$("#form-edit-nota-dinas").hide();
					$("#form-edit-undangan").show();
					$("#edit-nomor-undangan").val(data.nomor);
					$("#edit-tanggal-undangan").val(data.tanggal_surat);
					$("#edit-kepada-undangan").val(data.kepada);
					$("#edit-lampiran-undangan").val(data.lampiran);
					$("#edit-perihal-undangan").val(data.perihal);
					$("#edit-isi-undangan").val(data.tentang);
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
            url: 'surat/delete/' + $(this).data('id'),
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