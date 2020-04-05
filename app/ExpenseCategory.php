<?php
/**
 * Created by PhpStorm.
 * User: Rahul
 * Date: 9/20/2018
 * Time: 1:42 AM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function expense()
    {
        return $this->hasMany(IncomeExpense::class, 'category_id');
    }
}