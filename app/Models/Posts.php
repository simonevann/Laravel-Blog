<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use HasFactory, SoftDeletes;

    #[Validate('image|max:1024')] // 1MB Max
    public $photo;
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'slug', 'parts', 'category_id', 'meta_description','status'];

    public function parts()
    {
        return $this->hasMany(PostParts::class, 'post_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(PostCategories::class, 'category_id', 'id');
    }


}
