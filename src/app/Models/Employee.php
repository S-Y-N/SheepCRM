<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $guarded = false;
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function employees():BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
