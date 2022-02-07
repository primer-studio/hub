<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'url',
        'timestamp',
        'publisher_id',
        'service_id',
    ];

    public function publisher() {
        return $this->belongsTo(Publisher::class);
    }

    public function service() {
        return $this->belongsTo(Service::class);
    }
}
