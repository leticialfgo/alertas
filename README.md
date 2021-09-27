### Sistema de Alertas

Exemplo de request para mudar status do ping:


    curl --include --header "Authorization: 123" \
    -X POST -H "Content-Type: application/json" --data \
    '{"ping_status": "Up","ip": "8.8.1.1","ping_date": "2021-06-20"}' \
    http://127.0.0.1:8000/api/ping/