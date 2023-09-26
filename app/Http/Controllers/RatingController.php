<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    // Get All Ratings
    public function index(){
        // Get All Rating
        $ratings = Rating::all();
        return view('pages.ratings.index', compact('ratings'));
    }

    public function destroy($id)
    {
            $rating = Rating::findOrFail($id);
            $product_name = $rating->product->title;
            if($rating->rating_level == 1){$rating_level_string = "Poor";}
            elseif($rating->rating_level == 2){$rating_level_string = "Average";}
            elseif($rating->rating_level == 3){$rating_level_string = "Good";}
            elseif($rating->rating_level == 4){$rating_level_string = "Very Good";}
            else{$rating_level_string = "Excellent";}
            $rating->delete();

        return redirect('/ratings')
            ->with('rating_deleted_successfully', "The rating with ID ($rating->id) with rating level ($rating_level_string) for product ($product_name) has been successfully deleted!");
    }

}
