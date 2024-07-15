<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllServiceDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function detail() {
        return $this->belongsTo(ServiceDetail::class);
    }
}
