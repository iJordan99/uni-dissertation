<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageBin extends Model
{
    use HasFactory;

    protected $fillable = [
        'identifier',
        'capacity',
        'replenish'
    ];

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class)->withPivot('quantity');
    }

}
