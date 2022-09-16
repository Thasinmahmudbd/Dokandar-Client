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





# Admin access
Route::view('/','Admin/SuperAdmin/Dashboard');
Route::view('/user/notification','Admin/SuperAdmin/UserNotification');
Route::view('/vendor/notification','Admin/SuperAdmin/VendorNotification');
Route::view('/cities','Admin/SuperAdmin/Cities');
Route::view('/add/city','Admin/SuperAdmin/AddCity');
Route::view('/city/admin','Admin/SuperAdmin/CityAdmin');
Route::view('/add/city/admin','Admin/SuperAdmin/AddCityAdmin');
Route::view('/banner','Admin/SuperAdmin/BannerList');
Route::view('/add/banner','Admin/SuperAdmin/AddBanner');
Route::view('/app/user','Admin/SuperAdmin/AppUsers');
Route::view('/order/complaints','Admin/SuperAdmin/OrderComplaints');
Route::view('/order/cancelled','Admin/SuperAdmin/OrderCancelled');

Route::view('/terms','Admin/SuperAdmin/Terms');
Route::view('/about/us','Admin/SuperAdmin/AboutUs');
Route::view('/feedback','Admin/SuperAdmin/Feedback');

Route::view('/setting','Admin/SuperAdmin/Setting');

# Log in [CONTROLLER::login.php]
Route::post('/login','App\Http\Controllers\admin\login@login_admin');

# Log out.
Route::get('/logout', function () {
    session()->forget('Admin');
    return redirect('/admin/login');
});







# Admin functionality [CONTROLLER::personalInfo.php, projects.php], [MIDDLEWARE::AdminAuth.php].
Route::group(['middleware'=>['adminAuth']],function() {



    # Temporary view setup.
    #Route::view('/admin/home','admin/personalInfo');
    #Route::view('/admin/project/list','admin/projectList');
    #Route::view('/admin/project/add','admin/projectAdd');
    #Route::view('/admin/framework/list','admin/frameworkList');
    #Route::view('/admin/framework/add','admin/frameworkAdd');
    #Route::view('/admin/extension/list','admin/extensionList');
    #Route::view('/admin/extension/add','admin/extensionAdd');
    #Route::view('/admin/article/list','admin/articleList');
    #Route::view('/admin/article/add','admin/articleAdd');
    #Route::view('/admin/video','admin/videos');
    #Route::view('/admin/education','admin/education');
    #Route::view('/admin/activity','admin/activity');
    #Route::view('/article/editor','articleBuilder/articleBuilder');

    ##############################################################################################################################################
    # Personal Info.  [C::personalInfo.php]
    ##############################################################################################################################################

    # Reads personal info from db and shows in view.
    # Redirecting to [FUNCTION-NO::01]---in-controller.
    Route::get('/admin/home','App\Http\Controllers\admin\personalInfo@show_Personal_Info');

    # Updates personal info in db.
    # Redirecting to [FUNCTION-NO::02]---in-controller.
    Route::post('/edit/profile','App\Http\Controllers\admin\personalInfo@update_Personal_Info');

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