<?php
$db_connection = new MysqliDb(
    $env_db_credentials['host'], 
    $env_db_credentials['username'],
    $env_db_credentials['password'],
    $env_db_credentials['database']
);

