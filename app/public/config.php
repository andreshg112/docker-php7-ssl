<?php

/**
 * The user should be created requiring SSL like this:
 * GRANT ALL ON *.* TO ssl_user@'%' IDENTIFIED BY 'ssl_user' REQUIRE SSL;
 *
 * Step 10 in https://www.cyberciti.biz/faq/how-to-setup-mariadb-ssl-and-secure-connections-from-clients
 */
return array(
    'db_host' => 'db',
    'db_name' => 'laravel',
    'db_user' => 'ssl_user',
    'db_pass' => 'ssl_user',
);
