<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function person()
    {
        return $this->belongsTo(Person::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
