<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
     public function rules()
   {
       $rules = [
            //make sure the name is reqired
           'name' => 'required'
       ];

       //make sure all the photos correspond to the correct image requirements
       $photos = count($this->input('photos'));
       foreach(range(0, $photos) as $index) {
           $rules['photos.' . $index] = 'image|mimes:jpeg,bmp,png|max:2000';
       }
      //return both the rules combined
       return $rules;
   }
}
