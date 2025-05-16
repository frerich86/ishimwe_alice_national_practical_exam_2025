<?php
session_start();
session_destroy();
// Redirect to the login page
  echo "<script>alert('You have been logged out.');</script>";
  echo "<script>window.location.href='index.php';</script>";
  ?>