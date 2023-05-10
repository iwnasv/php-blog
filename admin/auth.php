<?php
session_start();
$_SESSION["auth"] = 0; //asto etsi wste an kanei kapoios malakia enw einai authed na to xanei kiolas
if (isset($_POST["pw"])) {
  $PW = hash("sha512", $_POST["pw"]);
  if ($PW == "d39d92aef4419f826eca309325b1e2bd0a8b49c6bc52114822e2ab250b6893b19bd2ff768f1726ae7e9c3b70df5b99943fa4d5ad09dd51d1e41d777026b9077f") {
    echo "ur password is gοοd ;)";
    $_SESSION["auth"] = 1;
  } else {
    echo 'wrong password >:(';
  }
}
?>
