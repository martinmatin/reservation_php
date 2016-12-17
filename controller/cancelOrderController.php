<?php

session_start() ;
session_destroy(); 

require  '../view/view.php';



$view = new View();
echo $view->render('cancel_order.php', array());

?>
