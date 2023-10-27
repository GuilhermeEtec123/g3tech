<?php

namespace App\Policies;

use App\Models\User;

class ContentPolicy
{
    /**
     * Create a new policy instance.
     */

     public function view(User $user)
     {
         if ($user->clientType === 1) {
             return true;
         }
     
         throw new \Illuminate\Auth\Access\AuthorizationException('Acesso não autorizado para ver o conteúdo.');
     }
     

}
