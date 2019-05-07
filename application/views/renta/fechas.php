<?php
/*defined('BASEPATH') OR exit('No direct script access allowed');*/
$start_ts = strtotime($_POST['fechaI']); 

$end_ts = strtotime($_POST['fechaF']); 

$interval = $end_ts - $start_ts;
/* echo $interval;  */
