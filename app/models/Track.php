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
    protected $fillable = ['size', 'total_time', 'date_added',
        'play_date', 'play_date_utc', 'persistent_id', 'track_type', 'file_folder_count', 'album', 'genre', 'name', '
        artist', 'location', 'rating', 'track_number', 'bpm', 'date_modified', 'bit_rate', 'sample_rate', 'play_count',
        'skip_count', 'skip_date', 'rating_computed', 'compilation', 'artwork_count', 'album_artist',
        'kind', 'library_folder_count', 'sort_album_list'];
}