<?php 
session_start();
session_unset();
session_destroy();
header("Location:https://brandons-recipe-finder.herokuapp.com/");
?>