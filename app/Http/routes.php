<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// home.people
Route::get('/{status?}', ['as' => 'home.people.index', 'uses' => 'Home\PersonController@index'])->where('status','|looking_for_their_families');
Route::get('/print/{id}', ['as' => 'home.people.showForPrint', 'uses' => 'Home\PersonController@showForPrint']);

// home.people.create
Route::get('/report/{status?}', ['as' => 'home.people.create', 'uses' => 'Home\PersonController@create'])->where('status', '|missing|found');
Route::post('/report/{status}', ['as' => 'home.people.store', 'uses' => 'Home\PersonController@store'])->where('status', 'missing|found')->middleware('throttle:2,1440');
Route::get('/report/successful/{status}', ['as' => 'home.people.create.successful', 'uses' => 'Home\PersonController@successfulCreate'])->where('status', 'missing|found');

// home.people.contributions
Route::get('/contributions/{id}', ['as' => 'home.people.contributions.create', 'uses' => 'Home\ContributionController@create']);
Route::post('/contributions/{id}', ['as' => 'home.people.contributions.store', 'uses' => 'Home\ContributionController@store'])->middleware('throttle:2,1440');
Route::get('/contributions/successful/{id}', ['as' => 'home.people.contributions.create.successful', 'uses' => 'Home\ContributionController@successfulCreate']);

// home.footer
Route::get('/collaborators', ['as' => 'home.collaborators', 'uses' => 'Home\HomeController@collaborators']);
Route::get('/privacy', ['as' => 'home.privacy', 'uses' => 'Home\HomeController@privacy']);
Route::get('/terms', ['as' => 'home.terms', 'uses' => 'Home\HomeController@terms']);

// home.subscribers
Route::get('/subscribe/successful', ['as' => 'home.subscribers.subscribe.successful', 'uses' => 'Home\SubscriberController@successfulSubscribe']);
Route::get('/unsubscribe/successful', ['as' => 'home.subscribers.unsubscribe.successful', 'uses' => 'Home\SubscriberController@successfulUnsubscribe']);
Route::get('/subscribe/{email?}', ['as' => 'home.subscribers.subscribe', 'uses' => 'Home\SubscriberController@subscribe']);
Route::post('/subscribe', ['as' => 'home.subscribers.store', 'uses' => 'Home\SubscriberController@store']);#->middleware('throttle:2,1440');
Route::post('/footer-subscribe', ['as' => 'home.subscribers.footerStore', 'uses' => 'Home\SubscriberController@footerStore']);#->middleware('throttle:2,1440');
Route::get('/unsubscribe/{email?}', ['as' => 'home.subscribers.unsubscribe', 'uses' => 'Home\SubscriberController@unsubscribe']);
Route::delete('/unsubscribe', ['as' => 'home.subscribers.delete', 'uses' => 'Home\SubscriberController@destroy']);

// home.suggestions
Route::get('/suggestion', ['as' => 'home.suggestions.create', 'uses' => 'Home\SuggestionController@create']);
Route::post('/suggestion', ['as' => 'home.suggestions.store', 'uses' => 'Home\SuggestionController@store']);//->middleware('throttle:2,1440');
Route::get('/suggestion/successful', ['as' => 'home.suggestions.successful', 'uses' => 'Home\SuggestionController@successful']);

// home.developers
Route::get('/developers', ['as' => 'home.developers.create', 'uses' => 'Home\DeveloperController@create']);
Route::post('/developers', ['as' => 'home.developers.store', 'uses' => 'Home\DeveloperController@store']);
Route::get('/developers/successful', ['as' => 'home.developers.successful', 'uses' => 'Home\DeveloperController@successful']);

// home.others
Route::get('/recommendations', ['as' => 'home.recommendations', 'uses' => 'Home\HomeController@recommendations']);
Route::get('/map', ['as' => 'home.map', 'uses' => 'Home\HomeController@map']);

