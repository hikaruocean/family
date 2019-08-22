<?php
$config = new \stdClass();
$config->route = array(
    'defaultController' => 'Index',
    'defaultAction' => 'index',
    '404Controller' => 'Error',
    '404Action' => 'http404',
);
$config->autoloadNamespace = array(
    'Conpoz\\App\\' => APP_PATH . '/',
    'Conpoz\\App\\Controller\\' => APP_PATH . '/controller/',
    'Conpoz\\App\\Task\\' => APP_PATH . '/task/',
    'Conpoz\\App\\Model\\' => APP_PATH . '/model/',
    'Conpoz\\App\\Lib\\' => APP_PATH . '/lib/',
    'Conpoz\\App\\Middleware\\' => APP_PATH . '/middleware/',
    'Conpoz\\Core\\Lib\\' => CORE_PATH . '/lib/',
);
$config->db = array(
    'master' => array(
        'adapter' => 'mysql',
        'dbname' => 'hikaru',
        'host' => '127.0.0.1',
        'port' => '3306',
        'username' => 'root',
        'password' => 'qeksnopre'
    ),
    'slave' => array(
        array(
            'adapter' => 'mysql',
            'dbname' => 'hikaru',
            'host' => '127.0.0.1',
            'port' => '3306',
            'username' => 'root',
            'password' => 'qeksnopre'
        ),
        array(
            'adapter' => 'mysql',
            'dbname' => 'hikaru',
            'host' => '127.0.0.1',
            'port' => '3306',
            'username' => 'root',
            'password' => 'qeksnopre'
        ),
    )
);
$config->mem = array(
    'host' => '127.0.0.1',
    'port' => 11211,
);
$config->ACL = array(
    'publicRole' => 'guest',
    'publicResources' => array(
        array('Index', '*'),
        array('Error', '*'),
    ),
);

$config->GDFile = array(
    'wedding' => "https://docs.google.com/spreadsheets/d/e/2PACX-1vT1kmxAvpg9BN52ETemX3MqJqoEyQt2mDaAiUvjB8Mkx37veK84JG2-Blwf4Vf_s29GW3H7ovqbX-E2/pub?gid=0&single=true&output=csv",
    'daily' => "https://docs.google.com/spreadsheets/d/e/2PACX-1vRnbBMK4U4c0Ew-LBtgVSNDd9CDF3TMot7UtEydO9AlNOFw52uV0WmNm1bFraUl_yqHKwSfp_4UCBkZ/pub?gid=0&single=true&output=csv",
);
// $config->middlewareGroup = array(
//     'Cors',
//     'M1',
//     'M2',
// );
// $config->middlewareGroup2 = array(
//     'Cors',
//     'M1',
//     'M4',
//     'M2',
// );
// $config->middlewareBind = array(
//     '*' => 'M4',
//     'Index' => array(
//         '*' => $config->middlewareGroup,
//         'update' => 'M3',
//     ),
//     'Member' => array(
//         '*' => $config->middlewareGroup2,
//         'needLogin' => 'M1',
//     )
// );
return $config;
