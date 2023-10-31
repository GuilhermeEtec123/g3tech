

<p>Criado por: {{ $projeto->cliente->firstname }} {{ $projeto->cliente->lastname }}</p>

<p>{{$projeto->titulo}}</p>
<p> {{$projeto->orcamento}}</p>
<p>Descrição: {{ $projeto->descricao }}</p> 
<p>Prazo: {{ $projeto->prazo }} </p>
<p>Quantidade de prestadores: {{ $projeto->qtdPrestadores}}
<p>Data Atual: {{ $projeto->data_atual}}</p>
<p>Criado em: {{ $projeto->created_at}}</p>


 