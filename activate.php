<?php
global $CONFIG;

// create the tables for API stats
run_sql_script("{$CONFIG->path}mod/apiadmin/schema/mysql.sql");

// plugin can be activated
return true;