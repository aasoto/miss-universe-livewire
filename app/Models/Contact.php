<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact';

    protected $fillable = ['country_id', 'type_id', 'company_name', 'person_name', 'address', 'email', 'phone', 'detail', 'agree'];
}
