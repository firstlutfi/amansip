<div id="modals-edit" class="modal fade" tabindex="-1" data-width="760">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Edit Produk Hukum</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('action-update-produkhukum') }}" method="post" enctype="multipart/form-data" role="form" id="edit-permen">
                    {{ csrf_field() }}
                    <input type="hidden" name="jenis" value="1">
                    <input type="hidden" name="filename" id="file-permen">
                    <input type="hidden" name="id-dokumen-permen" id="id-dokumen-permen">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" name="edit-nomor-permen" id="edit-nomor-permen" readonly>
                            <label for="edit-nomor-permen">Nomor</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control edited" name="edit-tentang-permen" id="edit-tentang-permen" required>
                            <label for="tanggal-kegiatan-permen">Tentang</label>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label for="edit-file-produkhukum">Upload Berkas</label>
                            <input type="file" name="edit-file-produkhukum" id="edit-file-produkhukum" class="dropify" 
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
                <form action="{{ route('action-update-produkhukum') }}" method="post" enctype="multipart/form-data" role="form" id="edit-mou">
                    {{ csrf_field() }}
                    <input type="hidden" name="jenis" value="2">
                    <input type="hidden" name="filename" id="file-mou">
                    <input type="hidden" name="id-dokumen-mou" id="id-dokumen-mou">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" name="edit-nomor-mou" id="edit-nomor-mou" readonly>
                            <label for="edit-nomor-mou">Nomor</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control edited" name="edit-dengan-mou" id="edit-dengan-mou" required>
                            <label for="tanggal-dengan-permen">Dengan</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control edited" name="edit-tentang-mou" id="edit-tentang-mou" required>
                            <label for="tanggal-kegiatan-mou">Tentang</label>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label for="edit-file-produkhukum">Upload Berkas</label>
                            <input type="file" name="edit-file-produkhukum" id="edit-file-produkhukum" class="dropify" 
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
                <form action="{{ route('action-update-produkhukum') }}" method="post" enctype="multipart/form-data" role="form" id="edit-pks">
                    {{ csrf_field() }}
                    <input type="hidden" name="jenis" value="3">
                    <input type="hidden" name="filename" id="file-pks">
                    <input type="hidden" name="id-dokumen-pks" id="id-dokumen-pks">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" name="edit-nomor-pks" id="edit-nomor-pks" readonly>
                            <label for="edit-nomor-pks">Nomor</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control edited" name="edit-dengan-pks" id="edit-dengan-pks" required>
                            <label for="tanggal-dengan-pks">Dengan</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control edited" name="edit-tentang-pks" id="edit-tentang-pks" required>
                            <label for="tanggal-kegiatan-pks">Tentang</label>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label for="edit-file-produkhukum">Upload Berkas</label>
                            <input type="file" name="edit-file-produkhukum" id="edit-file-produkhukum" class="dropify" 
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