<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable = [
        'Product_name',
        'description',
        'section_id',
    ];
public function section()
{
    return $this->belongsTo('App\Models\sections');
}
}
