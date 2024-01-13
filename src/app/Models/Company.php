<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $guarded = false;
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function employees():HasMany
    {
        return $this->hasMany(Employee::class, 'company_id');
    }

}
