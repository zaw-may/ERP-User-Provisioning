<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
            'id',
            'name',
            'feature_id'
        ];

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function features() {
        return $this->belongsToMany(Feature::class);
    }
}
