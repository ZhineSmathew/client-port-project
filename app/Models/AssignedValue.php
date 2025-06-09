<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignedValue extends Model
{
    protected $fillable = [
        'unique_value',
        'created_by'
    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'assigned_value_user')->withTimestamps();
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }


}
