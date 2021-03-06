<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index');



// Route::get('/spams/receive/{from}/{to}/{text}/{char}/{code}/{time}/{smsc}', 'SpamsController@receive');//receiving messages
// Route::get('/spams/{spams}/delivery',										'SpamsController@delivery');//receiving delivery reports

Route::group(['middleware' => 'web'], function () {



	// Authentication routes...
	Auth::routes();
	// Route::post('login', 'AuthController@login');
	// Route::get('logout', 'AuthController@logout');
	// Route::get('login', 'AuthController@showLoginForm');
	// Registration routes...
	// Route::get('register', 'AuthController@getRegister');
	// Route::post('register', 'AuthController@postRegister');



		//Route::group(['middleware' => 'auth'], function () {



			//PAGES
			Route::get('/', 						'PagesController@home');
			Route::get('/syncgb', 					'PagesController@syncGb');
			Route::get('/syncrv', 					'PagesController@syncRv');
			// Route::get('/about', 					'PagesController@about');
			// Route::get('/test', 					'PagesController@test');//test
			// Route::get('/regenerateThumbnails', 	'PagesController@regenerateThumbnails');
			// Route::get('/send', 					'PagesController@send');
			// Route::get('/settings',					'PagesController@settingsShow');
			// Route::post('/settings',				'PagesController@settingsSave');
			// Route::get('/react',					'PagesController@react');



				//admin section
				// Route::get('/admin',				'PagesController@adminShow');
				// Route::get('/admin/phpinfo',		'PagesController@adminPhpinfoShow');
				// Route::get('/admin/users',			'PagesController@adminUsersShow');
				// Route::get('/admin/ldapusers',		'PagesController@getUsersFromLdap');
				// Route::get('/admin/syncldapusers',	'PagesController@syncUsersFromLdap');



			//RESOURCES

				//users
				Route::resource('/users',			'UsersController');
				// Route::get('/profile',				'UsersController@profile');

				// //wiki
				// Route::resource('/articles',		'ArticlesController');

				// //cases
				// Route::get('/cases/author',			'CasesController@author')->name('cases.author');
				// Route::resource('/cases',			'CasesController');
				Route::resource('/contragents',		'ContragentsController');
				Route::resource('/clients',			'ClientsController');
				// // Route::post('/cases',				'CasesController@store')->name('cases.store');
				// // Route::get('/cases',				'CasesController@index')->name('cases.index');
				// // Route::get('/cases/create',			'CasesController@create')->name('cases.create');
				// // Route::get('/cases/{cases}',		'CasesController@show')->name('cases.show');
				// // Route::delete('/cases/{cases}',		'CasesController@destroy')->name('cases.destroy');
				// // Route::match(['put', 'patch'], '/cases/{cases}', 'CasesController@update')->name('cases.update');
				// // Route::get('/cases/{cases}/edit',	'CasesController@edit')->name('cases.edit');


				// // Route::get('/cases/author',			'CasesController@casesAuthorOf');
				// // Route::get('/cases/performer',		'CasesController@casesPerformerOf');
				// // Route::get('/cases/member',			'CasesController@casesMemberOf');
				// // Route::get('/cases/new',			'CasesController@casesNew');
				// // Route::get('/cases/open',			'CasesController@casesOpen');
				// // Route::get('/cases/closed',			'CasesController@casesClosed');
				// 	//Route::patch('/cases/{cases}/updatePerformers', 'CasesController@updatePerformers')->name('cases.updatePerformers');
				// 	//Route::patch('/cases/{cases}/updateMembers', 	'CasesController@updateMembers')->name('cases.updateMembers');

				// //files
				// Route::resource('/files',			'FilesController');
				// 	Route::get('/getoriginal/{id}',		'FilesController@getOriginal');
				// 	Route::get('/getthumbnail/{id}',	'FilesController@getThumbnail');

				// //messages
				// Route::resource('/messages',		'MessagesController');

				// Route::resource('/sendings',						'SendingsController');
				// 	Route::post('/sendings/{sendings}/send',		'SendingsController@send');
				// Route::resource('/gateways',						'GatewaysController');
				// 	Route::post('/gateways/{gateways}',				'GatewaysController@restart');
				// 	Route::post('/gateways',						'GatewaysController@send');
				// 	Route::post('/gateways/{gateways}/balance',		'GatewaysController@checkbalance');
				// Route::resource('/modems',							'ModemsController');
				// 	Route::post('/modems/send',						'ModemsController@send');
				// Route::resource('/numbers',							'NumbersController');
				// Route::get('/numbersclean',							'NumbersController@clean2');
				// Route::resource('/rounds',							'RoundsController');
				// Route::resource('/operators',						'OperatorsController');
				// Route::post('/rounds/{rounds}/task',				'RoundsController@task');
				// Route::resource('/tasks',							'TasksController');
				// Route::resource('/spams',							'SpamsController');
				// Route::resource('/sets',							'SetsController');
		//});

});