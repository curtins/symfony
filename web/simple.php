<!DOCTYPE html>
<html>

<head>
<script   src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link     rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script   src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

</head>


<body>

<h1>My first PHP page</h1>

<?php
echo "Hello World!";
// if the 'term' variable is not sent with the request, exit
if ( !isset($_REQUEST['term']) )
        exit;
 
// connect to the database server and select the appropriate database for use
$dblink = mysql_connect('localhost', 'root', 'password') or die( mysql_error() );
mysql_select_db('baseball');
 
// query the database table for zip codes that match 'term'
$rs = mysql_query('select nameLast, nameFirst, birthYear, playerID from people where nameLast like "'. mysql_real_escape_string($_REQUEST['term']) .'%" order by nameFirst asc limit 0,10', $dblink);
 
// loop through each zipcode returned and format the response for jQuery
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
 
// jQuery wants JSON data
echo json_encode($data);
flush();






















?>

</body>
</html>