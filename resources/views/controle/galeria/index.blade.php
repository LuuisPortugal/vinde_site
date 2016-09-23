@extends('layout.controle')
@section('title','Galeria')
@section('conteudo')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Galerias</h2>

                    <div class="pull-right">
                        <a href="{{ route('controle.galeria.edit') }}" class="btn btn-success"><i
                                    class="fa fa-plus"></i> Novo</a>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <p>Total de registros encontrados: {{ $galerias->count() }}</p>
                    @if($galerias->count())
                        <table class="table table-striped responsive-utilities jambo_table bulk_action">
                            <thead>
                            <tr class="headings">
                                <th class="column-title">Nome</th>
                                <th class="column-title">Data</th>
                                <th class="column-title">Publicar</th>
                                <th class="column-title no-link last"><span class="nobr">Opções</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($galerias as $galeria)
                                <tr class="even pointer">
                                    <td class=" ">{{ $galeria->nome }}</td>
                                    <td class=" ">{{ $galeria->data }}</td>
                                    <td class=" ">{{ ($galeria->ativo)?'Sim':'Não' }}</td>
                                    <td class=" last">
                                        @can('galeria.alterar')
                                        <a href="{{ route('controle.galeria.edit', $galeria) }}"
                                           class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('controle.galeria.imagens', $galeria) }}"
                                           class="btn btn-primary btn-xs"><i class="fa fa-camera"></i></a>
                                        @endcan
                                        @can('galeria.excluir')
                                        <a href="javascript:void(0);" class="btn btn-danger btn-xs excluir"
                                           data-url="{{ route('controle.galeria.excluir', $galeria) }}"
                                           data-toggle="modal" data-target=".bs-example-modal-sm"><i
                                                    class="fa fa-times"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
