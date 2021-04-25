<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReview extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "content" => "bail|required|min:5|string",
            "note" => "bail|required|integer|min:0|max:10",
          ];
    }
}
