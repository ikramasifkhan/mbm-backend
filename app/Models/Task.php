<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'created_by',
        'created_for',
        'description',
        'deadline',
        'status'
    ];

    public function created_by() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function created_for() {
        return $this->belongsTo(User::class, 'created_for', 'id');
    }
}
