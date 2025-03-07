<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MaintenanceRecord extends Model
{
    protected $fillable = [
        'product_id',
        'technician_id',
        'maintenance_date',
        'status',
        'notes',
    ];

    public function product()
    {
       return $this->belongsTo(Product::class);
    }

    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id');
    }
}
