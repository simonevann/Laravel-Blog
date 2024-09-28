<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostParts extends Model
{
    use HasFactory;

    protected $table = 'post_parts';

    protected $primaryKey = 'id';

    protected $fillable = ['post_id', 'content', 'post_type_id', 'order', 'image'];

    public function post()
    {
        return $this->belongsTo(Posts::class);
    }
}
