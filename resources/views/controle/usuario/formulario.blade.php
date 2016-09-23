@extends('layout.controle')
@section('title', 'Usuário')
@section('conteudo')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Usuário
                        <small>{{ $usuario->getInstanceIfNotNull('Cadastrar', 'Editar') }}</small>
                    </h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    @include('includes.controle.validator')
                            <!-- start form for validation -->
                    {!! Form::model($usuario->getInstanceIfNotNull(), ['route' => ['controle.usuario.editar', $usuario], 'class' => 'form-horizontal form-label-left']) !!}
                    {!! csrf_field() !!}
                    <div class="form-group">
                        {!! Form::label('Grupo', 'Grupo', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::select('grupo_usuario_id', $grupos, null, ['class' => 'form-control col-md-7 col-xs-12', 'required', 'placeholder' => 'Selecione']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('nome', 'Nome', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('nome', null, ['class' => 'form-control col-md-7 col-xs-12', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('cpf', 'CPF', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('cpf', null, ['class' => 'form-control col-md-7 col-xs-12', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'E-mail', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('email', null, ['class' => 'form-control col-md-7 col-xs-12', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('senha', 'Senha', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::password('password', ['class' => 'form-control col-md-7 col-xs-12', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('senha', 'Confirme Senha', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::password('confirme', ['class' => 'form-control col-md-7 col-xs-12', 'required']) !!}
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            {!! Form::submit($usuario->getInstanceIfNotNull('Cadastrar', 'Editar'), ['class' => 'btn btn-primary']) !!}
                            <a href="{{ route('controle.usuario.visualizar') }}" class="btn btn-default">Cancelar</a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                            <!-- end form for validations -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="application/javascript" src="/library/jquery.maskedinput.min.js"></script>
    <script>
        jQuery(function ($) {
            $("[name=cpf]").mask("999.999.999-99");
        });
    </script>
@endsection
