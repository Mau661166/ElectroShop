<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class empleados extends Model   
{
    use HasFactory;
    use Softdeletes;
    protected $primaryKey ='idem';
    protected $fillable =['idem','nombre','apellido','celular','email'
                         ,'sexo','ide','idd','img'];
}
 