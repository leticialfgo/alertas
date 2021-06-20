#!/bin/bash

url='http://127.0.0.1:8000'
ips=$(curl -s ${url}/api/ips)


echo $a | sed  "s/\\[//g"

ip='143.108.8.8'

if ping -c1 $ip;
then
    echo "Unit ${ip} is online"
else
    echo "Unit ${i} is offline"
fi

