<?php
Route::group([
    'middleware' => 'IsAdmin',
    'prefix'     => 'admin',
    'namespace'  => 'Admin',
    'as'         => 'admin.',
], function () {
    Route::get('dashboard', 'HomeController@index')->name('dashboard');
    //manager Products
    Route::get('products', 'ProductController@index')->name('products.index');
    Route::get('products/{product}/detail', 'ProductController@detailProductId')->name('product.detail');
    Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit');
    Route::get('products/{product}/productSizes/create', 'ProductController@createProductSize')->name('products.createProductSize');
    Route::post('products/{product}/productSizes/store', 'ProductController@storeProductSize')->name('products.storeProductSize');
    // Route::get('products', 'ProductController@addStore')->name('products.addStore');
    Route::get('products/create', 'ProductController@create')->name('product.create');
    Route::post('products', 'ProductController@store')->name('product.store');
    Route::put('products/{product}', 'ProductController@update')->name('products.update');



    //Manger Image
    Route::get('images', 'ImageController@index')->name('image.index');

    //Manage ProductSize
    Route::get('productsizes', 'ProductSizeController@index')->name('productsize.index');
    Route::get('productsizes/{id}/edit', 'ProductSizeController@edit')->name('productsize.edit');
    Route::post('productsizes/{id}/update', 'ProductSizeController@update')->name('productsize.update');
    Route::delete('productsizes/{id}', 'ProductController@destroy')->name('product.destroy');


    //Order
    Route::get('orders', 'OrderController@index')->name('orders.index');
    Route::delete('order/{id}', 'OrderController@destroy')->name('order.destroy');
    Route::get('orders/{order}', 'OrderController@show')->name('orders.show');
    Route::put('orders/{order}/status', 'OrderController@updateStatus')->name('orders.update.status');



    //User
    Route::get('users/admin', 'UserController@indexAdmin')->name('user.indexadmin');
    Route::get('users/user', 'UserController@index')->name('user.index');
    Route::get('user/create', 'UserController@create')->name('user.create');
    Route::post('users', 'UserController@store')->name('user.store');
    Route::get('users/{user}/edit', 'UserController@edit')->name('user.edit');
    Route::post('users/{user}', 'UserController@update')->name('user.update');
    Route::delete('users/{id}', 'UserController@destroy')->name('user.delete');

    //Category
    Route::get('categories', 'CategoryController@index')->name('categories.index');
    Route::delete('categories/{category}', 'CategoryController@destroy')->name('categories.delete');
    Route::get('categories/create', 'CategoryController@create')->name('categories.create');
    Route::post('categories', 'CategoryController@store')->name('categories.store');

    //Search
    Route::get('users/search', 'UserController@getSearch')->name('user.search');

    //Comment
    Route::get('comments', 'CommentController@index')->name('comments.index');
});
Route::group([
    'middleware' => 'IsManager',
    'prefix'     => 'manager',
    'namespace'  => 'Manager',
    'as'         => 'manager.',
], function () {
    Route::get('dashboard', 'HomeController@index')->name('dashboard');
    //manager Products
    Route::get('products', 'ProductController@index')->name('products.index');
    Route::get('products/{product}/detail', 'ProductController@detailProductId')->name('product.detail');
    Route::get('products/{product}/edit', 'ProductController@edit')->name('products.edit');
    Route::get('products/{product}/productSizes/create', 'ProductController@createProductSize')->name('products.createProductSize');
    Route::post('products/{product}/productSizes/store', 'ProductController@storeProductSize')->name('products.storeProductSize');
    // Route::get('products', 'ProductController@addStore')->name('products.addStore');
    Route::get('products/create', 'ProductController@create')->name('product.create');
    Route::post('products', 'ProductController@store')->name('product.store');
    Route::put('products/{product}', 'ProductController@update')->name('products.update');



    //Manger Image
    Route::get('images', 'ImageController@index')->name('image.index');

    //Manage ProductSize
    Route::get('productsizes', 'ProductSizeController@index')->name('productsize.index');
    Route::get('productsizes/{id}/edit', 'ProductSizeController@edit')->name('productsize.edit');
    Route::post('productsizes/{id}/update', 'ProductSizeController@update')->name('productsize.update');
    Route::delete('productsizes/{id}', 'ProductController@destroy')->name('product.destroy');


    //Order
    Route::get('orders', 'OrderController@index')->name('orders.index');
    Route::delete('order/{id}', 'OrderController@destroy')->name('order.destroy');
    Route::get('orders/{order}', 'OrderController@show')->name('orders.show');
    Route::put('orders/{order}/status', 'OrderController@updateStatus')->name('orders.update.status');
});
Route::group([
    'middleware' => 'IsShipper',
    'prefix'     => 'shipper',
    'namespace'  => 'Shipper',
    'as'         => 'shipper.',
], function () {
    Route::get('dashboard', 'HomeController@index')->name('dashboard');
    //Order
    Route::get('orders', 'OrderController@index')->name('orders.index');
    Route::get('orders/{order}', 'OrderController@show')->name('orders.show');
    Route::put('orders/{order}/status', 'OrderController@updateStatus')->name('orders.update.status');
});

//profile
Route::get('/profile/','UserController@indexuser')->name('profile.index');
Route::put('/profile/{id}','UserController@update_profile_manager')->name('update_profile_manager');

//Cart
Route::get('cart', 'CartController@index')->name('cart.index');

Route::get('products/{product}', 'ProductController@show')->name('products.show');
Route::post('/addCart/{id}', 'CartController@addCart')->name('cart.add');
Route::post('/updateCart', 'CartController@updateCart')->name('cart.update');
Route::get('/removeCart/{id}','CartController@removeCart')->name('cart.remove');
Route::get('/checkout', 'CartController@checkout')->name('cart.checkout');
Route::post('/orderPay', 'CartController@orderPay')->name('orderPay');

//Search
Route::get('search', 'SearchController@index')->name('search');

//order manager
Route::get('/order_manager/','HomeController@order_manager')->name('order_manager');
Route::get('/order_manager/detail/{id}','HomeController@order_manager_detail')->name('order_manager_detail');


//Category
Route::get('categories', 'CategoryController@index')->name('categories.index');

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();


