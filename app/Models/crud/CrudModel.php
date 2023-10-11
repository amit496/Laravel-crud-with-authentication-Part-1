<?php

namespace App\Models\crud;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrudModel extends Model
{
    use HasFactory;
    protected $table = 'crud_table';
    protected $fillable = ['name','email','contact','profile','password'];
}
