<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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



// Route::get('/storage/{folder}/{filename}', function ($folder,$filename)
// {
//     $path = storage_path('app/public/' .$folder.'/'. $filename);

//     if (!File::exists($path)) {
//         abort(404);
//     }

//     $file = File::get($path);
//     $type = File::mimeType($path);

//     $response = Response::make($file, 200);
//     $response->header("Content-Type", $type);

//     return $response;
// });



Route::view('/','Admin/Login');

# Log in [CONTROLLER::login.php]
Route::post('/admin/login','App\Http\Controllers\admin\login@login_admin');

# Log out.
Route::get('/logout', function () {
    session()->forget('Admin');
    return redirect('/');
});







# Admin functionality [CONTROLLER::personalInfo.php, projects.php], [MIDDLEWARE::AdminAuth.php].
Route::group(['middleware'=>['adminAuth']],function() {



    # Admin access
    Route::view('/dashboard','Admin/SuperAdmin/Dashboard');
    Route::view('/user/notification','Admin/SuperAdmin/UserNotification');
    Route::view('/vendor/notification','Admin/SuperAdmin/VendorNotification');

    Route::view('/add/city','Admin/SuperAdmin/AddCity');
    
    Route::view('/add/banner','Admin/SuperAdmin/AddBanner');
    Route::view('/app/user','Admin/SuperAdmin/AppUsers');
    Route::view('/order/complaints','Admin/SuperAdmin/OrderComplaints');
    Route::view('/order/cancelled','Admin/SuperAdmin/OrderCancelled');

    Route::view('/feedback','Admin/SuperAdmin/Feedback');

    ##############################################################################################################################################
    # Dashboard  [C::dashboard.php]
    ##############################################################################################################################################

    # Shows dashboard.
    # Redirecting to [FUNCTION-NO::01]---in-controller.
    Route::get('/dashboard/super/admin','App\Http\Controllers\admin\dashboard@super_admin_dashboard');

    ##############################################################################################################################################
    # City  [C::city.php]
    ##############################################################################################################################################

    # Adding city.
    # Redirecting to [FUNCTION-NO::01]---in-controller.
    Route::post('/store/city','App\Http\Controllers\admin\city@insert_city');

    # Viewing add city panel.
    Route::view('/add/city','Admin/SuperAdmin/AddCity');

    # Shows cities.
    # Redirecting to [FUNCTION-NO::02]---in-controller.
    Route::get('/cities','App\Http\Controllers\admin\city@show_city');

    # Take to editing page.
    # Redirecting to [FUNCTION-NO::03]---in-controller.
    Route::get('/edit/city/{id}','App\Http\Controllers\admin\city@edit_city');

    # Editing city.
    # Redirecting to [FUNCTION-NO::04]---in-controller.
    Route::post('/update/city','App\Http\Controllers\admin\city@update_city');

    # Delete city.
    # Redirecting to [FUNCTION-NO::05]---in-controller.
    Route::get('/delete/city/{id}','App\Http\Controllers\admin\city@delete_city');

    ##############################################################################################################################################
    # Banner  [C::banner.php]
    ##############################################################################################################################################

    # Adding banner.
    # Redirecting to [FUNCTION-NO::01]---in-controller.
    Route::post('/store/banner','App\Http\Controllers\admin\banner@insert_banner');

    # Viewing add banner panel.
    Route::view('/add/banner','Admin/SuperAdmin/AddBanner');

    # Shows banners.
    # Redirecting to [FUNCTION-NO::02]---in-controller.
    Route::get('/banners','App\Http\Controllers\admin\banner@show_banner');

    # Take to editing page.
    # Redirecting to [FUNCTION-NO::03]---in-controller.
    Route::get('/edit/banner/{id}','App\Http\Controllers\admin\banner@edit_banner');

    # Editing banner.
    # Redirecting to [FUNCTION-NO::04]---in-controller.
    Route::post('/update/banner','App\Http\Controllers\admin\banner@update_banner');

    # Delete banner.
    # Redirecting to [FUNCTION-NO::05]---in-controller.
    Route::get('/delete/banner/{id}','App\Http\Controllers\admin\banner@delete_banner'); 

    ##############################################################################################################################################
    # Setting  [C::setting.php]
    ##############################################################################################################################################

    # Shows setting.
    Route::view('/setting','Admin/SuperAdmin/Setting');

    # Updating admin info.
    # Redirecting to [FUNCTION-NO::01]---in-controller.
    Route::post('/update/admin/info','App\Http\Controllers\admin\setting@update_admin');

    ##############################################################################################################################################
    # Policy  [C::policy.php]
    ##############################################################################################################################################

    # Shows terms.
    # Redirecting to [FUNCTION-NO::01]---in-controller.
    Route::get('/terms','App\Http\Controllers\admin\policy@show_terms');

    # Shows about.
    # Redirecting to [FUNCTION-NO::02]---in-controller.
    Route::get('/about','App\Http\Controllers\admin\policy@show_about');

    # Update policy.
    # Redirecting to [FUNCTION-NO::03]---in-controller.
    Route::post('/update/policy','App\Http\Controllers\admin\policy@update_policy');

    ##############################################################################################################################################
    # City admin  [C::policy.php]
    ##############################################################################################################################################

    # Shows city admin form.
    # Redirecting to [FUNCTION-NO::01]---in-controller.
    Route::get('/city/admin/form','App\Http\Controllers\admin\cityAdmin@city_admin_form');

    # Adds city admin.
    # Redirecting to [FUNCTION-NO::02]---in-controller.
    Route::post('/add/city/admin','App\Http\Controllers\admin\cityAdmin@add_city_admin');

    # Shows city admin list.
    # Redirecting to [FUNCTION-NO::03]---in-controller.
    Route::get('/city/admin','App\Http\Controllers\admin\cityAdmin@city_admin_list');

























    # Uploading CV.
    # Redirecting to [FUNCTION-NO::03]---in-controller.
    Route::post('/edit/cv','App\Http\Controllers\admin\personalInfo@upload_CV');

    # Uploading DP.
    # Redirecting to [FUNCTION-NO::04]---in-controller.
    Route::post('/edit/dp','App\Http\Controllers\admin\personalInfo@upload_DP');

    ##############################################################################################################################################
    # Projects.  [C::projects.php]
    ##############################################################################################################################################

    # Go to project add Page.
    Route::get('/admin/project/add', function (Request $request) {
        $request->session()->put('actionType','add');
        return view('admin/projectAdd');
    });

    # Go to project edit Page.
    Route::get('/admin/project/edit/{id}', function (Request $request, $id) {
        $request->session()->put('actionType','edit');
        return redirect('/admin/project/list'.$id);
    });

    # Reads projects from db and shows in view.
    # Redirecting to [FUNCTION-NO::01]---in-controller.
    Route::get('/admin/project/list{id?}','App\Http\Controllers\admin\projects@show_projects');

    # Inserts project info in db.
    # Redirecting to [FUNCTION-NO::02]---in-controller.
    Route::post('/add/project','App\Http\Controllers\admin\projects@insert_project');

    # Edit project info in db.
    # Redirecting to [FUNCTION-NO::03]---in-controller.
    Route::post('/edit/project/{id}','App\Http\Controllers\admin\projects@edit_project');

    # Delete project info in db.
    # Redirecting to [FUNCTION-NO::04]---in-controller.
    Route::get('/delete/project/{id}','App\Http\Controllers\admin\projects@delete_project');

    ##############################################################################################################################################
    # Framework.  [C::frameworks.php]
    ##############################################################################################################################################

    # Go to framework add Page.
    Route::get('/admin/framework/add', function (Request $request) {
        $request->session()->put('actionType','add');
        return view('admin/frameworkAdd');
    });

    # Go to framework edit Page.
    Route::get('/admin/framework/edit/{id}', function (Request $request, $id) {
        $request->session()->put('actionType','edit');
        return redirect('/admin/framework/list'.$id);
    });

    # Reads framework from db and shows in view.
    # Redirecting to [FUNCTION-NO::01]---in-controller.
    Route::get('/admin/framework/list{id?}','App\Http\Controllers\admin\frameworks@show_frameworks');

    # Inserts framework info in db.
    # Redirecting to [FUNCTION-NO::02]---in-controller.
    Route::post('/add/framework','App\Http\Controllers\admin\frameworks@insert_framework');

    # Edit framework info in db.
    # Redirecting to [FUNCTION-NO::03]---in-controller.
    Route::post('/edit/framework/{id}','App\Http\Controllers\admin\frameworks@edit_framework');

    # Delete framework info in db.
    # Redirecting to [FUNCTION-NO::04]---in-controller.
    Route::get('/delete/framework/{id}','App\Http\Controllers\admin\frameworks@delete_framework');

    ##############################################################################################################################################
    # Extension.  [C::extensions.php]
    ##############################################################################################################################################

    # Go to extension add Page.
    Route::get('/admin/extension/add', function (Request $request) {
        $request->session()->put('actionType','add');
        return view('admin/extensionAdd');
    });

    # Go to extension edit Page.
    Route::get('/admin/extension/edit/{id}', function (Request $request, $id) {
        $request->session()->put('actionType','edit');
        return redirect('/admin/extension/list'.$id);
    });

    # Reads extension from db and shows in view.
    # Redirecting to [FUNCTION-NO::01]---in-controller.
    Route::get('/admin/extension/list{id?}','App\Http\Controllers\admin\extension@show_extensions');

    # Inserts extension info in db.
    # Redirecting to [FUNCTION-NO::02]---in-controller.
    Route::post('/add/extension','App\Http\Controllers\admin\extension@insert_extension');

    # Edit extension info in db.
    # Redirecting to [FUNCTION-NO::03]---in-controller.
    Route::post('/edit/extension/{id}','App\Http\Controllers\admin\extension@edit_extension');

    # Delete extension info in db.
    # Redirecting to [FUNCTION-NO::04]---in-controller.
    Route::get('/delete/extension/{id}','App\Http\Controllers\admin\extension@delete_extension');

    ##############################################################################################################################################
    # Article.  [C::articles.php]
    ##############################################################################################################################################

    # Go to article add Page.
    Route::get('/admin/article/add', function (Request $request) {
        $request->session()->put('actionType','add');
        return view('admin/articleAdd');
    });

    # Go to article edit Page.
    Route::get('/admin/article/edit/{id}', function (Request $request, $id) {
        $request->session()->put('actionType','edit');
        return redirect('/admin/article/list'.$id);
    });

    # Reads article from db and shows in view.
    # Redirecting to [FUNCTION-NO::01]---in-controller.
    Route::get('/admin/article/list{id?}','App\Http\Controllers\admin\articles@show_articles');

    # Inserts article info in db.
    # Redirecting to [FUNCTION-NO::02]---in-controller.
    Route::post('/add/article/{hook?}/{id?}','App\Http\Controllers\admin\articles@insert_article');

    # Edit article info in db.
    # Redirecting to [FUNCTION-NO::03]---in-controller.
    Route::post('/edit/article/{id}','App\Http\Controllers\admin\articles@edit_article');

    # Delete article info in db.
    # Redirecting to [FUNCTION-NO::04]---in-controller.
    Route::get('/delete/article/{id}','App\Http\Controllers\admin\articles@delete_article');

    # Generate article tag.
    # Redirecting to [FUNCTION-NO::05]---in-controller.
    Route::get('/generate/tag/{hook}/{id}','App\Http\Controllers\admin\articles@generate_tag');

    ##############################################################################################################################################
    # Videos.  [C::videos.php]
    ##############################################################################################################################################

    # Go to video add & read from db and shows in view.
    # Redirecting to [FUNCTION-NO::01]---in-controller.
    Route::get('/admin/video/{tag?}','App\Http\Controllers\admin\videos@show_video');

    # Inserts video info in db.
    # Redirecting to [FUNCTION-NO::02]---in-controller.
    Route::post('/add/video','App\Http\Controllers\admin\videos@insert_video');

    # Edit video info in db.
    # Redirecting to [FUNCTION-NO::03]---in-controller.
    Route::post('/edit/video/{id}','App\Http\Controllers\admin\videos@edit_video');

    # Delete video info in db.
    # Redirecting to [FUNCTION-NO::04]---in-controller.
    Route::get('/delete/video/{id}','App\Http\Controllers\admin\videos@delete_video');

    # Search & go to video add & read from db and shows in view.
    # Redirecting to [FUNCTION-NO::05]---in-controller.
    Route::get('/search/video','App\Http\Controllers\admin\videos@search_video');

    ##############################################################################################################################################
    # Education.  [C::education.php]
    ##############################################################################################################################################

    # Go to education add & read from db and shows in view.
    # Redirecting to [FUNCTION-NO::01]---in-controller.
    Route::get('/admin/education','App\Http\Controllers\admin\education@show_education');

    # Inserts education info in db.
    # Redirecting to [FUNCTION-NO::02]---in-controller.
    Route::post('/add/education','App\Http\Controllers\admin\education@insert_education');

    # Edit education info in db.
    # Redirecting to [FUNCTION-NO::03]---in-controller.
    Route::post('/edit/education/{id}','App\Http\Controllers\admin\education@edit_education');

    # Delete education info in db.
    # Redirecting to [FUNCTION-NO::04]---in-controller.
    Route::get('/delete/education/{id}','App\Http\Controllers\admin\education@delete_education');

    # Go to education add & read from db and shows in view.
    # Redirecting to [FUNCTION-NO::05]---in-controller.
    Route::get('/search/education','App\Http\Controllers\admin\education@search_education');

    ##############################################################################################################################################
    # Activity Logs.  [C::log.php]
    ##############################################################################################################################################

    # Read from db and shows in view.
    # Redirecting to [FUNCTION-NO::01]---in-controller.
    Route::get('/admin/activity/{tag?}','App\Http\Controllers\admin\log@show_log');

    # Search & read from db and shows in view.
    # Redirecting to [FUNCTION-NO::02]---in-controller.
    Route::get('/search/activity','App\Http\Controllers\admin\log@search_activity');














    ##############################################################################################################################################
    # Article Builder.  [C::builder.php]
    ##############################################################################################################################################

    # Reads article from db and shows in view.
    # Redirecting to [FUNCTION-NO::01]---in-controller.
    Route::get('/article/editor/{id?}','App\Http\Controllers\article\builder@set_up');

    # Search & read from db and shows in view.
    # Redirecting to [FUNCTION-NO::02]---in-controller.
    Route::get('/search/article','App\Http\Controllers\article\builder@search_article');

    # Select article from view.
    # Redirecting to [FUNCTION-NO::01]---in-controller.
    Route::get('/select/article/{id}', function (Request $request, $id) {
        $request->session()->put('Art_ID',$id);
        return redirect('/article/editor/{id?}');
    });

    # Builds article sections.
    # Redirecting to [FUNCTION-NO::03]---in-controller.
    Route::post('/add/section','App\Http\Controllers\article\builder@build_article');

    # Builds article sections.
    # Redirecting to [FUNCTION-NO::04]---in-controller.
    Route::get('/article/portion/delete/{id}','App\Http\Controllers\article\builder@delete_portion');

    #edit_portion
    # Builds article sections.
    # Redirecting to [FUNCTION-NO::03]---in-controller.
    Route::post('/article/portion/edit/{id}','App\Http\Controllers\article\builder@edit_portion');












});















    # user access
    ##############################################################################################################################################
    # Homepage.  [C::home.php]
    ##############################################################################################################################################

    # Reads personal info from db and shows in view.
    # Redirecting to [FUNCTION-NO::01]---in-controller.
    Route::get('/e','App\Http\Controllers\user\home@show_Personal_Info');

    ##############################################################################################################################################
    # Project.  [C::project.php]
    ##############################################################################################################################################

    # Reads project from db and shows in view.
    # Redirecting to [FUNCTION-NO::01]---in-controller.
    Route::get('/show/all/projects/{tag?}','App\Http\Controllers\user\project@show_projects');

    ##############################################################################################################################################
    # Framework.  [C::framework.php]
    ##############################################################################################################################################

    # Reads framework from db and shows in view.
    # Redirecting to [FUNCTION-NO::01]---in-controller.
    Route::get('/show/all/frameworks/{tag?}','App\Http\Controllers\user\framework@show_frameworks');

    ##############################################################################################################################################
    # Extension.  [C::extension.php]
    ##############################################################################################################################################

    # Reads extension from db and shows in view.
    # Redirecting to [FUNCTION-NO::01]---in-controller.
    Route::get('/show/all/extensions/{tag?}','App\Http\Controllers\user\extension@show_extensions');

    ##############################################################################################################################################
    # About.  [C::about.php]
    ##############################################################################################################################################

    # Reads about from db and shows in view.
    # Redirecting to [FUNCTION-NO::01]---in-controller.
    Route::get('/open/about/page/','App\Http\Controllers\user\about@show_about');

    ##############################################################################################################################################
    # Article.  [C::article.php]
    ##############################################################################################################################################

    # Reads article from db and shows in view.
    # Redirecting to [FUNCTION-NO::01]---in-controller.
    Route::get('/show/all/articles/{key?}','App\Http\Controllers\user\article@show_article');

    # Searches article from db and shows in view.
    # Redirecting to [FUNCTION-NO::01]---in-controller.
    Route::get('/search/articles/', function (Request $request) {
        $key = $request->input('searchKey');
        return redirect('/show/all/articles/'.$key);
    });

    # Reads full article from db and shows in view.
    # Redirecting to [FUNCTION-NO::02]---in-controller.
    Route::get('/open/article/{id}','App\Http\Controllers\user\article@show_full_article');

    # Reads full article from db and shows in view.
    # Redirecting to [FUNCTION-NO::03]---in-controller.
    Route::get('/show/related/articles/{tag}/{id}','App\Http\Controllers\user\article@show_related_article');

    ##############################################################################################################################################
    # Video.  [C::article.php]
    ##############################################################################################################################################

    # Reads video info from db and shows in view.
    # Redirecting to [FUNCTION-NO::01]---in-controller.
    Route::get('/show/related/videos/{tag}/{title}','App\Http\Controllers\user\video@show_related_video');

    ##############################################################################################################################################
    # Contact.  [C::article.php]
    ##############################################################################################################################################

    # Reads contact info from db and shows in view.
    # Redirecting to [FUNCTION-NO::01]---in-controller.
    Route::get('/open/contact/page/','App\Http\Controllers\user\mail@open_contact');
    
    # Reads video info from db and shows in view.
    # Redirecting to [FUNCTION-NO::02]---in-controller.
    Route::post('/send/mail/','App\Http\Controllers\user\mail@send_mail');