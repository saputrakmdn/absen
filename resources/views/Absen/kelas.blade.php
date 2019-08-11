@extends('layouts.admin') 
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Daftar Hadir Kelas</h4>
                    </div>
                    <div class="panel-body">
                        {!! $html->table(['class'=>'table-striped']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
<div>
@endsection 

@section('scripts') 
{!! $html->scripts() !!} 
@endsection