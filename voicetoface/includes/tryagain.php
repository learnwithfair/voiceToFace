<?php
session_start();
$_SESSION['shows'] = $_SESSION['shows'] + 1;
echo $_SESSION['shows'];