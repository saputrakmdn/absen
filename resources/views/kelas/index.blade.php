@extends('layouts.admin') @section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Kelas</h4>
                        <div class="panel pull-right">
                            <a class="btn btn-success" href="{{ route('kelas.create') }}"><span class="ti-plus"></span>&nbsp;&nbsp;Tambah</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    </div>
                    <div class="panel-body">
                        {!! $html->table(['class'=>'table-striped']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 

@section('scripts') 
{!! $html->scripts() !!} 
@endsection