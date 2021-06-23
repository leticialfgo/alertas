Prezados(as),

Estamos sem comunicação com os seguintes equipamentos:<br>

<ul>
@foreach($equipamentos as $equipamento)
    <li>{{ $equipamento->ip }} - {{ $equipamento->nome }} (fora desde {{ $equipamento->ping_date }})</li>
@endforeach
</ul>

<br>
Solicitamos urgência na resolução dos problemas.

<br>
Dentro de 24 horas se o problema não for solucionado enviaremos outro email.
<br>
---
Mensagem automática<br>
Seção Técnica de Informática<br>
FFLCH-USP<br>