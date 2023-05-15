<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Libro
 *
 * @property $isbn
 * @property $autor
 * @property $titulo
 * @property $precio
 *
 * @property Detallepedido[] $detallepedidos
 * @property Resumenlibro $resumenlibro
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Libro extends Model
{
    
    static $rules = [
		'isbn' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['isbn','autor','titulo','precio'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detallepedidos()
    {
        return $this->hasMany('App\Models\Detallepedido', 'isbn', 'isbn');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function resumenlibro()
    {
        return $this->hasOne('App\Models\Resumenlibro', 'isbn', 'isbn');
    }
    

}
