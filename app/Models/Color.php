<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use HasFactory,SoftDeletes;

    public $guarded =  ['id'];
    protected $table = 'vehicle_colors';
    protected $primaryKey  = 'id';

    public function vehicles():HasMany
    {
        return $this->hasMany(Vehicle::class);
    }

}
