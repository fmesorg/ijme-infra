metabase_db_file=metabase.db.mv.db


# <metabase>
stop_metabase:
	-pkill -f 'java -jar -Xmx512m metabase.jar'

start_metabase:
	cd metabase && nohup java -jar -Xmx512m  metabase.jar >> log/metabase.log 2>&1 &
# </metabase>