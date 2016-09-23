,

//##Nome##
[
'nome' => 'controle.##nome##.visualizar',
'metodo' => 'get',
'url' => 'controle/##nome##',
'destino' => 'Controle\##Nome##Controller@index',
'restrito' => true,
'categoria_transacao_id' => ##CATEGORIATRANSACAO##
],
[
'nome' => 'controle.##nome##.formulario',
'metodo' => 'get',
'url' => 'ccontrole/##nome##/formulario/{##nome##?}',
'destino' => 'Controle\##Nome##Controller@formulario',
'restrito' => true,
'categoria_transacao_id' => ##CATEGORIATRANSACAO##
],
[
'nome' => 'controle.##nome##.salvar',
'metodo' => 'post',
'url' => 'controle/##nome##/salvar',
'destino' => 'Controle\##Nome##Controller@salvar',
'restrito' => true,
'categoria_transacao_id' => ##CATEGORIATRANSACAO##
],
[
'nome' => 'controle.##nome##.editar',
'metodo' => 'post',
'url' => 'controle/##nome##/editar/{##nome##}',
'destino' => 'Controle\##Nome##Controller@editar',
'restrito' => true,
'categoria_transacao_id' => ##CATEGORIATRANSACAO##
],
[
'nome' => 'controle.##nome##.excluir',
'metodo' => 'get',
'url' => 'controle/##nome##/excluir/{##nome##}',
'destino' => 'Controle\##Nome##Controller@excluir',
'restrito' => true,
'categoria_transacao_id' => ##CATEGORIATRANSACAO##
]##NOVASROTAS##