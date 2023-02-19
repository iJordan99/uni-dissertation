<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageBin extends Model
{
    use HasFactory;

    public function Warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function Items()
    {
        return $this->belongsToMany(Item::class)->withTimestamps();
    }
}
