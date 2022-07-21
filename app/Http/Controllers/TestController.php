<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ErrorResource;
use App\Http\Resources\GeneralResource;
use App\Models\SMProduct;
use Exception;

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['testUploadProductImage']]);
    }

    public function testUploadProductImage(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'files' => 'required',
                'files.*' => 'mimes:jpg,png,jpeg'
            ]);


            if ($request->hasfile('files')) {
                $products = SMProduct::pluck('id')->toArray();

                $files = $request->file('files');

                foreach ($files as $file) {
                    $name = $file->getClientOriginalName();
                    $ext = $file->extension();


                    $fileOrgName = (int) preg_replace("/\.[^.]+$/", "", $name);


                    $prodId = $products[$fileOrgName - 1];
                    $fileName = $prodId . "." . $ext;

                    $file->move(public_path() . '/upload_files/products/', $fileName);

                    $product = SMProduct::find($prodId);
                    $product->image_url = $fileName;
                    $product->save();
                }

                return new GeneralResource((object)array("message" => "Files uploaded successfully"));
            } else {
                throw new Exception("No files found");
            }
        } catch (\Exception $e) {
            return (new ErrorResource($e));
        }
    }
}
