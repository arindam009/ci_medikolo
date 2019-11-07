<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

|	http://codeigniter.com/user_guide/general/routing.html

|

| -------------------------------------------------------------------------

| RESERVED ROUTES

| -------------------------------------------------------------------------

|

| There area two reserved routes:

|

|	$route['default_controller'] = 'welcome';

|

| This route indicates which controller class should be loaded if the

| URI contains no data. In the above example, the "welcome" class

| would be loaded.

|

|	$route['404_override'] = 'errors/page_missing';

|

| This route will tell the Router what URI segments to use if those provided

| in the URL cannot be matched to a valid route.

|

*/

$route['default_controller'] = "home";

$route['404_override'] = 'error404';

$route['translate_uri_dashes'] = FALSE;

$route['blog/(:any)'] = "blog/index/$1";

$route['blog/(:any)/(:many)'] = "blog/index/$1/$2";

$route['recipe/(:any)'] = "recipe/index/$1";

$route['recipe/(:any)/(:many)'] = "recipe/index/$1/$2";

$route['users/(:any)'] = "users/index/$1";

$route['makereview/(:any)'] = "makereview/index/$1";

$route['makereview/(:any)/(:any)'] = "makereview/index/$1/$2";

$route['aboutus/(:any)'] = "aboutus/index/$1";

$route['shop/(:any)'] = "shop/index/$1";

$route['submitrecipe/(:any)'] = "submitrecipe/edit/$1";
//$route['submitrecipe/(:any)/(:any)'] = "submitrecipe/edit/$1/$2";

$route['submitblog/(:any)'] = "submitblog/edit/$1";
//$route['submitblog/(:any)/(:any)'] = "submitblog/edit/$1/$2";


$route['user-registration'] = "userregistration";


