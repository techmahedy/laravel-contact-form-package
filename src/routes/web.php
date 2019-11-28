<?php


//Contact Route

Route::group(['namespace' => 'Codechief\Contact\Http\Controllers'], function () {
    Route::get("/contact", "ContactController@index")->name("contact");
    Route::post("/contact", "ContactController@store");
});
