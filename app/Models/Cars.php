<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;

    protected $fillable = ["reg_number", "brand", "model", "owners_id"];
    public function owners(){
        return $this->belongsTo(Owners::class);
    }
}
