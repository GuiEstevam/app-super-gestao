<h3> Fornecedores </h3>

@php

@endphp

@isset($fornecedores)

   @forelse($fornecedores as $indice => $fornecedor)
    Iteração atual:{{ $loop->iteration}}<br>
        Fornecedor: {{$fornecedor['nome']}}
        <br>
        Status: {{$fornecedor['status']}}
        <br>   
        CNPJ: {{$fornecedor['cnpj'] ?? 'Esse dado não está disponível'}}
        <br>
        Telefone: ({{$fornecedor['ddd'] ?? 'Esse dado não está disponível'}}) {{$fornecedor['telefone'] ?? 'Esse dado não está disponível'}}
        <br>
        @if($loop->last)
           Quantidade de registros:{{$loop->count}}
        @endif
        <hr>

    @empty
        Não existem fornecedores cadastrados
    @endforelse
@endisset

<br>
