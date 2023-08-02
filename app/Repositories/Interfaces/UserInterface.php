<?php

namespace App\Repositories\Interfaces;

interface UserInterface
{
    public function getUsersList($relations);

    public function getAnInstance($id);
}
