<div id="modals-edit" class="modal fade" tabindex="-1" data-width="760">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Edit Dokumen Kegiatan</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('action-update-dokumen') }}" method="post" enctype="multipart/form-data" role="form" id="edit-foto">
                    {{ csrf_field() }}
                    <input type="hidden" name="jenis" value="1">
                    <input type="hidden" name="filename" id="file-foto">
                    <input type="hidden" name="id-dokumen-foto" id="id-dokumen-foto">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control edited" name="edit-nama-foto" id="edit-nama-foto" required>
                            <label for="edit-nama-foto">Nama Kegiatan</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control edited tanggal-kegiatan" name="edit-tanggal-foto" id="edit-tanggal-foto" required>
                            <label for="edit-tanggal-foto">Waktu Pelaksanaan</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control edited" name="edit-tempat-foto" id="edit-tempat-foto" required>
                            <label for="edit-tempat-foto">Tempat</label>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label for="edit-file-kegiatan">Upload Berkas</label>
                            <input type="file" name="edit-file-kegiatan" id="edit-file-kegiatan" class="dropify" 
                                    data-allowed-file-extensions="rar zip"
                                    data-errors-position="outside"
                                    data-max-file-size="5M" />
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue btn-submit">Submit</button>
                    </div>
                </form>
                <form action="{{ route('action-update-dokumen') }}" method="post" enctype="multipart/form-data" role="form" id="edit-laporan">
                    {{ csrf_field() }}
                    <input type="hidden" name="jenis" value="2">
                    <input type="hidden" name="filename" id="file-laporan">
                    <input type="hidden" name="id-dokumen-laporan" id="id-dokumen-laporan">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control edited" name="edit-nama-laporan" id="edit-nama-laporan" required>
                            <label for="edit-nama-laporan">Tentang</label>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label for="edit-file-kegiatan">Upload Berkas</label>
                            <input type="file" name="edit-file-kegiatan" id="edit-file-kegiatan" class="dropify" 
                                    data-allowed-file-extensions="pdf png jpg jpeg doc docx"
                                    data-errors-position="outside"
                                    data-max-file-size="5M"  />
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue btn-submit">Submit</button>
                    </div>
                </form>
                <form action="{{ route('action-update-dokumen') }}" method="post" enctype="multipart/form-data" role="form" id="edit-notulen">
                    {{ csrf_field() }}
                    <input type="hidden" name="jenis" value="3">
                    <input type="hidden" name="filename" id="file-notulen">
                    <input type="hidden" name="id-dokumen-notulen" id="id-dokumen-notulen">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control edited" name="edit-nomor-notulen" id="edit-nomor-notulen" readonly>
                            <label for="edit-nomor-notulen">Nomor</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control edited" name="edit-nama-notulen" id="edit-nama-notulen" required>
                            <label for="edit-nama-notulen">Nama Kegiatan</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control edited tanggal-kegiatan" name="edit-tanggal-notulen" id="edit-tanggal-notulen" required>
                            <label for="edit-tanggal-notulen">Waktu Kegiatan</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control edited" name="edit-pimpinan-notulen" id="edit-pimpinan-notulen" required>
                            <label for="edit-pimpinan-notulen">Pimpinan</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control edited" name="edit-tempat-notulen" id="edit-tempat-notulen" required>
                            <label for="edit-tempat-notulen">Tempat</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control edited" name="edit-dasar-notulen" id="edit-dasar-notulen" required>
                            <label for="edit-dasar-notulen">Dasar</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control edited" name="edit-isi-notulen" id="edit-isi-notulen" required>
                            <label for="edit-isi-notulen">Isi</label>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label for="edit-file-kegiatan">Upload Berkas</label>
                            <input type="file" name="edit-file-kegiatan" id="edit-file-kegiatan" class="dropify" 
                                    data-allowed-file-extensions="pdf png jpg jpeg doc docx"
                                    data-errors-position="outside"
                                    data-max-file-size="5M" />
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue btn-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button>
    </div>
</div>