<?php

/*
|--------------------------------------------------------------------------
| Routes WEB
|--------------------------------------------------------------------------
|
| Di sini anda bisa membangun url / rute anda sendiri
| untuk parameter gunakkan $, misal : 
| 
| Web::url('edit/users/$id','ControllerName@function');
| 
*/

Web::url('detail-layanan/$id', 'OrdersController@toPage');
Web::url('login', 'Auth/AuthController@index');
Web::url('logout', 'Auth/AuthController@logout');

Web::url('ordermasuk', 'DashboardController@orderMasuk');
Web::url('orderselesai', 'DashboardController@orderSelesai');
