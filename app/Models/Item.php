<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function warehouses()
    {
        return $this->belongsToMany(Warehouse::class)->withTimestamps()->withPivot('stock');
    }
}
