<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class facturas extends Model
{
    use HasFactory;
    use Softdeletes;
    protected $primaryKey = 'idf';
    protected $fillable =['idf','nombre','apellido','razon','ide','email','celular','domicilio','rfc','img'];
}
