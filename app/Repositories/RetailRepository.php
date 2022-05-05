<?php

namespace App\Repositories;

use App\User;

class RetailRepository
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function retails()
    {
        $retails = $this->user->retails()->first();
        return $retails;
    }


}
