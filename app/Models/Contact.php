<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ["c_fname" , "c_lname", "c_email" , "c_subject" ,"c_message", "status" ,"ip"];
}
