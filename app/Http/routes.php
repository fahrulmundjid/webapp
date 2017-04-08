<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
  /*
Route::get('/', function () {
    return view('welcome');
});
*/
        use Illuminate\Http\Request;
        Route::get('webuserajaxCRUD', function () {
        $webusers = App\Webuser::all();
        return view('ajax.index')->with('webusers',$webusers);
    });
    Route::get('webuserajaxCRUD/{webuser_id?}',function($webuser_id){
        $webuser = App\Webuser::find($webuser_id);
        return response()->json($webuser);
    });
    Route::post('webuserajaxCRUD',function(Request $request){   
        $webuser = App\Webuser::create($request->input());
        return response()->json($webuser);
    });
    Route::put('webuserajaxCRUD/{webuser_id?}',function(Request $request,$webuser_id){
        $webuser = App\Webuser::find($webuser_id);
        $webuser->nama = $request->nama;
        $webuser->alamat = $request->alamat;
        $webuser->save();
        return response()->json($webuser);
    });
    Route::delete('webuserajaxCRUD/{webuser_id?}',function($webuser_id){
        $webuser = App\Webuser::destroy($webuser_id);
        return response()->json($webuser);
    });
    
    