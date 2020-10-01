<?php

namespace App;

use App\Traits\ApifyScopeTrait;
use Illuminate\Database\Eloquent\Model;

class TransactionCategory extends Model
{
    use ApifyScopeTrait;

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function income()
    {
        return $this->hasMany(IncomeExpense::class, 'category_id')->where('transaction_type', 'Income');
    }

    public function expense()
    {
        return $this->hasMany(IncomeExpense::class, 'category_id')->where('transaction_type', 'Expense');
    }
}
