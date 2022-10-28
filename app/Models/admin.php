<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Extension\Attributes\Node\Attributes;
use Illuminate\Database\Eloquent\SoftDeletes;

class admin extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'admins'; 
    protected $primaryKey = 'adminId';
    protected $fillable = [
        'adminFirstName',
        'adminLastName',
        'adminEmail',
        'adminPassword',
    ];
    public function setAdminFirstNameAttribute($fName)
    {
        $this->attributes['adminFirstName'] = ucwords($fName);
    }
    public function setAdminLastNameattribute($lname)
    {
        $this->attributes['adminLastName'] = ucwords($lname);
    }
}
