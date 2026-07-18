<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['arrival_date', 'departure_day', 'amount', 
'income_source', 'remarks', 'user_id', 'guest_id', 'property_id'])]
class Rent extends Model
{
    
}
