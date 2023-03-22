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
        'street',
        'city',
        'country',
        'postcode'
    ];

    public $timestamps = true;

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

    public function storage()
    {
        return $this->hasMany(Storage::class);
    }

    public function items()
    {
        return $this->hasManyThrough(Item::Class,Storage::class);
    }


}
