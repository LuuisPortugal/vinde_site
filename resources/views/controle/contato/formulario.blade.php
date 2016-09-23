@extends('layout.controle')
@section('title','Grupo de Usuário')
@section('conteudo')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Grupo de Usuário
                        <small>{{ $grupousuario->getInstanceIfNotNull('Cadastrar', 'Editar') }}</small>
                    </h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    {!! Form::model($grupousuario->getInstanceIfNotNull(), ['route' => $route, 'class' => 'form-horizontal form-label-left']) !!}
                    <div class="form-group">
                        {!! Form::label('nome', 'Nome', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('nome', null, ['class' => 'form-control col-md-7 col-xs-12', 'required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('descricao', 'Descrição', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::textarea('texto', null, ['class' => 'form-control col-md-7 col-xs-12', 'rows' => '2', 'required']) !!}
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            {!! Form::submit($grupousuario->getInstanceIfNotNull('Cadastrar', 'Editar'), ['class' => 'btn btn-primary']) !!}
                            <a href="{{ route('controle.grupousuario.visualizar') }}"
                               class="btn btn-default">Cancelar</a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                            <!-- end form for validations -->
                </div>
            </div>
        </div>
    </div>
@endsection