<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catetgory extends Model
{
    use HasFactory;

    public function categoryChild()
    {
        return $this->hasMany(Catetgory::class, 'parent_id');
    }
}
