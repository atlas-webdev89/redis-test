<?php
define('REDIS', getenv('REDIS'));
require_once 'vendor/autoload.php';
try {

    $redis = new Predis\Client(
                    [
                        "scheme" => "tcp",
                        "host" => REDIS,
                        "port" => 6379
                    ]
            );
$redis->set("key", "data");
//$redis->expire("key", 60);



$stdout = fopen('php://stdout', 'w');
while($redis->exists("key")) {
    
            
                    fwrite($stdout, sprintf("Hello wordls\n"));
               
        sleep(1);
    }
     fclose($stdout);
}

catch (Exception $e) {

    echo ($e->getMessage());

}

