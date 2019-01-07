#!/usr/bin/env bash

if [[ $(id -u) -ne 0 ]] ; then echo "root/sudo privileges required" ; exit 1 ; fi

USER=root
CRON_FILE=/var/spool/cron/crontabs/${USER}
THIS_DIR=$(readlink -f $(dirname "$0"))
#SCRIPTS_DIR=
#PROJECT_DIR=$(dirname ${SCRIPTS_DIR})

read -p "Name of backup directory in S3: " S3_BACKUP_DIRNAME
read -p "HEALTH_CHECK_UUID = " HEALTHCHECK_UUID
read -p "SCRIPTS_DIR = " SCRIPTS_DIR

echo "PATH=/usr/bin:/bin:/usr/sbin:/sbin:/usr/local/bin
LD_LIBRARY_PATH=/usr/local/lib
S3_BACKUP_DIRNAME=${S3_BACKUP_DIRNAME}" > ${CRON_FILE}

# 2am daily all dbs
# make sure to set HEALTHCHECK_UUID when running this script
echo "*/2 * * * * ${SCRIPTS_DIR}/take-db-backup.sh && curl --retry 3 https://hc-ping.com/${HEALTHCHECK_UUID}" >> ${CRON_FILE}
chown ${USER}:crontab ${CRON_FILE}
chmod 600 ${CRON_FILE}
echo "Generated ${CRON_FILE}"

sudo service cron reload
