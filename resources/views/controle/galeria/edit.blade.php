@extends('layout.controle')
@section('title','Galeria')
@section('conteudo')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Galeria
                        <small>{{ isset($galeria) ? 'Editar' : 'Cadastrar' }}</small>
                    </h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    @include('includes.controle.validator')
                            <!-- start form for validation -->
                    {!! Form::model(isset($galeria)?$galeria:null, ['route' => ['controle.galeria.salvar', (isset($galeria)?$galeria->id:null)], 'class' => 'form-horizontal form-label-left', 'files' => true]) !!}
                    {!! csrf_field() !!}
                    <div class="form-group">
                        {!! Form::label('nome', 'Nome', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('nome', null, ['class' => 'form-control col-md-7 col-xs-12', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('data', 'Data', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('data', null, ['class' => 'form-control col-md-7 col-xs-12 datepicker', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('publicar', 'Publicar', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::checkbox('ativo', 1, null,['class' => 'form-control col-md-7 col-xs-12', 'required']) !!}
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            {!! Form::submit(isset($galeria) ? 'Editar' : 'Cadastrar', ['class' => 'btn btn-primary']) !!}
                            {!! Form::button('Cancelar', ['class' => 'btn btn-default']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                            <!-- end form for validations -->
                </div>
            </div>
        </div>
    </div>
@endsection
