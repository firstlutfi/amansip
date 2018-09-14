<div id="modals-edit" class="modal fade" tabindex="-1" data-width="760">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Edit Rencana Kegiatan</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('action-update-rencana') }}" method="post" enctype="multipart/form-data" role="form" id="edit-tor">
                    {{ csrf_field() }}
                    <input type="hidden" name="jenis" value="1">
                    <input type="hidden" name="filename" id="file-tor">
                    <input type="hidden" name="id-dokumen-tor" id="id-dokumen-tor">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" name="edit-nama-kegiatan-tor" id="edit-nama-kegiatan-tor" required>
                            <label for="edit-nama-kegiatan-tor">Nama Kegiatan</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control tanggal-kegiatan" name="edit-tanggal-kegiatan-tor" id="edit-tanggal-kegiatan-tor" required>
                            <label for="tanggal-kegiatan-tor">Waktu Pelaksanaan</label>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label for="edit-file-kegiatan">Upload Berkas</label>
                            <input type="file" name="edit-file-kegiatan" id="edit-file-kegiatan" class="dropify" 
                                    data-allowed-file-extensions="pdf png jpg jpeg rar zip"
                                    data-errors-position="outside"
                                    data-max-file-size="5M" />
                            <span class="help-block" style="opacity: 1; position: initial">* Harap kosongkan berkas jika tidak akan diganti</span>
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue btn-submit">Submit</button>
                    </div>
                </form>
                <form action="{{ route('action-update-rencana') }}" method="post" enctype="multipart/form-data" role="form" id="edit-rab">
                    {{ csrf_field() }}
                    <input type="hidden" name="jenis" value="2">
                    <input type="hidden" name="filename" id="file-rab">
                    <input type="hidden" name="id-dokumen-rab" id="id-dokumen-rab">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" name="edit-nama-kegiatan-rab" id="edit-nama-kegiatan-rab" required>
                            <label for="nama-kegiatan-rab">Nama Kegiatan</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control jumlah-anggaran" name="edit-jumlah-anggaran-rab" id="edit-jumlah-anggaran-rab" required>
                            <label for="jumlah-anggaran-rab">Jumlah Anggaran</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control tanggal-kegiatan" name="edit-tanggal-kegiatan-rab" id="edit-tanggal-kegiatan-rab" required>
                            <label for="tanggal-kegiatan-rab">Waktu Kegiatan</label>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label for="edit-file-kegiatan">Upload Berkas</label>
                            <input type="file" name="file-kegiatan" id="file-kegiatan" class="dropify" 
                                    data-allowed-file-extensions="pdf png jpg jpeg rar zip"
                                    data-errors-position="outside"
                                    data-max-file-size="5M" />
                            <span class="help-block" style="opacity: 1; position: initial">* Harap kosongkan berkas jika tidak akan diganti</span>
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue btn-submit">Submit</button>
                    </div>
                </form>
                <form action="{{ route('action-update-rencana') }}" method="post" enctype="multipart/form-data" role="form" id="edit-rpk">
                    {{ csrf_field() }}
                    <input type="hidden" name="jenis" value="3">
                    <input type="hidden" name="filename" id="file-rpk">
                    <input type="hidden" name="id-dokumen-rpk" id="id-dokumen-rpk">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" name="edit-nama-kegiatan-rpk" id="edit-nama-kegiatan-rpk" required>
                            <label for="nama-kegiatan-rpk">Nama Kegiatan</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control tanggal-kegiatan" name="edit-tanggal-kegiatan-rpk" id="edit-tanggal-kegiatan-rpk" required>
                            <label for="tanggal-kegiatan-rpk">Waktu Kegiatan</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="edit-tujuan-rpk" id="edit-tujuan-rpk" required>
                            <label for="tujuan-rpk">Tujuan</label>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label for="edit-file-kegiatan">Upload Berkas</label>
                            <input type="file" name="edit-file-kegiatan" id="edit-file-kegiatan" class="dropify" 
                                    data-allowed-file-extensions="pdf png jpg jpeg rar zip"
                                    data-errors-position="outside"
                                    data-max-file-size="5M" />
                            <span class="help-block" style="opacity: 1; position: initial">* Harap kosongkan berkas jika tidak akan diganti</span>
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