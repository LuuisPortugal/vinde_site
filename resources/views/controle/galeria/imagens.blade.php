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
                    <div id="alertUpload" class="alert alert-success" style="display: none;text-align: center">Aguarde
                        enquanto atualiza as informações
                    </div>
                    <div class="clearfix"></div>
                    <!-- start form for validation -->
                    {!! Form::model(isset($galeria)?$galeria:null, ['route' => ['controle.galeria.salvar', (isset($galeria)?$galeria->id:null)], 'class' => 'form-horizontal form-label-left', 'files' => true]) !!}
                    <div class="form-group">
                        {!! Form::label('nome', 'Nome', ['class' => 'sr-only control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            {!! Form::file('imagem[]', ['id' => 'fileinput', 'multiple']) !!}
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
    <script>
        if ($('#fileinput').length) {
            var $input = $("#fileinput");
            $("#fileinput").fileinput({
                language: "pt-BR",
                uploadUrl: '{{ route('controle.galeria.upload') }}',
                uploadAsync: true,
                uploadExtraData: {
                    galeria_id: {{ $galeria->id }},
                    _token: '{{ csrf_token() }}'
                },
                allowedFileExtensions: ["jpg", "png", "gif"],
            }).on('filebatchuploadcomplete', function () {
                $('#formUpload').hide('fast');
                $('#alertUpload').show('slow');
                window.setTimeout(function () {
                    window.location.reload();
                }, 2000);
            });

            $('input.tipo').on('ifChecked', function () {
                var id = $(this).attr('data-id');
                var tipo_id = $(this).val();
                if (id) {
                    $.ajax({
                        url: '#',
                        type: 'POST',
                        data: {id: id, tipo_id: tipo_id, _token: 'c6tqBHHdEbMfePvjr9RlBdRGYRBTc7yjuoh7bnbu'},
                    });
                }
            });
        }
    </script>
@endsection