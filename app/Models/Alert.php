<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Alert extends Model
{
    public $timestamps = true;
    use HasFactory;

    protected $fillable = [
        'user',
        'type',
        'desc',
        'warehouse_id',
        'storage_id',
        'item_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
    public function storage()
    {
        return $this->belongsTo(Storage::class);
    }
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($alert) {
            $alert->user_id = Auth::id();
            $alert->desc = $alert->getDescriptionForType($alert->type);
        });

        session()->put('alerts',Alert::all()->count() );
    }

    public function getDescriptionForType($type)
    {
        switch ($type) {
            case 'created_warehouse':
                return 'A new warehouse has been created';
                break;
            case 'deleted_warehouse':
                return 'A warehouse has been deleted';
                break;
            case 'created_storage':
                return 'A new storage container has been created';
                break;
            case 'deleted_storage':
                return 'A storage container has been deleted';
                break;
            case 'updated_storage':
                return 'Settings for storage container has been updated';
                break;
            case 'added_storage_item':
                return 'Added an item type to storage';
                break;
            case 'increased_storage_item_quantity':
                return 'Increased item quantity in storage';
                break;
            case 'reduced_storage_item_quantity':
                return 'Reduced item quantity in storage';
                break;
            case 'created_item':
                return 'A new item has been created';
                break;
            case 'deleted_item':
                return 'An item has been deleted';
                break;
            case 'updated_item':
                return 'An item has been updated';
                break;
            case 'reorder_item':
                return 'Item reached reorder amount';
                break;
            case 'storage_reorder_item':
                return 'Storage reached replenish amount';
                break;
        }
    }
}
