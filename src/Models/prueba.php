<?php
namespace Codevar\Citas\Models;
#use Codevar\Citas\Configurations\Models;
use Illuminate\Database\Eloquent\Model;

    class Prueba extends Model{
        protected $table = 'prueba';

        protected $fillable = ['nombre', 'apellido'];

    }