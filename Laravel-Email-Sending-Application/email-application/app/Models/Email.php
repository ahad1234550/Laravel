<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    // Add the fillable properties
    protected $fillable = [
        'email',
        'user_group_id', // Assuming this is also a mass assignable attribute
    ];

    // Define the relationship with the UserGroup model (if applicable)
    public function userGroup()
    {
        return $this->belongsTo(UserGroup::class);
    }
}
