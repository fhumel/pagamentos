<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->post('register', ['uses' => 'Users\UserController@create']);
$router->get('list', ['uses' => 'Users\UserController@list']);

$router->post('deposit', ['uses' => 'Users\Wallets\WalletController@deposit']);
$router->get('balance', ['uses' => 'Users\Wallets\WalletController@balance']);

$router->post('transaction', ['uses' => 'Users\Wallets\Transactions\TransactionController@pay']);
$router->get('transaction', ['uses' => 'Users\Wallets\Transactions\TransactionController@list']);
