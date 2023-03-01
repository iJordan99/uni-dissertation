<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function storageBins()
    {
        return $this->belongsToMany(StorageBin::class)->withPivot('amount');
    }
}
