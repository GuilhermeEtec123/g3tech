<?php
// app/Models/TeamJoinRequest.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamJoinRequest extends Model
{
    protected $fillable = [
        'freelancer_id',
        'team_id',
        'status'
    ];
    protected $table = 'solicitacoes';

    public function user()
    {
        return $this->belongsTo(User::class, 'cliente_id');
    }

    public function equipe()
    {
        return $this->belongsTo(Equipe::class, 'team_id');
    }

    public function freelancer()
    {
        return $this->belongsTo(User::class, 'freelancer_id', 'id');
    }
    
}
