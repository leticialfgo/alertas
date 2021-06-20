Prezados(as),

Estamos sem comunicação com os seguintes equipamentos:

<ul>
@foreach($equipamentos as $equipamento)
    <li>{{ $equipamento->ip }} - {{ $equipamento->nome }} (fora desde {{ $equipamento->ping_date }})</li>
@endforeach
</ul>

Solicitamos urgência na resolução dos problemas.

Dentro de 24 horas se o problema não for solucionado enviaremos outro email.

<br>
---
Mensagem automática
Seção Técnica de Informática
FFLCH-USP