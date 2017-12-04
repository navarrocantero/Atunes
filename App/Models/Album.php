<?php
/**
 * Created by PhpStorm.
 * User: navarrocantero
 * Date: 30/11/2017
 * Time: 06:13
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'album';
    protected $fillable = ['name', 'artist', 'image', 'album_type'];
}