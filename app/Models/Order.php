<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['cinema_id', 'room_id', 'event_id', 'seat_id', 'order_date', 'person_session', 'person_name', 'person_email', 'order_status'];
}
