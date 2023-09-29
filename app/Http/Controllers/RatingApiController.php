<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
class RatingApiController extends Controller
{
    //get All Ratings
    public Function getRatings(){
        //get All Ratings
        $ratings = Rating::with(['product' => function ($query) {
            $query->select('id', 'title');
        }])->get();
        return response()->json($ratings);
    }

    //delete Rating Api
    public function deleteRating($id){
        $deleteRating = Rating::destroy($id);
        return response()->json($deleteRating);
    }
}
