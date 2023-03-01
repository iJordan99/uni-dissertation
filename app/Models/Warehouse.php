<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;


class Warehouse extends Model
{
    use HasFactory;

    public mixed $items;
    protected $fillable = [
        'uuid',
        'name',
        'location',
        'country',
        'postcode'
    ];

    public $timestamps = false;


    protected static function boot()
    {
        parent::boot();
        static::creating( function ($model) {
            $model->uuid = uuid_create();
        });
    }

    public function scopeFilter($query){
        if(request('search')){
            $query
                ->where('name','like', '%'. request('search') . '%');
        }

    }

    public function storageBins()
    {
        return $this->hasMany(StorageBin::class);
    }

    public function items()
    {
        return $this->hasManyThrough(Item::Class,StorageBin::class);
    }


}
