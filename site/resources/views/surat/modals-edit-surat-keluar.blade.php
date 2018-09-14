<div id="modals-edit" class="modal fade" tabindex="-1" data-width="760">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Edit Surat Masuk</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('action-update-surat') }}" method="post" enctype="multipart/form-data" role="form" id="form-edit-surat-perintah">
                    {{ csrf_field() }}
                    <input type="hidden" name="jenis" value="2">
                    <input type="hidden" name="tipe-surat" value="1">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" name="nomor-surat-perintah" id="edit-nomor-surat-perintah" readonly>
                            <label for="edit-nomor-surat-perintah">Nomor Surat</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control edited" name="kepada-surat-perintah" id="edit-kepada-surat-perintah" required>
                            <label for="edit-kepada-surat-perintah">Kepada</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control edited" name="dari-surat-perintah" id="edit-dari-surat-perintah" required>
                            <label for="edit-dari-surat-perintah">Dari</label>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label for="edit-file-surat">Upload Berkas</label>
                            <input type="file" name="file-surat" id="edit-file-surat" class="dropify" 
                                    data-allowed-file-extensions="pdf png jpg jpeg"
                                    data-errors-position="outside"
                                    data-max-file-size="5M" />
                            <span class="help-block" style="opacity: 1; position: initial">* Harap kosongkan berkas jika tidak akan diganti</span>
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue btn-submit">Submit</button>
                    </div>
                </form>
                <form action="{{ route('action-update-surat') }}" method="post" enctype="multipart/form-data" role="form" id="form-edit-surat-edaran" style="display:none">
                    {{ csrf_field() }}
                    <input type="hidden" name="jenis" value="2">
                    <input type="hidden" name="tipe-surat" value="2">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" name="nomor-surat-edaran" id="edit-nomor-surat-edaran" readonly>
                            <label for="edit-nomor-surat-edaran">Nomor Surat</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control edited" name="tanggal-surat-edaran" id="edit-tanggal-surat-edaran" required>
                            <label for="edit-tanggal-surat-edaran">Tanggal</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control edited" name="tentang-surat-edaran" id="edit-tentang-surat-edaran" required>
                            <label for="edit-tentang-surat-edaran">Tentang</label>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label for="file-surat">Upload Berkas</label>
                            <input type="file" name="file-surat" id="file-surat" class="dropify" 
                                    data-allowed-file-extensions="pdf png jpg jpeg"
                                    data-errors-position="outside"
                                    data-max-file-size="5M" />
                            <span class="help-block" style="opacity: 1; position: initial">* Harap kosongkan berkas jika tidak akan diganti</span>
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue btn-submit">Submit</button>
                    </div>
                </form>
                <form action="{{ route('action-update-surat') }}" method="post" enctype="multipart/form-data" role="form" id="form-edit-surat-biasa" style="display:none">
                    {{ csrf_field() }}
                    <input type="hidden" name="jenis" value="2">
                    <input type="hidden" name="tipe-surat" value="3">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control edited" name="nomor-surat-biasa" id="edit-nomor-surat-biasa" readonly>
                            <label for="edit-nomor-surat-biasa">Nomor Surat</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control edited" name="tanggal-surat-biasa" id="edit-tanggal-surat-biasa" required>
                            <label for="edit-tanggal-surat-biasa">Tanggal</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control edited" name="kepada-surat-biasa" id="edit-kepada-surat-biasa" required>
                            <label for="edit-kepada-surat-biasa">Kepada</label>
                        </div>
                        <div class="form-group form-md-radios">
                            <label>Klasifikasi</label>
                            <div class="md-radio-inline">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="md-radio">
                                            <input type="radio" id="edit-rahasia" name="edit-klasifikasi" class="md-radiobtn" value="1">
                                            <label for="edit-rahasia">
                                                <span class="inc"></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Rahasia </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-radio">
                                            <input type="radio" id="edit-kilat" name="edit-klasifikasi" class="md-radiobtn" value="2">
                                            <label for="edit-kilat">
                                                <span class="inc"></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Kilat </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md-radio-inline">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="md-radio">
                                            <input type="radio" id="edit-biasa" name="edit-klasifikasi" class="md-radiobtn" value="3">
                                            <label for="edit-biasa">
                                                <span class="inc"></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Biasa </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-radio">
                                            <input type="radio" id="edit-segera" name="edit-klasifikasi" class="md-radiobtn" value="4">
                                            <label for="edit-segera">
                                                <span class="inc"></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Segera </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control edited" name="lampiran-surat-biasa" id="edit-lampiran-surat-biasa" required>
                            <label for="edit-lampiran-surat-biasa">Lampiran</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control edited" name="perihal-surat-biasa" id="edit-perihal-surat-biasa" required>
                            <label for="edit-perihal-surat-biasa">Perihal</label>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label for="file-surat">Upload Berkas</label>
                            <input type="file" name="file-surat" id="file-surat" class="dropify" 
                                    data-allowed-file-extensions="pdf png jpg jpeg"
                                    data-errors-position="outside"
                                    data-max-file-size="5M" />
                            <span class="help-block" style="opacity: 1; position: initial">* Harap kosongkan berkas jika tidak akan diganti</span>
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue btn-submit">Submit</button>
                    </div>
                </form>
                <form action="{{ route('action-update-surat') }}" method="post" enctype="multipart/form-data" role="form" id="form-edit-nota-dinas" style="display:none">
                    {{ csrf_field() }}
                    <input type="hidden" name="jenis" value="2">
                    <input type="hidden" name="tipe-surat" value="4">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" name="nomor-nota-dinas" id="edit-nomor-nota-dinas" readonly>
                            <label for="edit-nomor-nota-dinas">Nomor Surat</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control edited" name="kepada-nota-dinas" id="edit-kepada-nota-dinas" required>
                            <label for="edit-kepada-nota-dinas">Kepada</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control edited" name="dari-nota-dinas" id="edit-dari-nota-dinas" required>
                            <label for="edit-dari-nota-dinas">Dari</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control edited" name="hal-nota-dinas" id="edit-hal-nota-dinas" required>
                            <label for="edit-hal-nota-dinas">Hal</label>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label for="file-surat">Upload Berkas</label>
                            <input type="file" name="file-surat" id="file-surat" class="dropify" 
                                    data-allowed-file-extensions="pdf png jpg jpeg"
                                    data-errors-position="outside"
                                    data-max-file-size="5M" />
                            <span class="help-block" style="opacity: 1; position: initial">* Harap kosongkan berkas jika tidak akan diganti</span>
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue btn-submit">Submit</button>
                    </div>
                </form>
                <form action="{{ route('action-update-surat') }}" method="post" enctype="multipart/form-data" role="form" id="form-edit-undangan" style="display:none">
                    {{ csrf_field() }}
                    <input type="hidden" name="jenis" value="2">
                    <input type="hidden" name="tipe-surat" value="5">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" name="nomor-undangan" id="edit-nomor-undangan" readonly>
                            <label for="edit-nomor-undangan">Nomor Surat</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control edited" name="tanggal-undangan" id="edit-tanggal-undangan" required>
                            <label for="edit-tanggal-undangan">Tanggal</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control edited" name="kepada-undangan" id="edit-kepada-undangan" required>
                            <label for="edit-kepada-undangan">Kepada</label>
                        </div>
                        <div class="form-group form-md-radios">
                            <label>Klasifikasi</label>
                            <div class="md-radio-inline">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="md-radio">
                                            <input type="radio" id="edit-undangan-biasa" name="edit-klasifikasi-undangan" class="md-radiobtn" checked value="3">
                                            <label for="edit-undangan-biasa">
                                                <span class="inc"></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Biasa </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control edited" name="lampiran-undangan" id="edit-lampiran-undangan" required>
                            <label for="edit-lampiran-undangan">Lampiran</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control edited" name="perihal-undangan" id="edit-perihal-undangan" required>
                            <label for="edit-perihal-undangan">Perihal</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control edited" name="isi-undangan" id="edit-isi-undangan" required>
                            <label for="edit-isi-undangan">Isi</label>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label for="file-surat">Upload Berkas</label>
                            <input type="file" name="file-surat" id="file-surat" class="dropify" 
                                    data-allowed-file-extensions="pdf png jpg jpeg"
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