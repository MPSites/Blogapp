<?php

namespace App\Models;

class Category
{
    private $table = 'categories';

    public function getAll(){
        return \DB::table($this->table)->get();
    }
}
