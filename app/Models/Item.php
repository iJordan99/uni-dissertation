<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public $timestamps = true;

    public function scopeFilter($query){
        if(request('search')){
            $query
                ->where('name','like', '%'. request('search') . '%')
                ->orWhere('reference','like','%'.request('search') .'%');
        }

    }

    public function storageBins()
    {
        return $this->belongsToMany(StorageBin::class)->withPivot('quantity');
    }
}
