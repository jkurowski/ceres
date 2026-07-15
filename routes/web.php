<?php

use App\Http\Controllers\Front\EmailTemplatePreviewController;
use App\Http\Controllers\Front\IframePageController;
use App\Http\Controllers\SMSController;
use App\Http\Middleware\IframeContactMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Access\AuthorizationException;


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

Route::get('/register', function () {
    abort(404);
});
Route::post('/register', function () {
    abort(404);
});

Route::get('routes', function () {
    Artisan::call('route:list');

    return '<pre>' . Artisan::output() . '</pre>';
});

Route::get('/email/verify/{id}/{hash}', function ($id, $hash) {
    // Pobierz użytkownika na podstawie ID z URL
    $user = User::find($id);

    if (!$user) {
        throw new AuthorizationException('User not found');
    }

    // Sprawdź, czy hash e-maila zgadza się z tym, który jest w URL
    if (!hash_equals(sha1($user->getEmailForVerification()), $hash)) {
        throw new AuthorizationException('Invalid verification link');
    }

    // Jeśli hash pasuje, zweryfikuj e-mail użytkownika
    $user->markEmailAsVerified();
    $user->active = 1;
    $user->save();

    // Przekieruj użytkownika na stronę logowania
    return redirect('/login')->with('verified', true);
})->middleware(['signed'])->name('verification.verify');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->name('verification.notice');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Wiadomość z link aktywacyjnym wysłana!');
})->middleware(['throttle:6,1'])->name('verification.send');


Route::middleware(['restrictIp'])->group(function () {
    Route::get('/kontakt', 'Front\ContactController@index')->name('contact');
    Route::post('/kontakt', 'Front\ContactController@send')->name('contact.send');
    Route::post('/kontakt/{property}', 'Front\ContactController@property')->name('contact.property');

    Route::get('/o-firmie', 'Front\MenuController@index')->defaults('uri', 'o-firmie')->name('about');
    Route::get('/kredyty', 'Front\MenuController@index')->defaults('uri', 'kredyty')->name('kredyty');

    // DeveloPro
    Route::group(['namespace' => 'Front\Developro', 'as' => 'developro.'], function () {

        Route::post('{property}/notifications', 'Property\NotificationController@store')->name('properties.notifications.store');
        Route::get('/unsubscribe/{hash}', 'Property\NotificationController@unsubscribe')->name('properties.notifications.unsubscribe');

        Route::get('/oferta', 'IndexController@index')->name('index');
        Route::get('/wyniki-wyszukiwania', 'SearchController@index')->name('search.index');

        Route::get('/inwestycje-planowane', 'IncomingController@index')->name('incomming');

        Route::get('/inwestycje-zrealizowane', 'CompletedController@index')->name('completed');
        Route::get('/inwestycje-zrealizowane/{slug}', 'CompletedController@show')->name('completed.city');

        Route::get('/i/{slug}/dziennik-inwestycji', 'Article\IndexController@index')->name('investment.news');
        Route::get('/i/{slug}/dziennik-inwestycji/{article}', 'Article\IndexController@show')->name('investment.news.show');

        Route::get('/i/{slug}/galeria', 'Gallery\IndexController@index')->name('investment.gallery');

        Route::get('/i/{slug}', 'InvestmentController@show')->name('show');
        Route::get('/i/{slug}/plan-inwestycji', 'InvestmentPlanController@index')->name('plan');
        Route::get('/i/{slug}/plan-inwestycji-3d', 'InvestmentPlanController@mockup')->name('mockup');

        #Inwestycja budynkowa - pietro
        Route::get('/i/{slug}/{floor},{floorSlug}', 'InvestmentFloorController@index')->name('floor');

        #Inwestycja budynkowa - pietro - mieszkanie
        Route::get('/i/{slug}/{floor},{floorSlug}/{property},{propertySlug},{propertyRooms},{propertyArea}', 'InvestmentPropertyController@index')->name('property');

        #Inwestycja osiedlowa - budynek
        Route::get('/i/{slug}/b/{building},{buildingSlug}', 'InvestmentBuildingController@index')->name('building');

        #Inwestycja osiedlowa - budynek - pietro
        Route::get('/i/{slug}/b/{building},{buildingSlug}/{floor},{floorSlug}', 'InvestmentBuildingFloorController@index')->name('building.floor');

        #Inwestycja osiedlowa - budynek - pietro - mieszkanie
        Route::get('/i/{slug}/b/{building},{buildingSlug}/{floor},{floorSlug}/{property},{propertySlug},{propertyRooms},{propertyArea}', 'InvestmentBuildingPropertyController@index')->name('building.floor.property');

        // Inwestycja domkowa
        Route::get('/{slug}/d/{property}', 'InvestmentHouseController@index')->name('house');

        //Historia cen
        Route::get('/historia/{property}', 'History\IndexController@show')->name('history');
        Route::get('/przynalezne/{property}', 'History\IndexController@others')->name('others');
        Route::get('/przynalezne/{property}/show', 'History\IndexController@other')->name('others.show');
        Route::get('/przynalezne/{property}/table', 'History\IndexController@otherTable')->name('others.table');

        //Pages
        Route::get('/{slug}/{page}', 'Page\IndexController@index')->name('page');

        Route::get('/i/{slug}/json', 'Api\IndexController@json')->name('investment.json');
    });

    Route::group(['namespace' => 'Front', 'prefix' => '{locale?}', 'where' => ['locale' => '[a-z]{2}'],], function () {

        Route::get('/', 'IndexController@index')->name('index');

        Route::get('/kontakt', 'ContactController@index');
        Route::post('/kontakt', 'ContactController@send');

        Route::post('/kontakt/{property}', 'ContactController@property');

        Route::post('/clipboard', 'Clipboard\IndexController@store')->name('clipboard.store');
        Route::post('/clipboard/send', 'Clipboard\IndexController@send')->name('clipboard.send');
        Route::get('/schowek', 'Clipboard\IndexController@index')->name('clipboard.index');
        Route::delete('/clipboard', 'Clipboard\IndexController@destroy')->name('clipboard.destroy');

        Route::resources([
            '/aktualnosci' => 'ArticleController',
            '/gallery' => 'GalleryController'
        ]);

        // Inline
        Route::group(['prefix' => '/inline', 'as' => 'front.inline.'], function () {
            Route::get('/', 'InlineController@index')->name('index');
            Route::get('/loadinline/{inline}', 'InlineController@show')->name('show');
            Route::post('/update/{inline}', 'InlineController@update')->name('update');
        });

        Route::get('{uri}', 'MenuController@index')
            ->where('uri', '^(?!kontakt|schowek|o-firmie|kredyty|aktualnosci|gallery|oferta-mieszkan|wyniki-wyszukiwania|inwestycje-planowane|inwestycje-zrealizowane|i/|historia/|przynalezne/|inline/|unsubscribe/)[A-Za-z0-9\-\/]+')
            ->name('menu.show');
    });
});
