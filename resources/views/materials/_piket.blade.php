{!! Form::model($model, ['url' => $delete_url, 'method' => 'delete', 'class' => 'form-inline'] ) !!}
<button type="submit" class="btn btn-danger"><span class="ti-trash"></span></button>
{!! Form::close()!!}