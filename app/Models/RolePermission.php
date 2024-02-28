<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_user',
        'role',
        'role_permission',
        'permission',
        'feature'
    ];
}
