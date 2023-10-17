<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    protected $guarded = [' '];
    use HasFactory;
    use SoftDeletes;
    public function RelationwithUser(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function RelationwithCategoty(){
        // return $this->hasOne(Category::class,'id','category_id');
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
