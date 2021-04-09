<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StoreWatchlist extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize($animeId)
    {
        // autorise si l'utilisateur est connecté et que l'anime n'a pas déjà été ajouté à sa playlist
        if (Auth::check()) {
            $animeAlreadyAdded = DB::table('watchlists')->where('user_id', Auth::id())->where('anime_id', $animeId)->exists();

            if (!$animeAlreadyAdded) {
                return true;
            } 

            return false;
            
        } 
            
        return false;
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
