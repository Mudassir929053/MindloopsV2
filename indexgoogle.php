<?php
require_once 'config/connection.php';

if (isset($_SESSION['user_token'])) {
  header("Location: welcome.php");
} else {
  echo "<a href='" . $client->createAuthUrl() . "'>Google Login</a>";
}
