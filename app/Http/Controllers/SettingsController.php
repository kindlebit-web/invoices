<?php
namespace App\Http\Controllers;
use App\Http\Requests\SettingsRequest;

class SettingsController extends Controller {

   public function index()
   {
   	   $user = auth()->user();
       return view('settings.index',compact(['user']));
   }

   public function update(SettingsRequest $request)
   {
      return $request->all();
   }

}
