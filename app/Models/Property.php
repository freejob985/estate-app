<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unit_code',
        'unit_type',
        'phase',
        'floor',
        'area',
        'received',
        'paid',
        'over_payment',
        'down_payment',
        'installments',
        'remaining',
        'maintenance',
        'total',
        'notes',
        'client_number',
        'region',
        'last_updated',
        'compound_name',
'project_name'
    ];

    /**
     * Get the images for the property.
     */
    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }
}
