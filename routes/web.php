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

use Illuminate\Database\Connection;

Route::view('/welcome', 'welcome');
Route::view('/', 'daniel');
Route::view('/my/upwork', 'upwork');
Route::redirect('/upwork-profile', 'https://www.upwork.com/freelancers/~01781d771eb8d36a10');

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

Route::get('/api', function(){
    /* @var $db Connection */
    $db = \DB::connection();
    $res = $db
        ->table(request('table', 'users'))
        ->paginate(request('per_page', 25))
    ;
    $res = json_encode($res, JSON_PRETTY_PRINT);
    $res = request()->wantsJson() ? $res : "<pre>$res</pre>"; 
    return response($res);
});
