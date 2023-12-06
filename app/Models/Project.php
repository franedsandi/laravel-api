<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }

    protected $fillable = [
        'title',
        'slug',
        'description',
        'publication_date',
        'image',
        'image_original_name',
        'type_id'
    ];

    public static function generateSlug($title){
        $slug = Str::slug($title, "-");
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
