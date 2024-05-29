<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'payment_method',
        'amount',
        'reference',
        'student_level'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
