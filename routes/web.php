<?php

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

Route::view('/welcome', 'welcome');
Route::view('/', 'daniel');
Route::get('/verse', function()
{
    $data = file_get_contents("http://www.ourmanna.com/verses/api/get/?format=json&order=random");
    $res = json_decode($data);
    /*  
        verse: 
            details:
                reference: "Matthew 5:6"
                text: "Blessed are those who hunger and thirst for righteousness, for they will be filled."
                verseurl: "http://www.ourmanna.com/"
                version: "NIV
    */
    $verse = $res->verse->details;
    
    $response = [
        'text' => $verse->text, 
        'reference' => $verse->reference, 
        'version' => $verse->version, 
    ];
    
    return response($response);
});
