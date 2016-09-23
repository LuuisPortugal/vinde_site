@extends('layout.controle')
@section('title', 'Contato')
@section('conteudo')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Contatos</h2>

                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <table class="table table-striped responsive-utilities jambo_table bulk_action">
                        <thead>
                        <tr class="headings">
                            <th class="column-title">Nome</th>
                            <th class="column-title">Endereço</th>
                            <th class="column-title">Status</th>
                            <th class="column-title no-link last"><span class="nobr">Opções</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contatos as $contato)
                            <tr class="even pointer">
                                <td>{{ $contato->nome }}</td>
                                <td>{{ $contato->endereco }}</td>
                                <td>
                                    <span class="label label-{{ $contato->status ? 'success' : 'warning' }}">{{ $contato->status ? 'Respondida' : 'À Responder' }}</span>
                                </td>
                                <td class="last">
                                    <a class="btn btn-default btn-xs btn-modal-map-contato" data-toggle="modal"
                                       data-target="#modal-map-contato" data-contato="{{ json_encode($contato) }}"><i
                                                class="fa fa-map-marker"></i></a>
                                    @can('controle.contato.excluir')
                                    <a href="javascript:void(0);" class="btn btn-danger btn-xs excluir"
                                       data-url="{{ route('controle.contato.excluir', $contato) }}" data-toggle="modal"
                                       data-target=".bs-example-modal-sm"><i class="fa fa-times"></i></a>
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

    <!-- Modal -->
    <div class="modal fade" id="modal-map-contato" tabindex="-1" role="dialog"
         aria-labelledby="modal-label-modal-map-contato">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-label-modal-map-contato">Localização do Contato</h4>
                </div>
                <div class="modal-body" style="height: 600px;"></div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(function () {
            $('#modal-map-contato').on('shown.bs.modal', function (e) {
                var contato = $(e.relatedTarget).data('contato');
                $(this).find('div.modal-body')
                        .empty()
                        .html('<div id="map-contato"></div>')
                        .find('div#map-contato');

                var LatLng = {lat: -25.363, lng: 131.044};

                // Create a map object and specify the DOM element for display.
                var map = new google.maps.Map(document.getElementById('map-contato'), {
                    center: LatLng,
                    scrollwheel: false,
                    zoom: 4
                });

                // Create a marker and set its position.
                var marker = new google.maps.Marker({
                    map: map,
                    position: LatLng,
                    title: contato.endereco
                });
            });
        });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsFXox4M2CXxu42YOku4rKSHBZdM4gCmo"></script>
@endsection