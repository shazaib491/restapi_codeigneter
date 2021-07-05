<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'admission';
$route['404_override'] = '';


// Admission  Routes
$route['admission/add']['POST'] = 'admission/create';
$route['admission/store']['GET'] = 'admission/store';
$route['admission/edit/(:num)']['GET'] = 'admission/edit/$1';
$route['admission/update/(:num)']['put'] = 'admission/update/$1';
$route['admission/delete/(:num)']['DELETE'] = 'admission/delete/$1';

// Notification Routes
$route['notify/add']['POST'] = 'notification/create';
$route['notify/store']['GET'] = 'notification/store';
$route['notify/edit/(:num)']['GET'] = 'notification/edit/$1';
$route['notify/update/(:num)']['put'] = 'notification/update/$1';
$route['notify/delete/(:num)']['DELETE'] = 'notification/delete/$1';

// Carrer Routes
$route['carrers/add']['POST'] = 'carrer/create';
$route['carrers/store']['GET'] = 'carrer/store';
$route['carrers/edit/(:num)']['GET'] = 'carrer/edit/$1';
$route['carrers/update/(:num)']['POST'] = 'carrer/update/$1';
$route['carrers/delete/(:num)']['DELETE'] = 'carrer/delete/$1';

// Carousel Routes
$route['carousel/add']['POST'] = 'carousel/create';
$route['carousel/store']['GET'] = 'carousel/store';
$route['carousel/edit/(:num)']['GET'] = 'carousel/edit/$1';
$route['carousel/update/(:num)']['POST'] = 'carousel/update/$1';
$route['carousel/delete/(:num)']['DELETE'] = 'carousel/delete/$1';


// ContactUs Routes
$route['contacts/add']['POST'] = 'contact/create';
$route['contacts/store']['GET'] = 'contact/store';
$route['contacts/edit/(:num)']['GET'] = 'contact/edit/$1';
$route['contacts/update/(:num)']['PUT'] = 'contact/update/$1';
$route['contacts/delete/(:num)']['DELETE'] = 'contact/delete/$1';

// Fees Routes
$route['fees/add']['POST'] = 'fees/create';
$route['fees/store']['GET'] = 'fees/store';
$route['fees/edit/(:num)']['GET'] = 'fees/edit/$1';
$route['fees/update/(:num)']['PUT'] = 'fees/update/$1';
$route['fees/delete/(:num)']['DELETE'] = 'fees/delete/$1';

// Gallery Routes
$route['gallery/add']['POST'] = 'gallery/create';
$route['gallery/store']['GET'] = 'gallery/store';
$route['gallery/edit/(:num)']['GET'] = 'gallery/edit/$1';
$route['gallery/update/(:num)']['POST'] = 'gallery/update/$1';
$route['gallery/delete/(:num)']['DELETE'] = 'gallery/delete/$1';


// Testimonial Routes
$route['testimonial/add']['POST'] = 'testimonial/create';
$route['testimonial/store']['GET'] = 'testimonial/store';
$route['testimonial/edit/(:num)']['GET'] = 'testimonial/edit/$1';
$route['testimonial/update/(:num)']['POST'] = 'testimonial/update/$1';
$route['testimonial/delete/(:num)']['DELETE'] = 'testimonial/delete/$1';


