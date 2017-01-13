<?php
/**
 * Created by PhpStorm.
 * User: aston
 * Date: 13/01/17
 * Time: 14:03
 */

namespace Aston\Entity;

use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    protected $fillable = ['title', 'author_id', 'genre_id', 'body'];
    protected $table = 'book';
    
    public function author() {
        return $this->belongsTo('Author');
    }
    
    public function genre() {
        return $this->belongsTo('Genre');
    }
}