<?php
/**
 * Created by PhpStorm.
 * User: navarrocantero
 * Date: 03/12/2017
 * Time: 21:55
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $table = 'track';
    protected $fillable = [
        'album',
        'genre',
        'name', '
        artist',
        'size',
        'location',
        'rating',
        'track_number',
        'bpm'
    ];
}