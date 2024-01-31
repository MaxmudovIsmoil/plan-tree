<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CableChange extends Model
{
    use HasFactory;

    public $fillable = [
        'cable_id',
        'user_id',
        'old_name',
        'new_name',
        'old_remain_stock',
        'new_remain_stock',
        'new_purpose',
        'old_purpose',
        'old_expected_delivery',
        'new_expected_delivery',
        'deleted_at',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
