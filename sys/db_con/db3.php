<?PHP

                    $username = "root"; //mysql username
                    $password = ""; //mysql password
                    $hostname = "localhost"; //hostname
                    $databasename = 'gkms'; //databasename
                    $port = '8889'; //port

                    //connect to database
                    $mysqli = new mysqli($hostname, $username, $password, $databasename );

                    if ($mysqli->connect_error) { trigger_error('Database connection failed: '  . $mysqli->connect_error, E_USER_ERROR);
}

?>