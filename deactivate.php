<?php
global $CONFIG;

// if user doesn't need stats tables to be kept
if ( elgg_get_plugin_setting('keep_tables', 'apiadmin') != 'on' ) {
    // delete stats tables
    run_sql_script("{$CONFIG->path}mod/apiadmin/schema/mysql_undo.sql");
}

// plugin can be deactivated
return true;
