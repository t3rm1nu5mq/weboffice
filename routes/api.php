<?php

    use Illuminate\Http\Request;

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
    */

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    ###############
    ## resources ##
    ###############
    Route::resource('payments', 'API\PaymentController');

    Route::resource('partners', 'API\PartnerController');

    Route::resource('issues', 'API\IssueController');
    ########################################################

    Route::post('/additional_data', ['uses' => 'API\AdditionalDataController@get']);

    Route::get('/partners_count', ['uses' => 'API\PartnerController@partners_count']);

    Route::post('/send_contact_message', ['uses' => 'API\MessagingController@sendContactMessage']);
