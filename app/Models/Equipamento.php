<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Equipamento extends Model
{
    use HasFactory;

    public function getPingDateAttribute($value) 
    {
        if($value) return Carbon::CreateFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y H:i:s');
    }
}
