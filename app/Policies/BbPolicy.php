<?php

namespace App\Policies;

use App\Models\Bb;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BbPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    

    /**
     * Разрешает только хозяину объявлений их редактировать
     * 
     * @return bool
     *     
     *  */
    public function update(User $user, Bb $bb)
    {
        return $bb->user->id === $user->id;
    }

     /**
     * Разрешает только хозяину объявлений их удалять
     * 
     * @return bool
     *     
     *  */

    public function destroy(User $user, Bb $bb)
    {
        return $this->update($user,$bb);
    }
}
