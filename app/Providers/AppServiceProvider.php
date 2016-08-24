<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\ContactDetail;
use App\Collaborator;
use Validator;
use Auth;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Bootstrap any application services.
   *
   * @return void
   */

  public function boot()
  {
    view()->composer('layouts.panel', function($view)
    {
      $logged_user = Auth::user();
      $view->with('logged_user', $logged_user);
    });

    view()->composer('layouts.home', function($view)
    {
      $contactDetails = ContactDetail::first();
      $are_collaborators = !Collaborator::get()->isEmpty();
      $view->with('contactDetails', $contactDetails)->with('are_collaborators', $are_collaborators);
    });

    view()->composer('home.people.show', function($view)
    {
      $contactDetails = ContactDetail::first();
      $view->with('contactDetails', $contactDetails);
    });

    view()->composer('home.people.show-for-print', function($view)
    {
      $contactDetails = ContactDetail::first();
      $view->with('contactDetails', $contactDetails);
    });

    Validator::extend('facebook_active_url', function($attribute, $value, $parameters, $validator) {
      return true;
    });

    Validator::extend('twitter_active_url', function($attribute, $value, $parameters, $validator) {
      return !(get_headers('https://twitter.com/' . $value)[0] == 'HTTP/1.0 404 Not Found');
    });

    Validator::extend('instagram_active_url', function($attribute, $value, $parameters, $validator) {
      return !(get_headers('https://www.instagram.com/' . $value)[0] == 'HTTP/1.1 404 Not Found');
    });

    Validator::extendImplicit('required_if_present', function($attribute, $value, $parameters, $validator) {
      return !($value === "" && $value !== null);
    });
  }

  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }
}
