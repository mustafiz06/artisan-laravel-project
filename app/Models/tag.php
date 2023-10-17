<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tag extends Model
{
    protected $guarded = [' '];
    use HasFactory;
    use SoftDeletes;

    public function ManyRelationwithBlog(){
        return $this->belongsToMany(Blog::class);
    }
}
