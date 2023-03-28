<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Storage extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        'identifier',
        'capacity',
        'replenish'
    ];

    protected static function boot()
    {
        parent::boot();
        static::created(function ($model) {
            $user = Auth::user();
            $alert = new Alert([
                'type' => 'created_storage',
                'storage_id' => $model->id
            ]);
            $user->alerts()->save($alert);
        });

        static::updated(function ($model) {
            $user = Auth::user();
            $alert = new Alert([
                'type' => 'updated_storage',
                'storage_id' => $model->id
            ]);
            $user->alerts()->save($alert);
        });
    }

    public function scopeFilter($query){
        if(request('search')){
            $query
                ->where('identifier','like', '%'. request('search') . '%')
                ->orwhereHas('item', fn ($q) => $q->where('name', 'like', '%' . request('search') . '%'));
        }
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function item()
    {
        return $this->belongsToMany(Item::class)->withPivot('quantity')->withTimestamps();
    }
}
