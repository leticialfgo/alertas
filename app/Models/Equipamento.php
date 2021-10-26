<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Equipamento extends Model
{
    use HasFactory;

    protected $guarded = ['id']; 

    public function getPingDateAttribute($value) 
    {
        if($value) return Carbon::CreateFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y H:i:s');
    }

    public function getAtivo(){
        $atividade = [
            '1' => [
                'name' => "Ativo",
            ],
            '0' => [
                'name' => "Inativo",
            ],
        ];

        return $atividade;
    }

}
