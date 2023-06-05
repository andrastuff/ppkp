<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_setting extends Model
{
    public $timestamps = false; 
    protected $table = 'tbl_setting';
    protected $primaryKey = 'idset';
	
	protected $guarded = [];	
}
