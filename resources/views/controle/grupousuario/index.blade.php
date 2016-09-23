@extends('layout.controle')
@section('title', 'Grupo de Usuário')
@section('conteudo')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Grupo de Usuários</h2>
                    @can('controle.grupousuario.salvar')
                    <div class="pull-right">
                        <a href="{{ route('controle.grupousuario.formulario') }}" class="btn btn-success"><i
                                    class="fa fa-plus"></i> Novo</a>
                    </div>
                    @endcan
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <table class="table table-striped responsive-utilities jambo_table bulk_action"
                           id="gruposusuario_table">
                        <thead>
                        <tr class="headings">
                            <th class="column-title">Nome</th>
                            <th class="column-title">Descrição</th>
                            <th class="column-title no-link last"><span class="nobr">Opções</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($gruposusuario as $grupo)
                            <tr class="even pointer">
                                <td class=" ">{{ $grupo->nome }}</td>
                                <td class=" ">{{ $grupo->texto }}</td>
                                <td class=" last">
                                    @can('controle.grupousuario.editar')
                                    <a href="{{ route('controle.grupousuario.formulario', $grupo) }}"
                                       class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
                                    @endcan
                                    @can('controle.grupousuario.excluir')
                                    <a href="javascript:void(0);" class="btn btn-danger btn-xs excluir"
                                       data-url="{{ route('controle.grupousuario.excluir', $grupo) }}"
                                       data-toggle="modal" data-target=".bs-example-modal-sm"><i
                                                class="fa fa-times"></i></a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection