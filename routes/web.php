<?php

use App\Models\Property;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\AreaController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\MetaController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\TermsController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CareerController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\Banner2Controller;
use App\Http\Controllers\Backend\ContentController;
use App\Http\Controllers\Backend\PartnerController;
use App\Http\Controllers\Backend\SubAreaController;
use App\Http\Controllers\Backend\PropertyController;
use App\Http\Controllers\Backend\WhyRentsController;
use App\Http\Controllers\Backend\PropertyIdController;
use App\Http\Controllers\Backend\ExploreAreaController;
use App\Http\Controllers\Backend\GeneralInfoController;
use App\Http\Controllers\Backend\RequirementController;
use App\Http\Controllers\Backend\WhatYouWantController;
use App\Http\Controllers\Backend\EasyGuidelineController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/








Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/admin',  [BackendController::class, 'admin'])->name('admin');
    Route::get('/logout', [BackendController::class, 'authLogout'])->name('authLogout');

    Route::controller(UserController::class)->prefix('/admin/user')->name('backend.user.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{user}', 'edit')->name('edit');
        Route::post('/update/{user}', 'update')->name('update');
        Route::get('/destroy/{user}', 'destroy')->name('trash');
        Route::get('/status/{user}', 'status')->name('status');
        Route::get('/reStore/{id}', 'reStore')->name('reStore');
        Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
        Route::get('/profile', 'profile')->name('profile');
    });


    Route::controller(GeneralInfoController::class)->prefix('/admin/general_info')->name('backend.general_info.')->group(function () {

        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{generalInfo}', 'edit')->name('edit');
        Route::post('/update/{generalInfo}', 'update')->name('update');
    });

    Route::controller(BlogController::class)->prefix('/admin/blog')->name('backend.blog.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{blog}', 'edit')->name('edit');
        Route::post('/update/{blog}', 'update')->name('update');
        Route::get('/destroy/{blog}', 'destroy')->name('trash');
        Route::get('/status/{blog}', 'status')->name('status');
        Route::get('/reStore/{id}', 'reStore')->name('reStore');
        Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
    });
    Route::controller(WhyRentsController::class)->prefix('/admin/whyRents')->name('backend.whyRent.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{whyRents}', 'edit')->name('edit');
        Route::post('/update/{whyRents}', 'update')->name('update');
        Route::get('/destroy/{whyRents}', 'destroy')->name('trash');
        Route::get('/status/{whyRents}', 'status')->name('status');
        Route::get('/reStore/{id}', 'reStore')->name('reStore');
        Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
    });
    Route::controller(BannerController::class)->prefix('/admin/banner')->name('backend.banner.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{banner}', 'edit')->name('edit');
        Route::post('/update/{banner}', 'update')->name('update');
        Route::get('/destroy/{banner}', 'destroy')->name('trash');
        Route::get('/status/{banner}', 'status')->name('status');
        Route::get('/reStore/{id}', 'reStore')->name('reStore');
        Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
    });
    Route::controller(Banner2Controller::class)->prefix('/admin/banner2')->name('backend.banner2.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{banner2}', 'edit')->name('edit');
        Route::post('/update/{banner2}', 'update')->name('update');
        Route::get('/destroy/{banner2}', 'destroy')->name('trash');
        Route::get('/status/{banner2}', 'status')->name('status');
        Route::get('/reStore/{id}', 'reStore')->name('reStore');
        Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
    });
    Route::controller(FaqController::class)->prefix('/admin/faq')->name('backend.faq.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{faq}', 'edit')->name('edit');
        Route::post('/update/{faq}', 'update')->name('update');
        Route::get('/destroy/{faq}', 'destroy')->name('trash');
        Route::get('/status/{faq}', 'status')->name('status');
        Route::get('/reStore/{id}', 'reStore')->name('reStore');
        Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
    });
    Route::controller(ExploreAreaController::class)->prefix('/admin/exploreArea')->name('backend.exploreArea.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{exploreArea}', 'edit')->name('edit');
        Route::post('/update/{exploreArea}', 'update')->name('update');
        Route::get('/destroy/{exploreArea}', 'destroy')->name('trash');
        Route::get('/status/{exploreArea}', 'status')->name('status');
        Route::get('/reStore/{id}', 'reStore')->name('reStore');
        Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
    });
    Route::controller(PartnerController::class)->prefix('/admin/partner')->name('backend.partner.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{partner}', 'edit')->name('edit');
        Route::post('/update/{partner}', 'update')->name('update');
        Route::get('/destroy/{partner}', 'destroy')->name('trash');
        Route::get('/status/{partner}', 'status')->name('status');
        Route::get('/reStore/{id}', 'reStore')->name('reStore');
        Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
    });
    Route::controller(TeamController::class)->prefix('/admin/team')->name('backend.team.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{team}', 'edit')->name('edit');
        Route::post('/update/{team}', 'update')->name('update');
        Route::get('/destroy/{team}', 'destroy')->name('trash');
        Route::get('/status/{team}', 'status')->name('status');
        Route::get('/reStore/{id}', 'reStore')->name('reStore');
        Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
    });
    Route::controller(AboutController::class)->prefix('/admin/about')->name('backend.about.')->group(function () {

        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{about}', 'edit')->name('edit');
        Route::post('/update/{about}', 'update')->name('update');
    });
    Route::controller(WhatYouWantController::class)->prefix('/admin/WhatYouWant')->name('backend.WhatYouWant.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{WhatYouWant}', 'edit')->name('edit');
        Route::post('/update/{WhatYouWant}', 'update')->name('update');
        Route::get('/destroy/{WhatYouWant}', 'destroy')->name('trash');
        Route::get('/status/{WhatYouWant}', 'status')->name('status');
        Route::get('/reStore/{id}', 'reStore')->name('reStore');
        Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
    });
    Route::controller(EasyGuidelineController::class)->prefix('/admin/easyGuideline')->name('backend.easyGuideline.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/indexSub', 'indexSub')->name('indexSub');
        Route::get('/create', 'create')->name('create');
        Route::get('/createSub', 'createSub')->name('createSub');
        Route::post('/store', 'store')->name('store');
        Route::post('/storeSub', 'storeSub')->name('storeSub');
        Route::get('/edit/{easyGuideline}', 'edit')->name('edit');
        Route::post('/update/{easyGuideline}', 'update')->name('update');
        Route::post('/updateSub/{easyGuideline}', 'updateSub')->name('updateSub');
        Route::get('/destroy/{easyGuideline}', 'destroy')->name('trash');
        Route::get('/status/{easyGuideline}', 'status')->name('status');
        Route::get('/reStore/{id}', 'reStore')->name('reStore');
        Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
    });
    // Terms and Condition
    Route::controller(TermsController::class)->prefix('/admin/terms')->name('backend.terms.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{terms}', 'edit')->name('edit');
        Route::post('/update/{terms}', 'update')->name('update');
        Route::get('/destroy/{terms}', 'destroy')->name('trash');
        Route::get('/status/{terms}', 'status')->name('status');
        Route::get('/reStore/{id}', 'reStore')->name('reStore');
        Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
    });
    // Requirement Type
    Route::controller(RequirementController::class)->prefix('/admin/requirementType')->name('backend.requirementType.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{requirementType}', 'edit')->name('edit');
        Route::post('/update/{requirementType}', 'update')->name('update');
        Route::get('/destroy/{requirementType}', 'destroy')->name('trash');
        Route::get('/status/{requirementType}', 'status')->name('status');
        Route::get('/reStore/{id}', 'reStore')->name('reStore');
        Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
    });
    // Property Id
    Route::controller(PropertyIdController::class)->prefix('/admin/propertyId')->name('backend.propertyId.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{propertyId}', 'edit')->name('edit');
        Route::post('/update/{propertyId}', 'update')->name('update');
        Route::get('/destroy/{propertyId}', 'destroy')->name('trash');
        Route::get('/status/{propertyId}', 'status')->name('status');
        Route::get('/reStore/{id}', 'reStore')->name('reStore');
        Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
    });
    // Properties Controller
    Route::controller(PropertyController::class)->prefix('/admin/properties')->name('backend.properties.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');

        Route::get('/edit/{properties}', 'edit')->name('edit');
        Route::post('/update/{properties}', 'update')->name('update');
        Route::get('/destroy/{properties}', 'destroy')->name('trash');
        Route::get('/status/{properties}', 'status')->name('status');
        Route::get('/reStore/{id}', 'reStore')->name('reStore');

        Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
        Route::get('/sub-area-ajax/{slug}',  'sub_areaAjax')->name('sub_area_ajax');
    });
    Route::controller(AreaController::class)->prefix('/admin/area')->name('backend.area.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{area}', 'edit')->name('edit');
        Route::post('/update/{area}', 'update')->name('update');
        Route::get('/destroy/{area}', 'destroy')->name('trash');
        Route::get('/status/{area}', 'status')->name('status');
        Route::get('/reStore/{id}', 'reStore')->name('reStore');
        Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
    });
    Route::controller(SubAreaController::class)->prefix('/admin/subArea')->name('backend.subArea.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/indexBottom', 'indexBottom')->name('indexBottom');
        Route::get('/create', 'create')->name('create');
        Route::get('/createBottom', 'createBottom')->name('createBottom');
        Route::post('/store', 'store')->name('store');
        Route::post('/storeBottom', 'storeBottom')->name('storeBottom');
        Route::get('/edit/{subArea}', 'edit')->name('edit');
        Route::get('/editBottom/{subArea}', 'editBottom')->name('editBottom');
        Route::post('/update/{subArea}', 'update')->name('update');
        Route::post('/updateBottom/{subArea}', 'updateBottom')->name('updateBottom');
        Route::get('/destroy/{subArea}', 'destroy')->name('trash');
        Route::get('/status/{subArea}', 'status')->name('status');
        Route::get('/reStore/{id}', 'reStore')->name('reStore');
        Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
    });
    Route::controller(MetaController::class)->prefix('/admin/meta')->name('backend.meta.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{meta}', 'edit')->name('edit');
        Route::post('/update/{meta}', 'update')->name('update');
        Route::delete('/destroy/{meta}', 'destroy')->name('delete');
    });

    Route::controller(CareerController::class)->prefix('/admin/career')->name('backend.career.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{career}', 'edit')->name('edit');
        Route::post('/update/{career}', 'update')->name('update');
        Route::get('/destroy/{career}', 'destroy')->name('trash');
        Route::get('/status/{career}', 'status')->name('status');
        Route::get('/reStore/{id}', 'reStore')->name('reStore');
        Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
    });
    Route::controller(ContentController::class)->prefix('/admin/content')->name('backend.content.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::post('/upload', 'upload')->name('upload');
       Route::post('/uploadimage', 'uploadimage')->name('ckeditor.upload');

        Route::get('/edit/{content}', 'edit')->name('edit');
        Route::post('/update/{content}', 'update')->name('update');
        Route::get('/destroy/{content}', 'destroy')->name('trash');
        Route::get('/status/{content}', 'status')->name('status');
        Route::get('/reStore/{id}', 'reStore')->name('reStore');
        Route::delete('/permDelete/{id}', 'permDelete')->name('delete');
    });
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/resume', 'resume')->name('resume');
    Route::get('/work', 'work')->name('work');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/contact', 'contact')->name('contact');
    


});



Route::post('sendhtmlemail', [MailController::class, 'html_email'])->name('html_email');



