<?php
/* connect database test */
@$dbc = mysqli_connect("localhost", "iamkarsoftdb", "lollypop28", "idamu_db");

/* check connection */
if (!$dbc) {
@$dbc = mysqli_connect("localhost", "root", "lollypop28", "casa");

}



?>
