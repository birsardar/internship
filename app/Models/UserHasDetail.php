<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHasDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'mobile_number', 'gender',
        'city', 'country', 'linkedin', 'twitter', 'facebook',
        'telegram', 'instagram', 'discord', 'pinterest', 'avatar', 'about',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
