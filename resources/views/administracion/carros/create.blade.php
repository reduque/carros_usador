@extends('layouts.admin')

@section('css')
    <link href="css/slim.min.css" rel="stylesheet">
@endsection

@section('content')

<div class="row">
     <div class="col-lg-6">
        <h1 class="page-header">@lang('administracion.carros')</h1>
    </div>
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('administracion_home') }}"><i class="fa fa-dashboard"></i> @lang('administracion.inicio')</a></li>
            <li><a href="{{ route("carros.index") }}"><i class="fa fa-fw fa-pencil"></i> @lang('administracion.carros')</a></li>
            <li>@lang('administracion.crear')</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <p class="text-right"><a href="{{ route('carros.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-fw fa-list"></i> @lang('administracion.volver_lista')</a></p>
    </div>
</div>

<form role="form" action="{{ route('carros.store') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-lg-3">
            <div class="form-group">
                <label>Marca</label>
                <select name="marca_id" class="form-control" required>
                    @foreach ($marcas as $marca)
                        <option value="{{ $marca->id }}" @if(old('marca_id') == $marca->id) selected @endif >{{ $marca->marca }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label>Modelo</label>
                <select name="modelo_id" class="form-control" required></select>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <label>Año</label>
                <select name="ano" class="form-control">
                    @for ($l=date('Y')-10; $l<=date('Y'); $l++)
                        <option value="{{ $l }}" @if(old('ano') == $l) selected @endif >{{ $l }}</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group{{ $errors->has('precio') ? ' has-error' : '' }}">
                <label>Precio</label>
                <input type="number" class="form-control" name="precio" value="{{ old('precio') }}" min="0" step="0.01" required>
                @if ($errors->has('precio'))
                    <p class="help-block">{{ $errors->first('precio') }}</p>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label>Descripción</label>
                <textarea class="form-control" rows="5" name="descripcion" required>{{ old('descripcion') }}</textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                <label>Color</label>
                <input type="text" class="form-control" name="color" value="{{ old('color') }}" maxlength="50" required>
                @if ($errors->has('color'))
                    <p class="help-block">{{ $errors->first('color') }}</p>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-check"></i> @lang('administracion.guardar')</button>  
            <a href="{{ route('carros.index') }}" class="btn btn-primary"><i class="fa fa-fw fa-list"></i> @lang('administracion.volver_lista')</a>
        </div>
    </div>
</form>

@endsection

@section('javascript')
<script type="text/javascript">
    $(document).ready(function(){
        function carros_modelos(){
            $.ajax({
                url: '{{ route('carros_modelos') }}',
                data: {
                    idmarca: $('select[name="marca_id"]').val(),
                    modeloid: '{{old('modelo_id')}}'
                },
                type: "get",
                datatype: "html"
            }).done(function(data) {
                $('select[name="modelo_id"]').html(data);
            });
        }
        carros_modelos();
        $('select[name="marca_id"]').change(function(){
            carros_modelos();
        })
    })
</script>
@endsection
