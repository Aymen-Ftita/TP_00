<?php

require "../manager.class.php";
$M = new manager();
$M->delete();
header("Location:CRUD_Manager.php");
