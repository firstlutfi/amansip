@extends('template.layout')

@section('page-title', 'Surat')

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
                                    <span>Surat</span>
                                </li>
                            </ul>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> Buttons Datatable
                        </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <div class="m-heading-1 border-green m-bordered">
                            <h3>DataTables Buttons Extension</h3>
                            <p> A common UI paradigm to use with interactive tables is to present buttons that will trigger some action - that may be to alter the table's state, modify the data in the table, gather the data from the table or even to activate
                                some external process. Showing such buttons is an interface that end users are comfortable with, making them feel at home with the table. </p>
                            <p> For more info please check out
                                <a class="btn red btn-outline" href="http://datatables.net/extensions/buttons/" target="_blank">the official documentation</a>
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase">View All Surat</span>
                                        </div>
                                        <div class="tools"> </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th>No Surat</th>
                                                    <th>No Agenda</th>
                                                    <th>Dari</th>
                                                    <th>Kepada</th>
                                                    <th>Sifat</th>
                                                    <th>Disposisi</th>
                                                    <th width="5%">Tanggal Surat</th>
                                                    <th>File</th>
                                                    <th width="10%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (isset($surat) && $surat !=  null)
                                                    @foreach ($surat as $data)
                                                        <tr>
                                                            <td>{{ $data->no_surat }}</td>
                                                            <td>{{ $data->no_agenda }}</td>
                                                            <td>{{ $data->dari }}</td>
                                                            <td>{{ $data->kepada }}</td>
                                                            <td>{{ $data->sifat }}</td>
                                                            <td>{{ $data->disposisi }}</td>
                                                            <td>{{ $data->tanggal_surat }}</td>
                                                            <td>{{ $data->file_surat }}</td>
                                                            <td>aksi</td>
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