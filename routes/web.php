<?php

use App\Message;
use App\Work;
use App\Hiring;
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

Auth::routes();

Route::get('/', 'HomeController@home')->name('home_page');
Route::get('/home', 'HomeController@index')->name('home')->middleware(['auth']);

Route::post('/home',[
  'uses' => 'HomeController@hiringRequest',
  'as' => 'home.hiring'
]);

Route::get('/policy', 'HomeController@policy')->name('policy');
Route::get('/guide', 'HomeController@guide')->name('guide');
Route::get('/contract/guide', 'HomeController@contractGuide')->name('contract_guide');


/*
* Route For messenger Controllers
*/
Route::get('/messenger', 'MessengerController@index')->name('messages.index')->middleware(['auth']);

Route::get('/messenger/count',function(){
    return Message::where('to','=',Auth::user()->id)
            ->where('read',0)
            ->where('is_deleted',0)->count();
});

Route::get('/contacts', 'ContactsController@get');
Route::get('/conversation/{id}', 'ContactsController@getMessagesFor');
Route::post('/conversation/send', 'ContactsController@send');

/*
* Route For User Profile
*/
Route::get('/profile/{username}',[
    'uses' => 'ProfileController@getProfile',
    'as' => 'profile.index',
    'middleware' => ['auth'],
]);

Route::post('/profile/{username}',[
    'uses' => 'ProfileController@postProfile',
    'middleware' => ['auth'],
]);


/*
* Route For Social page
*/
Route::get('/social',[
    'uses' => 'SocialController@getSocial',
    'as' => 'social.index',
    'middleware' => ['auth'],

]);

Route::post('/social',[
    'uses' => 'SocialController@postSocial',
    'as' => 'social.reply',
    'middleware' => ['auth']
]);

/*
* For Status in Social Page
*/

Route::get('/status',[
     'uses' => 'StatusController@getStatus',
    'as' => 'status.index',
    'middleware' => ['auth'],
]);

Route::get('/status/{user_id}',[
    'uses' => 'StatusController@getUserInfo',
    'middleware' => ['auth'],
]);

Route::post('/status',[
    'uses' => 'StatusController@postStatus',
    'as' => 'status.post',
    'middleware' => ['auth'],
]);

Route::get('/status_with_user/{status_id}',[
    'uses' => 'StatusController@get_status_with_user',
    'middleware' => ['auth'],
]);

Route::post('/status/{statusId}/comment',[
     'uses' => 'StatusController@postComment',
    'as' => 'status.reply',
    'middleware' => ['auth'],
]);

Route::get('/status/{statusId}/like',[
    'uses' => 'StatusController@getLike',
    'as' => 'status.like',
    'middleware' => ['auth'],
]);


/*
* tickets
*/
Route::post('/tickets',[
    'uses' => 'TicketsController@postTickets',
    'as' => 'post.tickets',
    'middleware' => ['auth'],
]);


/*
* Workers
*/

Route::get('/workers',[
    'uses' => 'workController@getIndex',
    'as' => 'workers.index',
    'middleware' => ['auth'],
]);

Route::post('/workers/add',[
    'uses' => 'workController@addWorker',
    'as' => 'workers.add',
    'middleware' => ['auth'],
]);

Route::post('/workers/accept',[
    'uses' => 'workController@postAccept',
    'as' => 'workers.accept',
    'middleware' => ['auth'],
]);

Route::post('/workers/reject',[
    'uses' => 'workController@postReject',
    'as' => 'workers.reject',
    'middleware' => ['auth'],
]);

Route::post('/workers/complete',[
    'uses' => 'workController@postComplete',
    'as' => 'workers.complete',
    'middleware' => ['auth'],
]);

Route::post('/workers/delete',[
    'uses' => 'workController@postDelete',
    'as' => 'workers.delete',
    'middleware' => ['auth'],
]);

Route::post('/workers/edit',[
    'uses' => 'workController@postEdit',
    'as' => 'workers.edit',
    'middleware' => ['auth'],
]);

Route::post('/workers/apply_for_jobs',[
    'uses' => 'workController@postApply',
    'as' => 'workers.apply_for_jobs',
    'middleware' => ['auth'],
]);

Route::get('/workers/count',function(){
    $work_count =  Work::where('user_id',Auth::user()->id)
            ->where('accepted',0)
            ->orwhere('worker_id',Auth::user()->id)
            ->where('accepted',0)
            ->where('is_rejected',0)
            ->where('is_deleted',0)->count();
    $hiring_count = Hiring::where('is_approved',1)
                          ->where('is_closed',0)
                          ->where('is_deleted',0)->count();
    return $work_count + $hiring_count;
});

// Article Page =  get all articles
Route::get('/articles',[
    'uses' => 'ArticlesController@index',
    'as' => 'articles.list'
]);

/* Article Page = get single article*/
Route::get('/article/{slug}',[
    'uses' => 'ArticlesController@getArticle',
    'as' => 'articles.single'
]);
/*
* Route For Mvp
*/

