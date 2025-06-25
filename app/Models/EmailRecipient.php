<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailRecipient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'email_id',
        'is_sent',
        'post_id',
        'try'
    ];

    public function email()
    {
        return $this->belongsTo(Email::class, 'email_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
