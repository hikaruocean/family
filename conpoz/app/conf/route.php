<?php

$dispatcher = \FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '', 'Index::index');
    $r->addRoute('GET', '/wedding', 'Index::wedding');
    $r->addRoute('GET', '/daily', 'Index::daily');
    $r->addRoute('GET', '/portrait', 'Index::portrait');
    $r->addRoute('GET', '/score', 'Game::score');
    $r->addRoute('GET', '/scoreStream', 'Game::mjpeg');
    $r->addRoute('GET', '/api/setScore', 'Game::setScore');
    // {id} must be a number (\d+)
    // $r->addRoute('GET', '/user/{id:\d+}', 'Index::index');
    // The /{title} suffix is optional
    // $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
});

return $dispatcher;
