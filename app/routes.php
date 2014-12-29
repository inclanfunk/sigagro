<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function() { return View::make('login');});
Route::get('/login', function() { return View::make('login');});
Route::post('/loginPost' , 'LoginController@loginpost');
Route::get('/logout' , 'LoginController@logout');


Route::group(['before' => 'auth'] , function(){
	// dashboard
	Route::resource('dashboard','DashboardController'); // Dashboard
	Route::get('sadmin/user_create','UserCreatorController@showForm'); // User Managment
	Route::post('sadmin/user_create','UserCreatorController@sendForm'); // User Managment
	Route::resource('users' , 'UserManagmentController');
	Route::resource('farms' , 'FarmManagmentController');
	Route::resource('profile' , 'ProfileManagmentController');
	//equipments
	Route::resource('farms' , 'FarmManagmentController');
	Route::resource('equipment' , 'EquipmentManagerController');
	//calendar
	Route::resource('calendar' , 'CalendarController');


	/*  Ajax Works  */
	Route::get('api/apicreate','ApiController@userDrop'); // kullanıcı eklerken ajax işlemi dropdown

});






Route::get('/createuser' , function(){
	//Sentry::createUser()
});




Route::get('/giveperm' , function(){


	$user = Sentry::findUserById(1);
	$f_name = $user->first_name;

	$adminGroup = Sentry::findGroupById(5);

	$oldu =	$user->addGroup($adminGroup);

	echo $f_name;

	if($oldu) { echo 'oldu' ; }
		else { dd($oldu);}

	$sadmin = Sentry::findGroupByName('Admin');

	if ($user->inGroup($sadmin)) {  echo 'bu Super Admin';  } else { echo 'GO GO GO'; }



});



Route::get('/grup' , function(){

	Sentry::getGroupProvider()->create(array(
		'name'        => 'Super_Admin',
		'permissions' => array(
			'system' => 1,
		),
	));

	Sentry::getGroupProvider()->create(array(
		'name'        => 'Admin',
		'permissions' => array(
			'system.articles' => 1,
		),
	));

	Sentry::getGroupProvider()->create(array(
		'name'        => 'Client',
		'permissions' => array(
			'system.articles.add' => 1,
			'system.articles.edit' => 1,
			'system.articles.delete' => 1,
			'system.articles.publish' => 1,
		),
	));

	Sentry::getGroupProvider()->create(array(
		'name'        => 'Editor',
		'permissions' => array(
			'system.articles.add' => 1,
			'system.articles.edit' => 1,
			'system.articles.delete' => 1,
		),
	));

	Sentry::getGroupProvider()->create(array(
		'name'        => 'Viewer',
		'permissions' => array(
			'system.articles.add' => 1,
			'system.articles.edit' => 1,
			'system.articles.delete' => 1,
		),
	));

	Sentry::getGroupProvider()->create(array(
		'name'        => 'Advisor',
		'permissions' => array(
			'system.articles.add' => 1,
			'system.articles.edit' => 1,
			'system.articles.delete' => 1,
		),
	));




});
