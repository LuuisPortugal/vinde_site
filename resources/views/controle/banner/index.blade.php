@extends('layout.controle')
@section('title','Grupo de Banner')
@section('conteudo')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Banners</h2>

                    <div class="pull-right">
                        <a href="{{ route('controle.banner.edit') }}" class="btn btn-success"><i class="fa fa-plus"></i>
                            Novo</a>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <p>Total de registros encontrados: {{ $banners->count() }}</p>
                    @if($banners->count())
                        <table class="table table-striped responsive-utilities jambo_table bulk_action">
                            <thead>
                            <tr class="headings">
                                <th class="column-title">Nome</th>
                                <th class="column-title">E-mail</th>
                                <th class="column-title no-link last"><span class="nobr">Opções</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($banners as $banner)
                                <tr class="even pointer">
                                    <td class=" ">{{ $banner->nome }}</td>
                                    <td class=" ">{{ $banner->email }}</td>
                                    <td class=" last">
                                        @can('banner.alterar')
                                        <a href="{{ route('controle.banner.edit', $banner) }}"
                                           class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
                                        @endcan
                                        @can('banner.excluir')
                                        <a href="javascript:void(0);" class="btn btn-danger btn-xs excluir"
                                           data-url="{{ route('controle.banner.excluir', $banner) }}"
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
