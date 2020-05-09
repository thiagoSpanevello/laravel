<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = "_produtos";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
protected $fillable = [
"nome","valor"
];

}
?>