/* Route to upload mvp */
Route::get('/mvp/add',[
    'uses' => 'MvpController@getAdd',
    'as' => 'mvp.add', 
    'middleware' => ['auth']
]);
Route::post('/mvp/add',[
    'uses' => 'MvpController@postAdd',
    'middleware' => ['auth']
]);

/* Route to manage mvp */
Route::get('/mvp',[
    'uses' => 'MvpController@list',
    'as' => 'mvp.list'
]);

Route::get('/mvp/search/{type}',[
    'uses' => 'MvpController@search',
    'as' => 'mvp.search'
]);

Route::get('/mvp/{slug}',[
    'uses' => 'MvpController@getMvp',
    'as' => 'mvp.index'
]);

Route::post('/mvp/{slug}',[
    'uses' => 'MvpController@postMvp',
    'middleware' => ['auth']
]);

Route::post('/mvp/rating',[
    'uses' => 'MvpController@postMvp',
    'as'   => 'mvp.rating',
    'middleware' => ['auth']
]);

Route::get('/mvp/edit/{slug}',[
    'uses' => 'MvpController@getEditMvp',
    'as' => 'mvp.edit',
    'middleware' => ['auth']
]);
Route::post('/mvp/edit/{slug}',[
    'uses' => 'MvpController@postEditMvp',
    'middleware' => ['auth']
]);

Route::post('/mvp/images/upload', 'Mvp_imagesController@store')->name('mvp.store');

Route::post('/mvp/feature/add',[
    'uses' => 'Mvp_featuresController@store',
    'as'   => 'mvp.store',
    'middleware' => ['auth']
]);
/*
* Rout For Search Users
*/

Route::get('/users/{can_work_on}',[
    'uses' => 'SocialController@searchUsers',
    'as' => 'search.users',
    'middleware' => ['auth']
]);

/*
* Route For validate Controller
*/
Route::post('/validate/unique/user',[
    'uses' => 'ValidateController@uniqueUser',
    'as' => 'validate.unique'
]);

Route::post('/validate/unique/mvp',[
    'uses' => 'ValidateController@uniqueMvp',
    'as' => 'validate.uniqueMvp'
]);




/*
* Routes For Admin panel
*/

Route::get('/admin-dashboard',[
    'uses' => 'DashboardController@getIndex',
    'as' => 'dashboard.index',
    'middleware' => ['admin']
]);

/*
* to manage new mvp's
*/

Route::get('/dashboard/mvp',[
    'uses' => 'DashboardController@getMvp',
    'as' => 'dashboard.mvp',
    'middleware' => ['admin'],
]);

Route::post('/dashboard/mvp',[
    'uses' => 'DashboardController@postMvp',
]);

/*
* to manage mvp types
*/
Route::get('/dashboard/add_mvp_type',[
    'uses' => 'DashboardController@getAdd_mvp_type',
    'as' => 'dashboard.add_mvp_type',
    'middleware' => ['admin'],
]);
Route::post('/dashboard/add_mvp_type',[
    'uses' => 'DashboardController@postAdd_mvp_type',
]);
Route::get('/dashboard/mvp_type',[
    'uses' => 'DashboardController@getMvp_type',
    'as' => 'dashboard.mvp_type',
    'middleware' => ['admin'],
]);

Route::post('/dashboard/mvp_type',[
    'uses' => 'DashboardController@postMvp_type',
]);

/*
* to mange user status
*/

Route::get('/dashboard/status',[
    'uses' => 'DashboardController@getStatus',
    'as' => 'dashboard.status',
    'middleware' => ['admin'],
]);

// to add new category
Route::get('/dashboard/addCategory',[
    'uses' => 'DashboardController@getAddCategory',
    'as' => 'dashboard.addCategory',
    'middleware' => ['admin'],
]);

Route::post('/dashboard/addCategory',[
    'uses' => 'DashboardController@postAddCategory',
    'middleware' => ['admin'],
]);

// to manage all articles category
Route::get('/dashboard/category',[
    'uses' => 'DashboardController@getCategory',
    'as' => 'dashboard.category',
    'middleware' => ['admin'],
]);

Route::post('/dashboard/category',[
    'uses' => 'DashboardController@postCategory',
    'middleware' => ['admin'],
]);

/*
* to publich new article
*/

Route::get('/dashboard/publish_article',[
    'uses' => 'DashboardController@getPublishArticle',
    'as' => 'dashboard.publish_article',
    'middleware' => ['admin'],
]);
Route::post('/dashboard/publish_article',[
    'uses' => 'DashboardController@postPublishArticle',
    'middleware' => ['admin'],
]);

/*
* to list all published article
*/

Route::get('/dashboard/articles',[
    'uses' => 'DashboardController@getArticles',
    'as' => 'dashboard.articles',
    'middleware' => ['admin'],
]);

Route::post('/dashboard/articles',[
    'uses' => 'DashboardController@postArticles',
    'middleware' => ['admin'],
]);

/*
* admin tickets
*/
Route::get('/dashboard/tickets',[
    'uses' => 'DashboardController@getTickets',
    'as' => 'dashboard.tickets',
    'middleware' => ['admin'],
]);

