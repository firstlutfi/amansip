@extends('template.layout')

@section('page-title', 'Rencana Kegiatan')

@section('page-level-plugins') 
<link href="libraries/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="libraries/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
@endsection

@section('page-level-styles')
<link href="libraries/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css" />
<link href="libraries/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css" />
<link href="libraries/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('page-content')
	<div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="{{ route('home') }}">Dashboard</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Rencana Kegiatan</span>
                                </li>
                            </ul>
                        </div>
                        <!-- END PAGE BAR -->
                        <div class="row">
                            <div class="col-md-12">
                                @if(session('error_message') !== null)
                                <div id="bootstrap_alerts_demo">
                                    <div id="prefix_87164602939" class="custom-alerts alert alert-danger fade in">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><i class="fa-lg fa fa-warning"></i>{{ session('error_message') }}
                                    </div> 
                                </div>
                                @endif
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">

                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase">View All Rencana Kegiatan</span>
                                        </div>
                                        <div class="tools"> </div>
                                    </div>
                                    <?php $no = 1; ?>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Jenis Kegiatan</th>
                                                    <th>Nama Kegiatan</th>
                                                    <th>Waktu Pelaksanaan</th>
                                                    <th class="no-sorting no-search" width="40%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (isset($rencana) && $rencana !=  null)
                                                    @foreach ($rencana as $data)
                                                        <tr>
                                                            <td>{{ $no++ }}</td>
                                                            <td>@if ($data->jenis == 1)
                                                                {{ "Term of Reference" }}
                                                                @elseif ($data->jenis == 2)
                                                                    {{ "Rencana Anggaran Biaya" }}
                                                                    @else
                                                                        {{ "Rencana Pelaksanaan Kegiatan" }}
                                                                @endif</td>
                                                            <td>{{ $data->nama_kegiatan }}</td>
                                                            <td>{{ $data->tanggal_kegiatan }}</td>
                                                            <td>
                                                                <a href="javascript:;" class="btn btn-outline dark btn-view" data-id="{{ $data->id_dokumen }}">
                                                                    <i class="fa fa-eye"></i> View Detail
                                                                </a>
                                                                <a href="{{ asset(env('STORAGE_PATH') . '\\rencana\\' . $data->file_kegiatan ) }}" target="_blank" class="btn btn-outline blue">
                                                                    <i class="fa fa-download"></i> Download File
                                                                </a>
                                                                @if(session('user.nip') == $data->created_by || session('user.role') == 1)
                                                                    <a href="javascript:;" class="btn btn-outline green btn-edit" data-id="{{ $data->id_dokumen }}">
                                                                        <i class="fa fa-edit"></i> Edit Dokumen
                                                                    </a>
                                                                    <a href="javascript:;" class="btn btn-outline red btn-delete" data-id="{{ $data->id_dokumen }}">
                                                                        <i class="fa fa-times"></i> Hapus Dokumen
                                                                    </a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>
                    </div>
                    @include('rencana.modals-create-rencana')
                    @include('rencana.modals-view-rencana')
                    @include('rencana.modals-edit-rencana')
@endsection

@section('page-level-scripts')
<script src="js/global/datatable.js" type="text/javascript"></script>
<script src="libraries/datatables/datatables.min.js" type="text/javascript"></script>
<script src="libraries/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="js/pages/table-datatables-buttons.js" type="text/javascript"></script>
<script src="libraries/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
<script src="libraries/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
<script src="js/pages/ui-extended-modals.min.js" type="text/javascript"></script>
<script src="libraries/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
<script src="libraries/dropify/dist/js/dropify.min.js" type="text/javascript"></script>
<script src="js/pages/rencana/rencana.js" type="text/javascript"></script>
@endsection