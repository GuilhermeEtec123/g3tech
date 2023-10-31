<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
 
    protected $fillable = [
        'id',
        'projeto_id',
        'membro_id',
        'created_at'
    ]; 
    
    public function cliente()
    {
        return $this->belongsTo(User::class, 'cliente_id');
    }
}
