<div id="modals-create" class="modal fade" tabindex="-1" data-width="760">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Tambah Produk Hukum</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group form-md-line-input form-md-floating-label ">
                    <select class="form-control" name="select-jenis" id="select-jenis">
                        <option value="1">Peraturan Menteri Pertahanan</option>
                        <option value="2">Kesepakatan Bersama (MoU)</option>
                        <option value="3">Perjanjian Kerjasama</option>
                    </select>
                    <label for="jenis">Pilih Jenis Kegiatan</label>
                </div>
                <form action="{{ route('action-create-produkhukum') }}" method="post" enctype="multipart/form-data" role="form" id="form-permen">
                    {{ csrf_field() }}
                    <input type="hidden" name="jenis" value="1">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" name="nomor-produkhukum" id="nomor-permen" required>
                            <label for="nomor-produkhukum">Nomor</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="tentang-produkhukum" id="tentang-produkhukum" required>
                            <label for="tentang-produkhukum">Tentang</label>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label for="file-produkhukum">Upload Berkas</label>
                            <input type="file" name="file-produkhukum" id="file-produkhukum" class="dropify" 
                                    data-allowed-file-extensions="pdf png jpg jpeg rar zip"
                                    data-errors-position="outside"
                                    data-max-file-size="5M" required />
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue btn-submit">Submit</button>
                    </div>
                </form>
                <form action="{{ route('action-create-produkhukum') }}" method="post" enctype="multipart/form-data" role="form" id="form-mou" style="display:none">
                    {{ csrf_field() }}
                    <input type="hidden" name="jenis" value="2">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" name="nomor-produkhukum" id="nomor-mou" required>
                            <label for="nomor-produkhukum">Nomor</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="dengan-produkhukum" id="dengan-produkhukum" required>
                            <label for="dengan-produkhukum">Dengan</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="tentang-produkhukum" id="tentang-produkhukum" required>
                            <label for="tentang-produkhukum">Tentang</label>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label for="file-produkhukum">Upload Berkas</label>
                            <input type="file" name="file-produkhukum" id="file-produkhukum" class="dropify" 
                                    data-allowed-file-extensions="pdf png jpg jpeg rar zip"
                                    data-errors-position="outside"
                                    data-max-file-size="5M" required />
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue btn-submit">Submit</button>
                    </div>
                </form>
                <form action="{{ route('action-create-produkhukum') }}" method="post" enctype="multipart/form-data" role="form" id="form-pks" style="display:none">
                    {{ csrf_field() }}
                    <input type="hidden" name="jenis" value="3">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" name="nomor-produkhukum" id="nomor-pks" required>
                            <label for="nomor-produkhukum">Nomor</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="dengan-produkhukum" id="dengan-produkhukum" required>
                            <label for="dengan-produkhukum">Dengan</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="tentang-produkhukum" id="tentang-produkhukum" required>
                            <label for="tentang-produkhukum">Tentang</label>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label for="file-produkhukum">Upload Berkas</label>
                            <input type="file" name="file-produkhukum" id="file-produkhukum" class="dropify" 
                                    data-allowed-file-extensions="pdf png jpg jpeg rar zip"
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