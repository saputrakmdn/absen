{!! Form::model($model, ['url' => $delete_url, 'method' => 'delete', 'class' => 'form-inline'] ) !!}
<a class="btn btn-default" href="{{ $edit_url }}"><span class="ti-pencil"></span></a> 
<button type="submit" class="btn btn-danger"><span class="ti-trash"></span></button>
{!! Form::close()!!}