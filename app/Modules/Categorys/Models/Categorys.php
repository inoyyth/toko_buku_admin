<?php

namespace App\Modules\Categorys\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorys extends Model
{
    use SoftDeletes;
    protected $table = 'categorys';
    protected $dates = ['deleted_at'];
    //protected $softDelete = true;

    public function DataTables() {
        
    }
}
