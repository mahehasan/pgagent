

<?php
$Query_String  = explode("&", explode("?", $_SERVER['REQUEST_URI'])[1] );
print_r($Query_String);
die();
