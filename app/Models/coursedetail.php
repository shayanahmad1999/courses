<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coursedetail extends Model
{
    use HasFactory;
    protected $table = 'coursedetails';
    protected $primaryKey = 'cdId';
}
