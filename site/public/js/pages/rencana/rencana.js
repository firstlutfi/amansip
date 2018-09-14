jQuery(document).ready(function() {
	$("#nomor-surat-perintah").inputmask("SPRIN/9999/9999/2099", {});
	$("#nomor-surat-edaran").inputmask("SE/9999/9999/2099", {});
	$("#nomor-rpk").inputmask("B/9999/9999/9999/9999/9999", {});
	$("#nomor-nota-dinas").inputmask("B/ND/9999/9999/2099", {});
	$("#nomor-undangan").inputmask("B/Un\\d/9999/9999/2099", {});
	$("#edit-tanggal-surat-edaran").inputmask("d/m/2099", {});
	$(".tanggal-kegiatan").inputmask("d/m/2099", {});
	$(".jumlah-anggaran").inputmask('Rp9.999.999.999', {
            numericInput: true
    });

	$('.dropify').dropify({
		error: {
        'fileSize': 'Ukuran berkas terlalu besar (Max {{ value }}).',
        'fileExtension': 'Jenis berkas tidak sesuai (Hanya {{ value }}).'
    }
	});

	$("#select-jenis").change(function(){
		if ($(this).val() == 1) {
			$("#form-tor").show(500);
			$("#form-rab").hide(500);
			$("#form-rpk").hide(500);
		}else if ($(this).val() == 2) {
			$("#form-tor").hide(500);
			$("#form-rab").show(500);
			$("#form-rpk").hide(500);
		}else if ($(this).val() == 3) {
			$("#form-tor").hide(500);
			$("#form-rab").hide(500);
			$("#form-rpk").show(500);
		}
	});

    $(".button-add").click(function(){
		$("#modals-create").modal('show');
	});

	$(".btn-view").click(function(){
		$.ajax({
            url: 'rencana/get/' + $(this).data('id'),
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
					$("#view-tor").show();
					$("#view-rab").hide();
					$("#view-rpk").hide();
					$("#nama-kegiatan-tor").html(data.nama_kegiatan);
					$("#tanggal-kegiatan-tor").html(data.tanggal_kegiatan);
					$("#modals-view").modal('show');
				}else if (data.jenis == 2) {
					$("#view-tor").hide();
					$("#view-rab").show();
					$("#view-rpk").hide();
					$("#nama-kegiatan-rab").html(data.nama_kegiatan);
					$("#jumlah-anggaran-rab").html(data.jumlah_anggaran);
					$("#tanggal-kegiatan-rab").html(data.tanggal_kegiatan);
					$("#modals-view").modal('show');
				}else if (data.jenis == 3) {
					$("#view-tor").hide();
					$("#view-rab").hide();
					$("#view-rpk").show();
					$("#nama-kegiatan-rpk").html(data.nama_kegiatan);
					$("#tanggal-kegiatan-rpk").html(data.tanggal_kegiatan);
					$("#tujuan-rpk").html(data.tujuan);
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
            url: 'rencana/get/' + $(this).data('id'),
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
					$("#edit-tor").show();
					$("#edit-rab").hide();
					$("#edit-rpk").hide();
					$("#id-dokumen-tor").val(data.id_dokumen);
					$("#edit-nama-kegiatan-tor").val(data.nama_kegiatan);
					$("#edit-tanggal-kegiatan-tor").val(data.tanggal_kegiatan);
					$("#file-tor").val(data.file_kegiatan);
					$("#modals-edit").modal('show');
				}else if (data.jenis == 2) {
					$("#edit-tor").hide();
					$("#edit-rab").show();
					$("#edit-rpk").hide();
					var anggaran = data.jumlah_anggaran;
					var withoutRp = anggaran.replace("Rp", "");
					var withoutDots = withoutRp.replace(/\./g, "");
					$("#id-dokumen-rab").val(data.id_dokumen);
					$("#edit-nama-kegiatan-rab").val(data.nama_kegiatan);
					$("#edit-jumlah-anggaran-rab").val(withoutDots);
					$("#edit-tanggal-kegiatan-rab").val(data.tanggal_kegiatan);
					$("#file-rab").val(data.file_kegiatan);
					$("#modals-edit").modal('show');
				}else if (data.jenis == 3) {
					$("#edit-tor").hide();
					$("#edit-rab").hide();
					$("#edit-rpk").show();
					$("#id-dokumen-rpk").val(data.id_dokumen);
					$("#edit-nama-kegiatan-rpk").val(data.nama_kegiatan);
					$("#edit-tanggal-kegiatan-rpk").val(data.tanggal_kegiatan);
					$("#edit-tujuan-rpk").val(data.tujuan);
					$("#file-rpk").val(data.file_kegiatan);
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
            url: 'rencana/delete/' + $(this).data('id'),
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