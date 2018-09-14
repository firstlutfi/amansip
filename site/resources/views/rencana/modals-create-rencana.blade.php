<div id="modals-create" class="modal fade" tabindex="-1" data-width="760">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Tambah Rencana Kegiatan</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group form-md-line-input form-md-floating-label ">
                    <select class="form-control" name="select-jenis" id="select-jenis">
                        <option value="1">Term of Reference</option>
                        <option value="2">Rencana Anggaran Biaya</option>
                        <option value="3">Rencana Pelaksanaan Kegiatan</option>
                    </select>
                    <label for="jenis">Pilih Jenis Kegiatan</label>
                </div>
                <form action="{{ route('action-create-rencana') }}" method="post" enctype="multipart/form-data" role="form" id="form-tor">
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
                        <div class="form-group form-md-line-input">
                            <label for="file-surat">Upload Berkas</label>
                            <input type="file" name="file-kegiatan" id="file-kegiatan" class="dropify" 
                                    data-allowed-file-extensions="pdf png jpg jpeg rar zip"
                                    data-errors-position="outside"
                                    data-max-file-size="5M" required />
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue btn-submit">Submit</button>
                    </div>
                </form>
                <form action="{{ route('action-create-rencana') }}" method="post" enctype="multipart/form-data" role="form" id="form-rab" style="display:none">
                    {{ csrf_field() }}
                    <input type="hidden" name="jenis" value="2">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" name="nama-kegiatan" id="nama-kegiatan" required>
                            <label for="nama-kegiatan">Nama Kegiatan</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="jumlah-anggaran" id="jumlah-anggaran" required>
                            <label for="jumlah-anggaran">Jumlah Anggaran</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control tanggal-kegiatan" name="tanggal-kegiatan" id="tanggal-kegiatan" required>
                            <label for="tanggal-kegiatan">Waktu Kegiatan</label>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label for="file-surat">Upload Berkas</label>
                            <input type="file" name="file-kegiatan" id="file-kegiatan" class="dropify" 
                                    data-allowed-file-extensions="pdf png jpg jpeg rar zip"
                                    data-errors-position="outside"
                                    data-max-file-size="5M" required />
                        </div>
                    </div>
                    <div class="form-actions noborder">
                        <button type="submit" class="btn blue btn-submit">Submit</button>
                    </div>
                </form>
                <form action="{{ route('action-create-rencana') }}" method="post" enctype="multipart/form-data" role="form" id="form-rpk" style="display:none">
                    {{ csrf_field() }}
                    <input type="hidden" name="jenis" value="3">
                    <div class="form-body">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input type="text" class="form-control" name="nama-kegiatan" id="nama-kegiatan" required>
                            <label for="nama-kegiatan">Nama Kegiatan</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control tanggal-kegiatan" name="tanggal-kegiatan" id="tanggal-kegiatan" required>
                            <label for="tanggal-kegiatan">Waktu Kegiatan</label>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label ">
                            <input type="text" class="form-control" name="tujuan" id="tujuan" required>
                            <label for="tujuan">Tujuan</label>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label for="file-surat">Upload Berkas</label>
                            <input type="file" name="file-kegiatan" id="file-kegiatan" class="dropify" 
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