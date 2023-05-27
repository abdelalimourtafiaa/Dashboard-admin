<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order_list';

    protected $fillable = [
        'name',
        'prix',
        'image',
    ];

    public function table()
    {
        return $this->belongsTo(table::class);
    }

}
