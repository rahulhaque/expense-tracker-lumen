<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncomeExpense extends Model
{
    public static $COLOR_PROFILE = [
        'Income' => '#55dda9',
        'Expense' => '#ffb102'
    ];

    public function category()
    {
        return $this->belongsTo(TransactionCategory::class,'category_id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class,'currency_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
