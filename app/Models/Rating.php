<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
class Rating extends Model
{
    use HasFactory;

    // protected $guarded = [];
    // public function user(): \Illuminate\Database\Eloquent\Relations\belongsTo
    // {
    //     return $this->belongsTo(User::class);
    // }
    protected $guarded = [];

        public function product()
        {
            return $this->belongsTo(Product::class);
        }
    }
