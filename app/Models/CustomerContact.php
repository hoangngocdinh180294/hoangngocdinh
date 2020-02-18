<?php

namespace App\Models;

class CustomerContact extends MotbitModel
{
    protected $table='customer_contacts';
    protected $fillable = ['email','phone','full_name','body','status'];
}
