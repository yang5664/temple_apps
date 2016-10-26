<?php

$router = app('admin.router');

$router->get('/', 'HomeController@index');

$router->resources([
  'op/temple' => TempleController::class,
  'op/subAccount' => SubAccountController::class,
  'op/news' => NewsController::class,
  'op/product' => ProductController::class
]);

//'news' => '最新消息',
//'festival' => '慶典',
//'introduce' => '宮廟介紹',
//'organization' => '組織圖',
//'events' => '大事記',
//'evolution' => '建廟沿革',
//'history' => '歷史緣由',
//'culture' => '特色文化',
//'building' => '建築藝術',
//'traffic' => '交通指南'
$router->resources([
  'singlePage/news' => SinglePageController::class,
  'singlePage/festival' => SinglePageController::class,
  'singlePage/introduce' => SinglePageController::class,
  'singlePage/organization' => SinglePageController::class,
  'singlePage/events' => SinglePageController::class,
  'singlePage/evolution' => SinglePageController::class,
  'singlePage/history' => SinglePageController::class,
  'singlePage/culture' => SinglePageController::class,
  'singlePage/building' => SinglePageController::class,
  'singlePage/traffic' => SinglePageController::class,
  'singlePage/qa' => SinglePageController::class,
]);
//$router->resource('singlePage/news', SinglePageController::class);