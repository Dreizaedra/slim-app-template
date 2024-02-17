<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function getAll() {
        return $this::select('id', 'email', 'first_name', 'last_name')->get();
    }
}