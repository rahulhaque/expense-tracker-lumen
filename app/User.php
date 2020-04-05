<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Model implements JWTSubject, AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'updated_at', 'created_at'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function income()
    {
        return $this->hasMany(IncomeExpense::class, 'created_by')->where('income_expenses.transaction_type', 'Income');
    }

    public function expense()
    {
        return $this->hasMany(IncomeExpense::class, 'created_by')->where('income_expenses.transaction_type', 'Expense');
    }

    public function expenseCategory()
    {
        return $this->hasMany(ExpenseCategory::class, 'created_by');
    }

    public function incomeCategory()
    {
        return $this->hasMany(IncomeCategory::class, 'created_by');
    }
}
