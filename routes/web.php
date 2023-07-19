<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\API\JadwalKegiatanController;
use App\Http\Controllers\SendRevController;
use App\Http\Controllers\ExportController;

use Illuminate\Support\Facades\Route;

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

Route::middleware('guest')->group(function () {
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'loginView'])->name('loginView');
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
    Route::get('/register', [\App\Http\Controllers\AuthController::class, 'regisView'])->name('regisView');

    Route::post('/coba', [App\Http\Controllers\API\RegisterController::class,'getcodes'])->name('coba');
});


Route::middleware('auth')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
    Route::get('/', [PagesController::class, 'formsusersetting'])->name('index');
    Route::prefix('/elements')->group(function () {
        Route::get('avatar', [PagesController::class, 'elementsAvatar'])->name('elements/avatar');
        Route::get('alert', [PagesController::class, 'elementsAlert'])->name('elements/alert');
        Route::get('button', [PagesController::class, 'elementsButton'])->name('elements/button');
        Route::get('button-group', [PagesController::class, 'elementsButtonGroup'])->name('elements/button-group');
        Route::get('badge', [PagesController::class, 'elementsBadge'])->name('elements/badge');
        Route::get('breadcrumb', [PagesController::class, 'elementsBreadcrumb'])->name('elements/breadcrumb');
        Route::get('card', [PagesController::class, 'elementsCard'])->name('elements/card');
        Route::get('divider', [PagesController::class, 'elementsDivider'])->name('elements/divider');
        Route::get('mask', [PagesController::class, 'elementsMask'])->name('elements/mask');
        Route::get('progress', [PagesController::class, 'elementsProgress'])->name('elements/progress');
        Route::get('skeleton', [PagesController::class, 'elementsSkeleton'])->name('elements/skeleton');
        Route::get('spinner', [PagesController::class, 'elementsSpinner'])->name('elements/spinner');
        Route::get('tag', [PagesController::class, 'elementsTag'])->name('elements/tag');
        Route::get('tooltip', [PagesController::class, 'elementsTooltip'])->name('elements/tooltip');
        Route::get('typography', [PagesController::class, 'elementsTypography'])->name('elements/typography');
    });
    Route::prefix('/components')->group(function () {
        Route::get('accordion', [PagesController::class, 'componentsAccordion'])->name('components/accordion');
        Route::get('collapse', [PagesController::class, 'componentsCollapse'])->name('components/collapse');
        Route::get('tab', [PagesController::class, 'componentsTab'])->name('components/tab');
        Route::get('dropdown', [PagesController::class, 'componentsDropdown'])->name('components/dropdown');
        Route::get('popover', [PagesController::class, 'componentsPopover'])->name('components/popover');
        Route::get('modal', [PagesController::class, 'componentsModal'])->name('components/modal');
        Route::get('drawer', [PagesController::class, 'componentsDrawer'])->name('components/drawer');
        Route::get('steps', [PagesController::class, 'componentsSteps'])->name('components/steps');
        Route::get('timeline', [PagesController::class, 'componentsTimeline'])->name('components/timeline');
        Route::get('menu-list', [PagesController::class, 'componentsMenuList'])->name('components/menu-list');
        Route::get('treeview', [PagesController::class, 'componentsTreeview'])->name('components/treeview');
        Route::get('table', [PagesController::class, 'componentsTable'])->name('components/table');
        Route::get('table-advanced', [PagesController::class, 'componentsTableAdvanced'])->name('components/table-advanced');
        Route::get('table-gridjs', [PagesController::class, 'componentsTableGridjs'])->name('components/gridjs');
        Route::get('apexchart', [PagesController::class, 'componentsApexchart'])->name('components/apexchart');
        Route::get('swiper', [PagesController::class, 'componentsSwiper'])->name('components/swiper');
        Route::get('notification', [PagesController::class, 'componentsNotification'])->name('components/notification');
        Route::get('extension-clipboard', [PagesController::class, 'componentsExtensionClipboard'])->name('components/extension-clipboard');
        Route::get('extension-persist', [PagesController::class, 'componentsExtensionPersist'])->name('components/extension-persist');
        Route::get('extension-monochrome', [PagesController::class, 'componentsExtensionMonochrome'])->name('components/extension-monochrome');
    });
    Route::prefix('/forms')->group(function () {
        Route::get('Usersetting', [PagesController::class, 'formsusersetting'])->name('forms/Usersetting');
        Route::get('Kategorikegiatan',[PagesController::class,'formkategorikegiatan'])->name('forms/Kategorikegiatan');
        Route::get('Addjadwal',[PagesController::class,'formaddjadwal'])->name('forms/Addjadwal');
        Route::get('Daftardiksa',[PagesController::class,'formdaftardiksa'])->name('forms/Daftardiksa');
        Route::get('Adminuser',[PagesController::class,'formadminuser'])->name('forms/Adminuser');
        Route::get('Usertable',[PagesController::class,'formusertable'])->name('forms/Usertable');
        Route::get('Buatkartu',[PagesController::class,'formbuatkartu'])->name('forms/Buatkartu');
        Route::get('divisi',[PagesController::class,'formdivisi'])->name('forms/divisi');
        Route::get('addvihara',[PagesController::class,'formaddvihara'])->name('forms/addvihara');
        Route::get('Jadwalsementara',[PagesController::class,'formadmitjw'])->name('forms/Jadwalsementara');
        Route::get('Filterlaporandiksa',[PagesController::class,'formfilterdiksa'])->name('forms/Filterlaporandiksa');
        Route::get('Absensi',[PagesController::class,'formabsensi'])->name('forms/Absensi');
        Route::get('Sumbanganscan',[PagesController::class,'formsumbangan'])->name('forms/Sumbanganscan');
        Route::get('RegisAdmin',[PagesController::class,'formregisadmin'])->name('forms/RegisAdmin');
        Route::get('Filterkegiatan',[PagesController::class,'formfilterkegiatan'])->name('forms/Filterkegiatan');
    });
    Route::prefix('/layouts')->group(function () {
        Route::get('onboarding', [PagesController::class, 'layoutsOnboarding'])->name('layouts/onboarding');
        Route::get('Buktidiksa/{data}',[SendRevController::class,'index'])->name('layouts/Buktidiksa');
        Route::get('Lapdiksa/{data}',[SendRevController::class,'layoustspdfdiksa'])->name('layouts/Lapdiksa');
        Route::get('Laporanjadwal',[PagesController::class,'layoutslapjadwal'])->name('layouts/Laporanjadwal');
        Route::get('Absensikegiatan',[PagesController::class,'layoutsabsenkegiatan'])->name('layouts/Absensikegiatan');
        Route::get('Lihatjadwal',[PagesController::class,'layoutsjadwal'])->name('layouts/Lihatjadwal');
        Route::get('Scanabsensi/{kodeposting}',[JadwalKegiatanController::class,'getkegiatanqr'])->name('layouts/Scanabsensi');
        Route::get('Scansumbangan',[PagesController::class,'layoutssumbangan'])->name('layouts/Scansumbangan');
        Route::get('Laporankegiatan/{data}',[SendRevController::class,'layoutskegiatan'])->name('layouts/laporankegiatan');
        Route::get('Laporandiksa',[PagesController::class,'layoutslaporandiksa'])->name('layouts/laporandiksa');
    });
    Route::prefix('/apps')->group(function () {
        Route::get('chat', [PagesController::class, 'appsChat'])->name('apps/chat');
        Route::get('filemanager', [PagesController::class, 'appsFilemanager'])->name('apps/filemanager');
        Route::get('kanban', [PagesController::class, 'appsKanban'])->name('apps/kanban');
        Route::get('list', [PagesController::class, 'appsList'])->name('apps/list');
        Route::get('mail', [PagesController::class, 'appsMail'])->name('apps/mail');
        Route::get('nft-1', [PagesController::class, 'appsNft1'])->name('apps/nft1');
        Route::get('nft-2', [PagesController::class, 'appsNft2'])->name('apps/nft2');
        Route::get('pos', [PagesController::class, 'appsPos'])->name('apps/pos');
        Route::get('todo', [PagesController::class, 'appsTodo'])->name('apps/todo');
        Route::get('travel', [PagesController::class, 'appsTravel'])->name('apps/travel');
    });
    Route::prefix('/dashboards')->group(function () {
        Route::get('pandita', [PagesController::class, 'dashboardsPandita'])->name('dashboards/pandita');
        Route::get('user',[PagesController::class,'dashboardsUser'])->name('dashboards/user');
       
    });
    Route::prefix('/userdashboard')->group(function(){
        Route::get('user', [PagesController::class, 'userdashboard'])->name('userdashboards/user');
    });

    Route::prefix('/Laporanex')->group(function(){
        Route::get('exportuser',[ExportController::class,'exportuserlap'])->name('laporanex/exportuser');
        
        
    });

});
