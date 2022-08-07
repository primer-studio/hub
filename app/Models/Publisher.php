<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'website',
        'feeds',
        'settings',
        'avatar',
    ];

    public function news() {
        return $this->hasMany(News::class);
    }

    public function getSettings($key) {
        return (is_null($this->settings)) ? null : (json_decode($this->settings))->$key;
    }
}
