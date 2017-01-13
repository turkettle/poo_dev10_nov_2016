<?php
/**
 * Created by PhpStorm.
 * User: aston
 * Date: 13/01/17
 * Time: 14:03
 */

namespace Aston\Entity;

use Illuminate\Database\Eloquent\Model;


class Author extends Model
{
    protected $fillable = ['title', 'body'];
    protected $table = 'author';
    
    public function books() {
        return $this->hasMany('Book');
    }
}