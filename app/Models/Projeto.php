<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $fillable = [
        'cliente_id',
        'titulo',
        'descricao',
        // 'categoria',
        'orcamento',
        // 'status',
        'prazo',
        'qtdprestadores',
        'created_at'
        // 'habilidades_necessarias',
        // 'numero_membros_equipe_desejado',
        // 'cargos_equipe_desejados',
        // Outros campos específicos do Projeto
    ];

    public static $rules = [
        'titulo' => 'required',
        'descricao' => 'required',
        'orcamento' => 'numeric',
        'prazo' => 'integer',
        'qtdprestadores' => 'integer',
        // Adicione outras regras de validação conforme necessário
    ];

    public function equipe()
    {
        return $this->hasMany(Equipe::class, 'projeto_id');
    }

    public function cliente()
    {
        return $this->belongsTo(User::class, 'cliente_id');
    }

    
}
