<?php

namespace Modules\Comment\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'comment',
        'type',
        'status',
        'date_fa',
        'time_fa',
    ];

    protected static function newFactory()
    {
        return \Modules\Comment\Database\factories\CommentFactory::new();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
