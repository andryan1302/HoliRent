<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'as' => 'customer.',
],function(){
    Route::namespace('auth')->group(function(){
            Route::get('/','CustomerController@viewlogin')
                ->name('view.login');
            Route::post('login','CustomerController@login')
                ->name('login');
            Route::post('register','CustomerController@register')
                ->name('register');
            Route::get('logout','CustomerController@logout')
                ->name('logout')->middleware('auth:customer');
    });
    Route::group([
        'namespace' => 'customer',
        'middleware' => 'auth:customer',
    ],function(){
        Route::get('home','HomeController@index')
            ->name('home');
        Route::get('cart','HomeController@cart')
            ->name('cart');
        Route::get('history','HomeController@history')
            ->name('history');
        Route::post('bayar','HomeController@bayar')
            ->name('bayar');
        Route::get('konfirmasi/{id}','HomeController@konfirmasi')
            ->name('konfirmasi');
        Route::post('konfirmasi','HomeController@konfirmasiAction')
            ->name('konfirmasi.action');
        Route::post('checkout','HomeController@checkout')
            ->name('checkout'); 
        Route::delete('delete/{id}','HomeController@delete')
            ->name('delete');
    });
});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
],function(){
    Route::namespace('auth')->group(function(){
        Route::get('/','AdminController@viewlogin')
            ->name('view.login');
        Route::post('login','AdminController@login')
            ->name('login');
        Route::get('logout','AdminController@logout')
            ->name('logout')->middleware('auth.admin:admin');
    });
    Route::group([
        'namespace' => 'admin',
        'middleware' => 'auth.admin:admin'
    ],function(){
        Route::get('dashboard','DashboardController@viewdashboard')
            ->name('view.dashboard');
        Route::group([
            'prefix' => 'customer',
        ],function(){
            Route::get('/','CustomerController@index')
                ->name('customer');
            Route::get('edit/{id}','CustomerController@edit')
                ->name('customer.edit');   
            Route::put('update/{id}','CustomerController@update')
                ->name('customer.update');
            Route::delete('delete/{id}','CustomerController@destroy')
                ->name('customer.delete');
            Route::patch('active/{id}','CustomerController@setactive')
                ->name('customer.active');
            Route::patch('nonactive/{id}','CustomerController@setnonactive')
                ->name('customer.nonactive');
            Route::get('search','CustomerController@show')
                ->name('customer.search');   
        });
        Route::group([
            'prefix' => 'supplier'
        ],function(){
            Route::get('/','SupplierController@index')
                ->name('supplier');
            Route::get('/request','SupplierController@requestSupplier')
                ->name('supplier.request');
            Route::get('edit/{id}','SupplierController@edit')
                ->name('supplier.edit');   
            Route::get('accept/{id}','SupplierController@acceptrequest')
                ->name('supplier.req.accept');   
            Route::put('update/{id}','SupplierController@update')
                ->name('supplier.update');
            Route::delete('delete/{id}','SupplierController@destroy')
                ->name('supplier.delete');
            Route::delete('delete/bus/{id}','SupplierController@destroybus')
                ->name('supplier.bus.delete');
            Route::get('{id}/bus','SupplierController@viewbus')
                ->name('supplier.viewbus');
            Route::get('search','SupplierController@show')
                ->name('supplier.search');
            Route::get('reqsearch','SupplierController@showrequest')
                ->name('supplier.req.search');
        });
        Route::group([
            'prefix' => 'transaction'
        ],function(){
            Route::get('/','TransactionController@index')
                ->name('transaction');
            Route::put('/proses/{id}','TransactionController@proses')
                ->name('transaction.proses');
            Route::put('/decline/{id}','TransactionController@decline')
                ->name('transaction.decline');
        });
        Route::group([
            'prefix' => 'history'
        ],function(){
            Route::get('/','HistoryController@index')
                ->name('history');
        });
    });
});

Route::group([
    'as' => 'supplier.',
    'prefix' => 'supplier'
],function(){
    Route::namespace('auth')->group(function(){
        Route::get('/','SupplierController@viewlogin')
            ->name('view.login');
        Route::get('/register','SupplierController@viewregis')
            ->name('view.regis');
        Route::post('login','SupplierController@login')
            ->name('login');
        Route::post('regis','SupplierController@regis')
            ->name('regis');
        Route::get('logout','SupplierController@logout')
            ->name('logout')->middleware('auth:supplier');
    });
    Route::group([
        'namespace' => 'supplier',
        'middleware' => ['auth:supplier','checkstat'],
    ],function(){
        Route::get('dashboard','SupplierController@viewdashboard')
            ->name('view.dashboard');
        Route::group([
            'prefix' => 'bus',
        ],function(){
            Route::get('/','BusController@index')
                ->name('bus');
            Route::post('/add','BusController@store')
                ->name('bus.add');
            Route::get('/edit/{id}','BusController@edit')
                ->name('bus.edit');
            Route::put('/update/{id}','BusController@update')
                ->name('bus.update');
            Route::delete('/delete/{id}','BusController@destroy')
                ->name('bus.delete');
            Route::get('search','BusController@show')
                ->name('bus.search');
        });
        Route::group([
            'prefix' => 'transaction',
        ],function(){
            Route::get('/','TransactionController@index')
                ->name('transaction');
            Route::put('/proses/{id}','TransactionController@proses')
                ->name('transaction.proses');
            Route::put('/decline/{id}','TransactionController@decline')
                ->name('transaction.decline');
        });
        Route::group([
            'prefix' => 'history',
        ],function(){
            Route::get('/','HistoryController@index')
                ->name('history');
        });
    });
});