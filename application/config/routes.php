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
$route['default_controller'] = 'welcome';
$route['about-us'] = 'welcome/about';
$route['contact'] = 'welcome/contact';
$route['help'] = 'welcome/help';
/////////////////////////Create Rounting//////////////////////

/***admin routes ***/
$admin = 'admin/admin';
$route['admin'] = $admin.'/index';
$route['admin/login'] = $admin.'/login';
$route['admin/logOut'] = $admin.'/logout';
$route['admin/forgot'] = $admin.'/forgot';
$route['admin/reset/:num/(:any)'] = $admin.'/reset';
$route['admin/new-notifications'] = $admin.'/getNewNotificationsAjax';
$route['admin/notifications-update'] = $admin.'/NotificationsAjaxUpdate';
//$route['admin/view-notifications-limit'] = $admin.'/ViewAllNotificationsAjax';
$route['admin/view-notifications'] = $admin.'/ViewAllNotifications';
//dashboard
$route['admin/dashboard'] = $admin.'/dashboard';
$route['admin/profile'] = $admin.'/profile';
//Order List
$route['admin/orders'] = $admin.'/order';
$route['admin/orders/edit/(:num)'] = $admin.'/orderEdit/$1';
//Admin User Section
$route['admin/addUser'] = $admin.'/addUser';
$route['admin/users'] = $admin.'/users';
$route['admin/ajaxPaginationData/:num'] = $admin.'/ajaxPaginationData';
$route['admin/UserStatus'] = $admin.'/UserStatus';
$route['admin/UserDelete'] = $admin.'/UserDelete';
$route['admin/user/edit/:num'] = $admin.'/UserEdit';
$route['admin/user/profile/:num'] = $admin.'/UserProfile';

//home
//$route['admin/home'] = $admin.'/home';
$route['admin/banner'] = $admin.'/homeBanner';
$route['admin/create-banner'] = $admin.'/AddHomeBanner';
$route['admin/banner-update/(:num)'] = $admin.'/UpdateHomeBanner/$1';
$route['admin/banner-delete/(:num)'] = $admin.'/DeleteHomeBanner/$1';
$route['admin/testimonials'] = $admin.'/Testimonials';
$route['admin/create-testimonial'] = $admin.'/AddNewTestimonail';
$route['admin/update-testimonial/(:any)'] = $admin.'/UpdateTestimonail/$1';
$route['admin/delete-testimonial/(:any)'] = $admin.'/DeleteTestimonial/$1';
$route['admin/services'] = $admin.'/HomeServices';
$route['admin/create-service'] = $admin.'/AddNewHomeServices';
$route['admin/update-service/(:any)'] = $admin.'/UpdateHomeServices/$1';
$route['admin/delete-service/(:any)'] = $admin.'/DeleteHomeServices/$1';

//sections
$route['admin/logo'] = $admin.'/logo';
$route['admin/contact'] = $admin.'/contact';
$route['admin/social_links'] = $admin.'/social';
$route['admin/get-started'] = $admin.'/GetStarted';
$route['admin/copyright'] = $admin.'/Copyright';
$route['admin/partner-logo'] = $admin.'/PartnerLogo';
$route['admin/update-partner-logo/(:any)'] = $admin.'/UpdatePartnerLogo/$1';
$route['admin/delete-partner-logo/(:any)'] = $admin.'/DeletePartnerLogo/$1';


//category
$route['admin/category'] = $admin.'/CategoryList';
$route['admin/create-category'] = $admin.'/CreateCategory';
$route['admin/update-category/(:any)'] = $admin.'/UpdateCategory/$1';
$route['admin/delete-category/(:any)'] = $admin.'/DeleteCategory/$1';
$route['admin/types'] = $admin.'/TypesList';
$route['admin/create-types'] = $admin.'/CreateTypes';
$route['admin/update-types/(:any)'] = $admin.'/UpdateTypes/$1';
$route['admin/delete-types/(:any)'] = $admin.'/DeleteTypes/$1';

/*********User Routes*********/
$user = 'user/users';    // User controller path  
$route['index'] = $user.'/index';
$route['login'] = $user.'/login';
$route['logout'] = $user.'/logout';
$route['register'] = $user.'/register';
$route['thankyou'] = $user.'/thankyou';
$route['check_email_exists'] = $user.'/check_email_exists';


$route['forgot'] = $user.'/forgot';
$route['reset/:num/(:any)'] = $user.'/reset';
$route['user/dashboard'] = $user.'/dashboard';
$route['activate/:num'] = $user.'/verify';
$route['switch'] = $user.'/switch';
$route['buyer'] = $user.'/index';
$route['buyer/dashboard'] = $user.'/dashboard';
$route['buyer/profile'] = $user.'/profile';
$route['buyer/profile/(:any)'] = $user.'/buyerProfile/$1';


//today
$route['buyer/product/Category'] = $user.'/pCategory';

$route['buyer/product/MasterList'] = $user.'/MasterListPeoject';

