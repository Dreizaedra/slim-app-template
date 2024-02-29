<?php

namespace App\Model;

use App\Interface\ModelInterface;
use Illuminate\Database\Eloquent\Model;

final class User extends Model implements ModelInterface
{
    public function getAll() {
        return $this::select('id', 'email', 'password')->get();
    }
}