<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class table extends Model
{
    use HasFactory;

    protected $table = 'table_reastau';

    protected $fillable = [
        'name',
        'id',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
