<?php

$dbc= mysqli_connect('localhost','iamkarsoftdb','lollypop28','idamu_db');


/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}



/* change db to world db */
mysqli_select_db($dbc, "casa");




?>
