<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    // app/Models/Client.php

protected $fillable = [
    'full_name',
    'email',
    'phone',
    'national_id',
    'project',
    'unit_type',
    'inquiry_type',
    'message',
];

}