// panel
Route::post('/panel/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);
Route::get('/panel/login', ['as' => 'auth.login.index', 'uses' => 'Auth\AuthController@showLoginForm']);
Route::get('/panel/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);
Route::post('/panel/password/email', ['as' => 'auth.password.email', 'uses' => 'Auth\PasswordController@sendResetLinkEmail']);
Route::post('/panel/password/reset', ['as' => 'auth.password.reset', 'uses' => 'Auth\PasswordController@reset']);
Route::get('/panel/password/reset/{token?}', ['as' => 'auth.password.reset.index', 'uses' => 'Auth\PasswordController@showResetForm']);

// panel.index
Route::get('/panel', ['as' => 'panel.index', 'uses' => 'Panel\PanelController@index']);

// panel models
if (getenv('LOCATION_MODE') == 'countries') {
  Route::resource('/panel/countries', 'Panel\CountryController');
}
Route::resource('/panel/provinces', 'Panel\ProvinceController');
Route::resource('/panel/users', 'Panel\UserController');
Route::resource('/panel/subscribers', 'Panel\SubscriberController');
Route::resource('/panel/suggestions', 'Panel\SuggestionController');
Route::resource('/panel/collaborators', 'Panel\CollaboratorController');
Route::resource('/panel/contact-details', 'Panel\ContactDetailController', ['except' => ['show', 'delete']]);
Route::get('/panel/stats', ['as' => 'panel.stats.index', 'uses' => 'Panel\StatController@index']);

// users.password
Route::get('/panel/users/password/{id}', ['as' => 'panel.users.password.edit', 'uses' => 'Panel\UserController@password']);
Route::post('/panel/users/password/{id}', ['as' => 'panel.users.password.update', 'uses' => 'Panel\UserController@updatePassword']);

// people.index
Route::get('/panel/people/status/{status}', ['as' => 'panel.people.index', 'uses' => 'Panel\PersonController@index']);

// people.image
Route::get('/panel/people/image/{id}', ['as' => 'panel.people.image.external', 'uses' => 'Panel\PersonController@updateImageExternally']);
Route::post('/panel/people/image/local/{id}', ['as' => 'panel.people.image.local', 'uses' => 'Panel\PersonController@updateImageLocally']);

// people.location
Route::get('/panel/people/location/{id}', ['as' => 'panel.people.location.edit', 'uses' => 'Panel\PersonController@location']);
Route::post('/panel/people/location/{id}', ['as' => 'panel.people.location.store', 'uses' => 'Panel\PersonController@storeLocation']);

// people.comments
Route::post('/panel/people/comments/{id}', ['as' => 'panel.people.comments', 'uses' => 'Panel\PersonController@storeComment']);
Route::post('/panel/people/comments/{id}/edit', ['as' => 'panel.people.comments.edit', 'uses' => 'Panel\PersonController@updateComment']);
Route::delete('/panel/people/comments/{id}', ['as' => 'panel.people.comments.destroy', 'uses' => 'Panel\PersonController@destroyComment']);

// people.contributions
Route::get('/panel/people/contributions/{id}', ['as' => 'panel.people.contributions.show', 'uses' => 'Panel\ContributionController@show']);
Route::get('/panel/people/contributions/{id}/edit', ['as' => 'panel.people.contributions.edit', 'uses' => 'Panel\ContributionController@edit']);
Route::post('/panel/people/contributions/{id}', ['as' => 'panel.people.contributions.update', 'uses' => 'Panel\ContributionController@update']);
Route::delete('/panel/people/contributions/{id}', ['as' => 'panel.people.contributions.destroy', 'uses' => 'Panel\ContributionController@destroy']);
Route::post('/panel/people/contributions/image/local/{id}', ['as' => 'panel.people.contributions.image.local', 'uses' => 'Panel\ContributionController@updateImageLocally']);

// people.create
Route::get('/panel/people/create/{status?}', ['as' => 'panel.people.create', 'uses' => 'Panel\PersonController@create']);
Route::post('/panel/people/{id}/edit/{status}', ['as' => 'panel.people.update.status', 'uses' => 'Panel\PersonController@updateStatus']);
Route::resource('/panel/people', 'Panel\PersonController', ['except' => ['index', 'create']]);

// deleted models
Route::get('panel/deleted/{model}', ['as' => 'panel.deleted.index', 'uses' => 'Panel\DeletedModelController@index']);
Route::get('panel/deleted-people/{status}', ['as' => 'panel.deleted.people.index', 'uses' => 'Panel\DeletedModelController@peopleIndex']);
Route::get('panel/deleted/{model}/{id}', ['as' => 'panel.deleted.show', 'uses' => 'Panel\DeletedModelController@show']);
Route::post('panel/deleted/{model}/{id}/{status?}', ['as' => 'panel.deleted.restore', 'uses' => 'Panel\DeletedModelController@restore']);
Route::delete('panel/deleted/{model}/{id}/{status?}', ['as' => 'panel.deleted.delete', 'uses' => 'Panel\DeletedModelController@permanentlyDelete']);

// compatibility
Route::get('new/', ['as' => 'compatibility.home.index', 'uses' => 'Home\CompatibilityController@index']);
Route::get('new/{page}{extension}', ['as' => 'compatibility.home.index', 'uses' => 'Home\CompatibilityController@page'])->where([
    'page' => '[a-zA-Z0-9-_]+',
    'extension' => '\..+'
]);;
Route::get('new/panel/{page}', ['as' => 'compatibility.panel.index', 'uses' => 'Home\CompatibilityController@panelPage']);

// people.show
Route::get('/{id}', ['as' => 'home.people.show', 'uses' => 'Home\PersonController@show']);