<?php

class mysqli_helper extends mysqli
{
  public function __construct($host, $user, $pass, $db, $port, $socket)
  {
    parent::init();

    // Work both ways
    // parent::ssl_set(null, null, '/etc/ssl/newcerts/ca-cert.pem', null, null);

    parent::ssl_set(
      '/etc/ssl/newcerts/client-key.pem',
      '/etc/ssl/newcerts/client-cert.pem',
      '/etc/ssl/newcerts/ca-cert.pem',
      '/etc/ssl/newcerts',
      null
    );

    // parent::ssl_set(null, null, null, '/etc/ssl/newcerts/', null);

    if (!parent::real_connect($host, $user, $pass, $db, $port, $socket)) {
      die(mysqli_connect_errno() . ': ' . mysqli_connect_error());
    }
  }
}
