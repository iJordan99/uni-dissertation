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
        'reference',
        'weight',
        'height',
        'width',
        'length',
        'perishable',
        'shelf'
    ];

    public function scopeFilter($query){
        if(request('search')){
            $query
                ->where('name','like', '%'. request('search') . '%')
                ->orWhere('reference','like','%'.request('search') .'%');
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