$route['buyer/newCategory'] = $user.'/newCategory';
$route['buyer/requestQuotes'] = $user.'/requestQuotes';
$route['buyer/view-requestQuotes'] = $user.'/ViewRequestQuotes';
$route['buyer/update-requestQuotes/(:any)'] = $user.'/UpdateRequestQuotes/$1';
$route['buyer/delete-requestQuotes/(:any)'] = $user.'/DeleteRequestQuotes/$1';
$route['buyer/view-requestQuotes/(:any)'] = $user.'/ViewRequestQuotes/$1';


$route['buyer/orderPlaced'] = $user.'/orderPlaced';
$route['buyer/suppliers'] = $user.'/suppliers';
$route['buyer/chat/:num/:num'] = 'welcome/chat';

$route['buyer/message'] = $user.'/message';

$route['supplier'] = $user.'/index';
$route['supplier/dashboard'] = $user.'/dashboard';

$route['buyer/save/rate'] = $user.'/buyerRating';
$route['supplier/save/rate'] = $user.'/saveRating';
$route['supplier/profile'] = $user.'/profile';
$route['supplier/saveSupCategory'] = $user.'/saveSupCategory';
$route['supplier/chat/:num'] = 'welcome/chat';
$route['supplier/profile/(:any)/(:any)'] = $user.'/rate/$1/$2';

$route['supplier/category'] = $user.'/category';
$route['supplier/responseQuote'] = $user.'/responseQuote';
$route['supplier/response-to-quote/(:num)'] = $user.'/responseToQuote/$1';
$route['supplier/view-requestQuotes/(:any)'] = $user.'/ViewRequestQuotesSupplier/$1';
$route['supplier/orders'] = $user.'/Orders';
$route['supplier/marks_as_paid/(:any)/(:any)'] = $user.'/marks_as_paid/$1/$2';
$route['supplier/transits_mark_as_recieved/(:any)/(:any)'] = $user.'/transits_mark_as_recieved/$1/$2';

$route['supplier/deletes/(:any)/(:any)'] = $user.'/deletes/$1/$2';

$route['supplier/reject_offer/(:any)/(:any)'] = $user.'/rejectOffer/$1/$2';
$route['supplier/supplier_accept_offer/(:any)/(:any)'] = $user.'/supplierAcceptOffer/$1/$2';
$route['supplier/supplier_accept_offer/(:any)/(:any)'] = $user.'/supplierAcceptOffer/$1/$2';
//12 10 2018
$route['buyer/ajexOrderRequest'] = $user.'/ajexOrderRequest';
$route['buyer/orderRequest'] = $user.'/orderRequest';
$route['buyer/buyerOrderDashboard'] = $user.'/buyerOrderDashboard';
$route['buyer/orderHistory'] = $user.'/orderHistory';
$route['buyer/masterList'] = $user.'/masterList';
$route['buyer/internalMail'] = $user.'/internalMail';
$route['buyer/draftOrder'] = $user.'/draftOrder';
$route['buyer/draftDelete/(:any)'] = $user.'/draftDelete/$1';
$route['buyer/cancelOrder/(:any)'] = $user.'/cancelOrder/$1';

$route['buyer/cancelOrder'] = $user.'/cancelOrder';
$route['buyer/editOrder/(:any)'] = $user.'/editOrder/$1';

$route['buyer/PublishOrder/(:any)/(:any)'] = $user.'/PublishOrder/$1/$2';
$route['buyer/updateOrder'] = $user.'/updateOrder';
$route['buyer/viewOrder/(:any)'] = $user.'/viewOrder/$1';
$route['buyer/viewCheckOrder/(:any)'] = $user.'/viewCheckOrder/$1';
$route['buyer/processOrder/(:any)'] = $user.'/processOrder/$1';
$route['404_override'] = '';
$route['buyer/acceptOffer/(:any)'] = $user.'/acceptOffer/$1';
$route['buyer/mark_as_paid/(:any)/(:any)'] = $user.'/mark_as_paid/$1/$2';
$route['buyer/transit_mark_as_recieved/(:any)/(:any)'] = $user.'/transit_mark_as_recieved/$1/$2';



$route['translate_uri_dashes'] = FALSE;

//  1 3 2018   =>  Supplier Buyer Dashboard

$route['supplier/supplierOrderDashboard'] = $user.'/supplierOrderDashboard';
$route['supplier/submitOffer/(:any)'] = $user.'/submitOffer/$1';
$route['supplier/product/image'] = $user.'/upload';


$route['supplier/markedResponse/(:any)'] = $user.'/markedResponse/$1';
$route['all_category'] = 'webservices/All_category/get_category';
$route['supplier/requesthistory'] = $user.'/requestHistory';
$route['supplier/draftOffers'] = $user.'/draftOffers';
$route['supplier/PublishOffer/(:any)'] = $user.'/PublishOffer/$1';
$route['supplier/ignoreOffer/(:any)'] = $user.'/ignoreOffer/$1';
$route['supplier/allactiOnOffer'] = $user.'/allactiOnOffer';
$route['supplier/markedsAllOffer'] = $user.'/markedsAllOffer';
