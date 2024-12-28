#!/bin/bash

# Crear directorio de log y el archivo si no existen
mkdir -p /var/log
touch /var/log/cron_output.log
chmod 644 /var/log/cron_output.log

# Iniciar el servicio cron
service cron start

# Ver los logs de cron
tail -f /var/log/cron_output.log
cro