### Sistema de Alertas

Exemplo de request para mudar status do ping:

    curl -s -d 'consumer_key=123&ping_status=Up&ip=10.0.0.1&ping_date=2021-06-20 18:06:30' -X POST http://127.0.0.1:8000/api/ping/