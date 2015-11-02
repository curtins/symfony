<?php

if ( !isset($_REQUEST['term']) )
    exit;

$dblink = mysql_connect('localhost', 'root', 'password') or die( mysql_error() );
mysql_select_db('baseball');

$rs = mysql_query('select nameLast, nameFirst, birthYear, playerID from Master where nameLast like "'. mysql_real_escape_string($_REQUEST['term']) .'%" order by nameLast asc limit 0,40', $dblink);

$data = array();
if ( $rs && mysql_num_rows($rs) )
{
    while( $row = mysql_fetch_array($rs, MYSQL_ASSOC) )
    {
        $data[] = array(
            'label' => $row['nameLast'] .', '. $row['nameFirst'] .' '. $row['birthYear'] ,
            'value' => $row['playerID']
        );
    }
}

echo json_encode($data);
flush();

