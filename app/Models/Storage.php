<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        'identifier',
        'capacity',
        'replenish'
    ];

    public function scopeFilter($query, Warehouse $warehouse){
        if(request('search')){
            $query
                ->where('identifier','like', '%'. request('search') . '%')
                ->where('warehouse_id', $warehouse->id)
                ->orWhereHas('items', fn($query) => $query->where('name', 'like', '%' . request('search') . '%'));;
        }

    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class)->withPivot('quantity')->withTimestamps();
    }

}
