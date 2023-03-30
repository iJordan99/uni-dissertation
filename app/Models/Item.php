<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Item extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $attributes = [
        'perishable' => 0
    ];

    protected static function boot()
    {
        parent::boot();
        static::created( function ($model) {
            $user = Auth::user();
            $alert = new Alert([
                'type' => 'created_item',
                'item_id' => $model->id
            ]);
            $user->alerts()->save($alert);
        });

        static::updated(function ($model) {
            $user = Auth::user();
            $alert = new Alert([
                'type' => 'updated_item',
                'item_id' => $model->id
            ]);
            $user->alerts()->save($alert);
        });

    }

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
