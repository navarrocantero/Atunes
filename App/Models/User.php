<?php
/**
 * Created by PhpStorm.
 * User: navarrocantero
 * Date: 03/12/2017
 * Time: 21:55
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User Extends Model
{
    protected $table = "user";
    protected $fillable = ['name', 'email', 'password'];
}
