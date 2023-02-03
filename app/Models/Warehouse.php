<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function Items()
    {
        return $this->belongsToMany(Item::class)->withTimestamps()->withPivot('stock');
    }
}
