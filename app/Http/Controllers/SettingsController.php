<?php
namespace App\Http\Controllers;
use App\Http\Requests\SettingsRequest;

class SettingsController extends Controller {

   public function index()
   {
       return view('settings.index');
   }

   public function update(SettingsRequest $request)
   {
      return $request->all();
   }

}
