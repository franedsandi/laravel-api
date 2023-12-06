<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Technology extends Model
{
    use HasFactory;

    public function projects(){
        return $this->belongsToMany(Project::class);
    }
    
    protected $fillable = [
        'name',
        'slug',
        'description',
        'level',
    ];

    public static function generateSlug($name){
        $slug = Str::slug($name, "-");
        $original_slug = $slug;
        $exists = Project::where("slug", $slug)->first();
        $c = 1;
        while($exists){
            $slug = $original_slug . "-" . $c;
            $exists = Project::where("slug", $slug)->first();

            $c++;
        }
        return $slug;
    }
}

