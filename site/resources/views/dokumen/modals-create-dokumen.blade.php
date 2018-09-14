<div id="modals-create" class="modal fade" tabindex="-1" data-width="760">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Tambah Dokumen Kegiatan</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group form-md-line-input form-md-floating-label ">
                    <select class="form-control" name="select-jenis" id="select-jenis">
                        <option value="1">Foto</option>
                        <option value="2">Laporan</option>
                        <option value="3">Notulen Rapat</option>
                    </select>
                    <label for="jenis">Pilih Jenis Kegiatan</label>
                </div>
                <form action="{{ route('action-create-dokumen') }}" method="post" enctype="multipart/form-data" role="form" id="form-foto">
                    {{ csrf_field() }}
                    <input type="hidden" name="jenis" value="1">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" name="nama-kegiatan" id="nama-kegiatan" required>
                            <label for="nama-kegiatan">Nama Kegiatan</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control tanggal-kegiatan" name="tanggal-kegiatan" id="tanggal-kegiatan" required>
                            <label for="tanggal-kegiatan">Waktu Pelaksanaan</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="tempat-kegiatan" id="tempat-kegiatan" required>
                            <label for="tempat-kegiatan">Tempat</label>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label for="file-surat">Upload Berkas</label>
                            <input type="file" name="file-kegiatan" id="file-kegiatan" class="dropify" 
                                    data-allowed-file-extensions="rar zip"
                                    data-errors-position="outside"
                                    data-max-file-size="5M" required />
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue btn-submit">Submit</button>
                    </div>
                </form>
                <form action="{{ route('action-create-dokumen') }}" method="post" enctype="multipart/form-data" role="form" id="form-laporan" style="display:none">
                    {{ csrf_field() }}
                    <input type="hidden" name="jenis" value="2">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" name="nama-kegiatan" id="nama-kegiatan" required>
                            <label for="nama-kegiatan">Tentang</label>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label for="file-surat">Upload Berkas</label>
                            <input type="file" name="file-kegiatan" id="file-kegiatan" class="dropify" 
                                    data-allowed-file-extensions="pdf png jpg jpeg doc docx"
                                    data-errors-position="outside"
                                    data-max-file-size="5M" required />
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue btn-submit">Submit</button>
                    </div>
                </form>
                <form action="{{ route('action-create-dokumen') }}" method="post" enctype="multipart/form-data" role="form" id="form-notulen" style="display:none">
                    {{ csrf_field() }}
                    <input type="hidden" name="jenis" value="3">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" name="nomor-kegiatan" id="nomor-kegiatan" required>
                            <label for="nomor-kegiatan">Nomor</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" name="nama-kegiatan" id="nama-kegiatan" required>
                            <label for="nama-kegiatan">Nama Kegiatan</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control tanggal-kegiatan" name="tanggal-kegiatan" id="tanggal-kegiatan" required>
                            <label for="tanggal-kegiatan">Waktu Kegiatan</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="pimpinan-kegiatan" id="pimpinan-kegiatan" required>
                            <label for="pimpinan-kegiatan">Pimpinan</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="tempat-kegiatan" id="tempat-kegiatan" required>
                            <label for="tempat-kegiatan">Tempat</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="dasar-kegiatan" id="dasar-kegiatan" required>
                            <label for="dasar-kegiatan">Dasar</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="isi-kegiatan" id="isi-kegiatan" required>
                            <label for="isi-kegiatan">Isi</label>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label for="file-surat">Upload Berkas</label>
                            <input type="file" name="file-kegiatan" id="file-kegiatan" class="dropify" 
                                    data-allowed-file-extensions="pdf png jpg jpeg doc docx"
                                    data-errors-position="outside"
                                    data-max-file-size="5M" required />
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