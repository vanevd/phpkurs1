<?php

function get_row_template($template, $table_name) {
    $table_start_pos = strpos($template, '{table ' . $table_name . '}');
    $table_end_pos = strpos($template, '{/table ' . $table_name . '}');    
    $table_row_template = substr($template, $table_start_pos + strlen('{table ' . $table_name . '}'), $table_end_pos - $table_start_pos - strlen('{table ' . $table_name . '}'));
    return $table_row_template;
}

function replace_table($template, $table_name, $table_contents) {
    $table_start_pos = strpos($template, '{table ' . $table_name . '}');
    $table_end_pos = strpos($template, '{/table ' . $table_name . '}');    
    $template = substr($template, 0, $table_start_pos) . $table_contents . substr($template, $table_end_pos + strlen('{/table ' . $table_name . '}'), strlen($template) - $table_end_pos);
    return $template;
}