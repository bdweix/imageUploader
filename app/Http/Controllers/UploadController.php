<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use App\Product;
use Storage;
use App\ProductsPhoto;

class UploadController extends Controller
{

    public function uploadForm()
    {
        return view('upload.upload_form');
    }

    public function uploadSubmit(UploadRequest $request)
    {
      //check to see if existing product where pnames match
      $product=Product::where('name', $request->name)->first();
      //if not create a new product
      if(!$product)
        $product = Product::create($request->all());

      //dd($request->photos);
      $images = $request->file('photos');
      foreach($images as $image){
        $imageName = time().$image->getClientOriginalName();
        $t = Storage::disk('s3')->put($imageName, file_get_contents($image), 'public');
        $imageName = Storage::disk('s3')->url($imageName);
        ProductsPhoto::create([
            'product_id' => $product->id,
            'filename' => $imageName,
        ]);
      }

      return 'Upload successful!';
    }

    public function show(Product $product)
    {
        $urls= ProductsPhoto::where('product_id', $product->id)->get();
        //dd($urls);
        //dd((compact('urls')));

        return view('upload.photos_show', compact('urls'));

    }
    public function gallery(Product $product)
    {
         $urls = ProductsPhoto::where('product_id', $product->id)->get();
         return view('galleries.gallery');
    }
}