Route::get('/dashboard/tickets/types',[
    'uses' => 'DashboardController@getTicketsTypes',
    'as' => 'dashboard.tickets_types',
    'middleware' => ['admin'],
]);

Route::post('/dashboard/tickets',[
    'uses' => 'DashboardController@postTickets',
    'as' => 'dashboard.tickets',
    'middleware' => ['admin'],
]);

/*
* to send emails
*/
Route::post('/dashboard/sendMail',[
    'uses' => 'DashboardController@sendMessage',
    'as' => 'dashboard.mail',
    'middleware' => ['admin']
]);

/*
* to manage site settings info
*/

Route::get('/dashboard/settings',[
    'uses' => 'DashboardController@getSettings',
    'as' => 'dashboard.settings',
    'middleware' => ['admin']
]);

Route::post('/dashboard/settings',[
    'uses' => 'DashboardController@postSettings',
    'middleware' => ['admin']
]);

/*
* to manage site users
*/

Route::get('/dashboard/users',[
    'uses' => 'DashboardController@getUsers',
    'as' => 'dashboard.users',
    'middleware' => ['admin']
]);

Route::post('/dashboard/users',[
'uses' => 'DashboardController@postUsers',
    'middleware' => ['admin']
]);


Route::get('/dashboard/add_user',[
    'uses' => 'DashboardController@getAdd_user',
    'as' => 'dashboard.add_user',
    'middleware' => ['admin']
]);

Route::post('/dashboard/add_user',[
'uses' => 'DashboardController@postAdd_user',
    'middleware' => ['admin']
]);


// dashboard - payment
Route::get('/dashboard/work_list',[
    'uses' => 'dashboardController@getWork_list',
    'as' => 'dashboard.work_list',
    'middleware' => ['admin']
]);

Route::post('/dashboard/work_list',[
    'uses' => 'dashboardController@postWork_list',
    'middleware' => ['admin']
]);

/** manage  payment Method*/

Route::get('/dashboard/payment/method',[
    'uses' => 'dashboardController@getPaymentMethod',
    'as' => 'dashboard.paymentMethod',
    'middleware' => ['admin']
]);

Route::post('/dashboard/payment/method',[
    'uses' => 'dashboardController@postPaymentMethod',
    'middleware' => ['admin']
]);

Route::get('/dashboard/payment/table',[
    'uses' => 'dashboardController@getPaymentMethodTable',
    'as' => 'dashboard.paymentMethodTable',
    'middleware' => ['admin']
]);
Route::post('/dashboard/payment/table',[
    'uses' => 'dashboardController@postPaymentMethodTable',
    'middleware' => ['admin']
]);

/*
* manage recharge accounts
*/
Route::get('/dashboard/recharge',[
    'uses' => 'dashboardController@getRecharge',
    'as' => 'dashboard.recharge',
    'middleware' => ['admin']
]);
Route::post('/dashboard/recharge',[
    'uses' => 'dashboardController@postRecharge',
    'middleware' => ['admin']
]);

/*
* manage draw from accounts
*/
Route::get('/dashboard/draw',[
    'uses' => 'dashboardController@get_deposit_draw',
    'as' => 'dashboard.deposit_draw',
    'middleware' => ['admin']
]);
Route::post('/dashboard/draw',[
    'uses' => 'dashboardController@post_deposit_draw',
    'middleware' => ['admin']
]);


/*
* manage payment archives
*/
Route::get('/dashboard/payment_archives',[
    'uses' => 'dashboardController@getPayment_archives',
    'as' => 'dashboard.payment_archives',
    'middleware' => ['admin']
]);
Route::post('/dashboard/payment_archives',[
    'uses' => 'dashboardController@postPayment_archives',
    'middleware' => ['admin']
]);



/*
* manage users hiring request
*/
Route::get('/dashboard/hiring_request',[
    'uses' => 'dashboardController@getHiring_request',
    'as' => 'dashboard.hiring_request',
    'middleware' => ['admin']
]);
Route::post('/dashboard/hiring_request',[
    'uses' => 'dashboardController@postHiring_request',
    'middleware' => ['admin']
]);

/*
* manage users applications for jobs
*/
Route::get('/dashboard/apply_for_jobs',[
    'uses' => 'dashboardController@getApply_fo_jobs',
    'as' => 'dashboard.apply_for_jobs',
    'middleware' => ['admin']
]);
Route::post('/dashboard/apply_for_jobs',[
    'uses' => 'dashboardController@postApply_fo_jobs',
    'middleware' => ['admin']
]);

/*
* add new advertising image
*/
Route::get('/dashboard/advertising',[
    'uses' => 'dashboardController@getAdvertising',
    'as' => 'dashboard.advertising',
    'middleware' => ['admin']
]);
Route::get('/dashboard/advertising_table',[
    'uses' => 'dashboardController@getAdvertisingTable',
    'as' => 'dashboard.advertising_table',
    'middleware' => ['admin']
]);
Route::post('/dashboard/advertising',[
    'uses' => 'dashboardController@postAdvertising',
    'middleware' => ['admin']
]);
