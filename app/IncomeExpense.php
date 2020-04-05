<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncomeExpense extends Model
{
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
