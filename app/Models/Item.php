<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $attributes = [
        'perishable' => 0
    ];

    protected $fillable =[
        'name',
        'sku',
        'weight',
        'height',
        'width',
        'length',
        'perishable',
        'shelf',
        'reorder',
        'cost',
        'price'
    ];

    public function scopeFilter($query){
        if(request('search')){
            $query
                ->where('name','like', '%'. request('search') . '%')
                ->orWhere('sku','like','%'.request('search') .'%');
        }
    }

    public function storage()
    {
        return $this->belongsToMany(Storage::class)->withPivot('quantity')->withTimestamps();
    }

    public function warehouse()
    {
        return $this->belongsToMany(Warehouse::class, 'item_storage')
            ->withPivot('storage_id', 'quantity')
            ->using(Storage::class);
    }
}
