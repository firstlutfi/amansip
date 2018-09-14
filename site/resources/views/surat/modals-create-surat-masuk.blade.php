<div id="modals-create" class="modal fade" tabindex="-1" data-width="760">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Tambah Surat Masuk</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group form-md-line-input form-md-floating-label ">
                    <select class="form-control" name="select-jenis-surat" id="select-jenis-surat">
                        <option value="1">Surat Perintah</option>
                        <option value="2">Surat Edaran</option>
                        <option value="3">Surat Biasa</option>
                        <option value="4">Nota Dinas</option>
                        <option value="5">Undangan</option>
                    </select>
                    <label for="select-jenis-surat">Pilih Jenis Surat</label>
                </div>
                <form action="{{ route('action-create-surat') }}" method="post" enctype="multipart/form-data" role="form" id="form-surat-perintah">
                    {{ csrf_field() }}
                    <input type="hidden" name="jenis" value="1">
                    <input type="hidden" name="tipe-surat" value="1">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" name="nomor-surat-perintah" id="nomor-surat-perintah" required>
                            <label for="nomor-surat-perintah">Nomor Surat</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="kepada-surat-perintah" id="kepada-surat-perintah" required>
                            <label for="kepada-surat-perintah">Kepada</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="dari-surat-perintah" id="dari-surat-perintah" required>
                            <label for="dari-surat-perintah">Dari</label>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label for="file-surat">Upload Berkas</label>
                            <input type="file" name="file-surat" id="file-surat" class="dropify" 
                                    data-allowed-file-extensions="pdf png jpg jpeg"
                                    data-errors-position="outside"
                                    data-max-file-size="5M" required />
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue btn-submit">Submit</button>
                    </div>
                </form>
                <form action="{{ route('action-create-surat') }}" method="post" enctype="multipart/form-data" role="form" id="form-surat-edaran" style="display:none">
                    {{ csrf_field() }}
                    <input type="hidden" name="jenis" value="1">
                    <input type="hidden" name="tipe-surat" value="2">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" name="nomor-surat-edaran" id="nomor-surat-edaran" required>
                            <label for="nomor-surat-edaran">Nomor Surat</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="tentang-surat-edaran" id="tentang-surat-edaran" required>
                            <label for="tentang-surat-edaran">Tentang</label>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label for="file-surat">Upload Berkas</label>
                            <input type="file" name="file-surat" id="file-surat" class="dropify" 
                                    data-allowed-file-extensions="pdf png jpg jpeg"
                                    data-errors-position="outside"
                                    data-max-file-size="5M" required />
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue btn-submit">Submit</button>
                    </div>
                </form>
                <form action="{{ route('action-create-surat') }}" method="post" enctype="multipart/form-data" role="form" id="form-surat-biasa" style="display:none">
                    {{ csrf_field() }}
                    <input type="hidden" name="jenis" value="1">
                    <input type="hidden" name="tipe-surat" value="3">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" name="nomor-surat-biasa" id="nomor-surat-biasa" required>
                            <label for="nomor-surat-biasa">Nomor Surat</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="tanggal-surat-biasa" id="tanggal-surat-biasa" required>
                            <label for="tanggal-surat-biasa">Tanggal</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="kepada-surat-biasa" id="kepada-surat-biasa" required>
                            <label for="kepada-surat-biasa">Kepada</label>
                        </div>
                        <div class="form-group form-md-radios">
                            <label>Klasifikasi</label>
                            <div class="md-radio-inline">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="md-radio">
                                            <input type="radio" id="rahasia" name="klasifikasi" class="md-radiobtn" value="1">
                                            <label for="rahasia">
                                                <span class="inc"></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Rahasia </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-radio">
                                            <input type="radio" id="kilat" name="klasifikasi" class="md-radiobtn" value="2">
                                            <label for="kilat">
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
                                            <input type="radio" id="biasa" name="klasifikasi" class="md-radiobtn" value="3">
                                            <label for="biasa">
                                                <span class="inc"></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Biasa </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="md-radio">
                                            <input type="radio" id="segera" name="klasifikasi" class="md-radiobtn" value="4">
                                            <label for="segera">
                                                <span class="inc"></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Segera </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="lampiran-surat-biasa" id="lampiran-surat-biasa" required>
                            <label for="lampiran-surat-biasa">Lampiran</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="perihal-surat-biasa" id="perihal-surat-biasa" required>
                            <label for="perihal-surat-biasa">Perihal</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <select class="form-control" name="select-disposisi-kepada-surat-biasa" id="select-disposisi-kepada-surat-biasa" required>
                                <option value="1">Kasi Dukkesops</option>
                                <option value="2">Kasi Bankes</option>
                                <option value="3">Kasi Nubika</option>
                            </select>
                            <label for="select-disposisi-kepada-surat-biasa">Disposisi Kepada</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="isi-disposisi-surat-biasa" id="isi-disposisi-surat-biasa" required>
                            <label for="isi-disposisi-surat-biasa">Isi Disposisi</label>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label for="file-surat">Upload Berkas</label>
                            <input type="file" name="file-surat" id="file-surat" class="dropify" 
                                    data-allowed-file-extensions="pdf png jpg jpeg"
                                    data-errors-position="outside"
                                    data-max-file-size="5M" required />
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue btn-submit">Submit</button>
                    </div>
                </form>
                <form action="{{ route('action-create-surat') }}" method="post" enctype="multipart/form-data" role="form" id="form-nota-dinas" style="display:none">
                    {{ csrf_field() }}
                    <input type="hidden" name="jenis" value="1">
                    <input type="hidden" name="tipe-surat" value="4">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" name="nomor-nota-dinas" id="nomor-nota-dinas" required>
                            <label for="nomor-nota-dinas">Nomor Surat</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="kepada-nota-dinas" id="kepada-nota-dinas" required>
                            <label for="kepada-nota-dinas">Kepada</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="dari-nota-dinas" id="dari-nota-dinas" required>
                            <label for="dari-nota-dinas">Dari</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="hal-nota-dinas" id="hal-nota-dinas" required>
                            <label for="hal-nota-dinas">Hal</label>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label for="file-surat">Upload Berkas</label>
                            <input type="file" name="file-surat" id="file-surat" class="dropify" 
                                    data-allowed-file-extensions="pdf png jpg jpeg"
                                    data-errors-position="outside"
                                    data-max-file-size="5M" required />
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue btn-submit">Submit</button>
                    </div>
                </form>
                <form action="{{ route('action-create-surat') }}" method="post" enctype="multipart/form-data" role="form" id="form-undangan" style="display:none">
                    {{ csrf_field() }}
                    <input type="hidden" name="jenis" value="1">
                    <input type="hidden" name="tipe-surat" value="5">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" name="nomor-undangan" id="nomor-undangan" required>
                            <label for="nomor-undangan">Nomor Surat</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="tanggal-undangan" id="tanggal-undangan" required>
                            <label for="tanggal-undangan">Tanggal</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="kepada-undangan" id="kepada-undangan" required>
                            <label for="kepada-undangan">Kepada</label>
                        </div>
                        <div class="form-group form-md-radios">
                            <label>Klasifikasi</label>
                            <div class="md-radio-inline">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="md-radio">
                                            <input type="radio" id="undangan-biasa" name="klasifikasi-undangan" class="md-radiobtn" checked value="3">
                                            <label for="undangan-biasa">
                                                <span class="inc"></span>
                                                <span class="check"></span>
                                                <span class="box"></span> Biasa </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="lampiran-undangan" id="lampiran-undangan" required>
                            <label for="lampiran-undangan">Lampiran</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="perihal-undangan" id="perihal-undangan" required>
                            <label for="perihal-undangan">Perihal</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="isi-undangan" id="isi-undangan" required>
                            <label for="isi-undangan">Isi</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <select class="form-control" name="select-disposisi-kepada-undangan" id="select-disposisi-kepada-undangan" required>
                                <option value="1">Kasi Dukkesops</option>
                                <option value="2">Kasi Bankes</option>
                                <option value="3">Kasi Nubika</option>
                            </select>
                            <label for="select-disposisi-kepada-undangan">Disposisi Kepada</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="isi-disposisi-undangan" id="isi-disposisi-undangan" required>
                            <label for="isi-disposisi-undangan">Isi Disposisi</label>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label for="file-surat">Upload Berkas</label>
                            <input type="file" name="file-surat" id="file-surat" class="dropify" 
                                    data-allowed-file-extensions="pdf png jpg jpeg"
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