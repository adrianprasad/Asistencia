<?php
    $cols_needed = Array("id", "name");
    $department_list = $db_connection->get("department_list", null, $cols_needed);
    if ($db_connection->count > 0){
        foreach ($department_list as $department) { 
            echo "<option value='{$department['name']}'>{$department['name']}</option>";
        }
    }
?>