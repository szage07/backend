<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;
use thiagoalessio\TesseractOCR\TesseractOCR;

class AiController extends Controller
{
   public function ocr(UserRequest $request){

    $images = Storage::allFiles('public/ocr');

    $imagePath =  $request->file('image')->storePublicly('ocr','public');

    $fullPath = storage_path('app/public/') . $imagePath;

   $parseText =  (new TesseractOCR($fullPath ))
   ->run();

   $response =[
    'image_path'  => $imagePath ,
    'full_path'   => $fullPath,
    'text'        => $parseText ,
   ];

   return $response;

   }
}
