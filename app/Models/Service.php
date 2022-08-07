<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    public function news() {
        return $this->hasMany(News::class);
    }
    public function repository() {
        return $this->hasMany(Repository::class);
    }
}
