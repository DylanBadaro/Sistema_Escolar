<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relación con comisiones
    public function commissions()
    {
        return $this->belongsToMany(Commission::class, 'commission_professor');
    }
}