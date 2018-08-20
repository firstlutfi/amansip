@extends('template.layout')

@section('page-title', 'Surat Keluar')

@section('page-level-plugins') 
<link href="libraries/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="libraries/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
@endsection

@section('page-level-styles')
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
                                    <span>Surat Keluar</span>
                                </li>
                            </ul>
                        </div>
                        <!-- END PAGE BAR -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase">View All Surat Keluar</span>
                                        </div>
                                        <div class="tools"> </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th width="20%">No Surat</th>
                                                    <th width="20%">Tipe Surat</th>
                                                    <th width="15%">Tanggal Surat</th>
                                                    <th width="25%">File</th>
                                                    <th width="10%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (isset($surat) && $surat !=  null)
                                                    @foreach ($surat as $data)
                                                        <tr>
                                                            <td>{{ $data->nomor }}</td>
                                                            <td>@if ($data->tipe_surat == 1)
                                                                {{ "Surat Perintah" }}
                                                                @elseif ($data->tipe_surat == 2)
                                                                    {{ "Surat Edaran" }}
                                                                    @elseif ($data->tipe_surat == 3)
                                                                        {{ "Surat Biasa" }}
                                                                        @elseif ($data->tipe_surat == 4)
                                                                            {{ "Nota Dinas" }}
                                                                            @else
                                                                                {{ "Undangan" }}
                                                                @endif</td>
                                                            <td>{{ $data->tanggal_surat }}</td>
                                                            <td>{{ $data->file_surat }}</td>
                                                            <td>
                                                                <a href="javascript:;" class="btn btn-outline btn-icon-only dark">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                                <a href="javascript:;" class="btn btn-outline btn-icon-only blue">
                                                                    <i class="fa fa-download"></i>
                                                                </a>
                                                                <a href="javascript:;" class="btn btn-outline btn-icon-only green">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <a href="javascript:;" class="btn btn-outline btn-icon-only red">
                                                                    <i class="fa fa-times"></i>
                                                                </a>
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
@endsection

@section('page-level-scripts')
<script src="js/global/datatable.js" type="text/javascript"></script>
<script src="libraries/datatables/datatables.min.js" type="text/javascript"></script>
<script src="libraries/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="js/pages/table-datatables-buttons.js" type="text/javascript"></script>
@endsection