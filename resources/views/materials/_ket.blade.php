<div class="row">
{!! Form::model($model, ['url' => $delete_url, 'method' => 'post'] ) !!}
<input type="hidden" value="hadir" name="hadir">
<input type="hidden" value="{{$model->id}}" name="id">
<button type="submit" class="btn btn-danger"><span> Hadir</span></button>
{!! Form::close()!!}
{!! Form::model($model, ['url' => $delete_url, 'method' => 'post', 'class' => 'form-inline'] ) !!}
<input type="hidden" value="izin" name="hadir">
<input type="hidden" value="{{$model->id}}" name="id">
<button type="submit" class="btn btn-danger">Izin</span></button>
{!! Form::close()!!}
{!! Form::model($model, ['url' => $delete_url, 'method' => 'post', 'class' => 'form-inline'] ) !!}
<input type="hidden" value="sakit" name="hadir">
<input type="hidden" value="{{$model->id}}" name="id">
<button type="submit" class="btn btn-danger">Sakit</button>
{!! Form::close()!!}
{!! Form::model($model, ['url' => $delete_url, 'method' => 'post', 'class' => 'form-inline'] ) !!}
<input type="hidden" value="alfa" name="hadir">
<input type="hidden" value="{{$model->id}}" name="id">
<button type="submit" class="btn btn-danger">Alfa</button>
{!! Form::close()!!}
</div>
