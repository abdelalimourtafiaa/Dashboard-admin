<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order_list';

    protected $fillable = ['image', 'name', 'prix', 'id_table'];


    public function table()
    {
        return $this->belongsTo(table::class, 'id_table');
    }

}
