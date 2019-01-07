#!/usr/bin/env bash
set -e

BACKUP_DIR=~/backup  #local backup directory
LOG_FILE=${BACKUP_DIR}/log/backup_$(date +%a).log
S3_BACKUP_DIRNAME=ijme

echo "" > ${LOG_FILE}

BACKUP_FILE=${BACKUP_DIR}/ijme_$(date +%a).sql
BACKUP_FILE_YDAY=${BACKUP_DIR}/ijme_$(date --date="yesterday" +%a).sql
S3_PATH=s3://samanvay/client-backups/${S3_BACKUP_DIRNAME}

echo "[$(date)] Backing up Mysql all databases to '${BACKUP_FILE}' ..." &>> ${LOG_FILE}
mysqldump --user=root --password=password --all-databases > ${BACKUP_FILE}   #change to mysql
echo "[$(date)] Mysql All Database backup complete" &>> ${LOG_FILE}

echo "[$(date)] Syncing to S3 ..." &>> ${LOG_FILE}
aws s3 sync --no-progress ${BACKUP_DIR} ${S3_PATH} &>> ${LOG_FILE}
echo "[$(date)] Sync done!" &>> ${LOG_FILE}

echo "[$(date)] Verifying Mysql dump size..." &>> ${LOG_FILE}
FILE_SIZE=$(stat --printf="%s" ${BACKUP_FILE})
if [[ ${FILE_SIZE} == 0 || (-e ${BACKUP_FILE_YDAY} && ${FILE_SIZE} < $(stat --printf="%s" ${BACKUP_FILE_YDAY})) ]];
then
    echo "[$(date)] Backed up file's size ${FILE_SIZE} less than previous day" &>> ${LOG_FILE} ;
    exit 1;
else
    echo "[$(date)] File size ${FILE_SIZE} okay" &>> ${LOG_FILE}
fi

