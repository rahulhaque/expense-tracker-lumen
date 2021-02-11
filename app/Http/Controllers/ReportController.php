<?php

namespace App\Http\Controllers;

use App\IncomeExpense;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * @group Summary
 * @authenticated
 */
class ReportController extends Controller
{
    /**
     * Current & last month expenses
     *
     * @url /api/v1/report/expense/months/summary
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function monthlyExpenseSummary()
    {

        $dateTime = new DateTime();

        $userExpenses = IncomeExpense::join('currencies', 'currencies.id', 'income_expenses.currency_id')
            ->where('income_expenses.transaction_type', 'Expense')
            ->where('income_expenses.created_by', Auth::id())
            ->select(
                'currencies.currency_code',
                'currencies.currency_name',
                DB::raw('SUM(income_expenses.amount) AS total'),
                DB::raw('DATE_FORMAT(income_expenses.transaction_date, "%Y-%m") AS expense_month')
            )->groupBy('currency_id', 'expense_month')->get();


        $expenseThisMonth = $userExpenses->where('expense_month', $dateTime->format('Y-m'));

        $expenseLastMonth = $userExpenses->where('expense_month', $dateTime->modify('last day of last month')->format('Y-m'));

        return response()->json(['data' => [
            'expense_this_month' => $expenseThisMonth,
            'expense_last_month' => $expenseLastMonth
        ]], 200);

    }

    /**
     * Current & last month incomes
     *
     * @url /api/v1/report/income/months/summary
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function monthlyIncomeSummary()
    {

        $dateTime = new DateTime();

        $userIncomes = IncomeExpense::join('currencies', 'currencies.id', 'income_expenses.currency_id')
            ->where('income_expenses.transaction_type', 'Income')
            ->where('income_expenses.created_by', Auth::id())
            ->select(
                'currencies.currency_code',
                'currencies.currency_name',
                DB::raw('SUM(income_expenses.amount) AS total'),
                DB::raw('DATE_FORMAT(income_expenses.transaction_date, "%Y-%m") AS income_month')
            )->groupBy('currency_id', 'income_month')->get();

        $incomeThisMonth = $userIncomes->where('income_month', $dateTime->format('Y-m'));

        $incomeLastMonth = $userIncomes->where('income_month', $dateTime->modify('last day of last month')->format('Y-m'));

        return response()->json(['data' => [
            'income_this_month' => $incomeThisMonth,
            'income_last_month' => $incomeLastMonth
        ]], 200);

    }

    /**
     * Get all transactions
     *
     * @url /api/v1/report/transaction
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function transaction()
    {

        $userIncomeExpenses = IncomeExpense::join('currencies', 'currencies.id', 'income_expenses.currency_id')
            ->where('income_expenses.created_by', Auth::id())
            ->select(
                'income_expenses.transaction_type',
                'income_expenses.transaction_date',
                'currencies.currency_code',
                'currencies.currency_name',
                DB::raw('SUM(income_expenses.amount) AS total'),
                DB::raw('DATE_FORMAT(income_expenses.transaction_date, "%Y-%m-%d") AS formatted_date')
            )
            ->groupBy('currency_id', 'transaction_type', 'formatted_date')
            ->get();

        return response()->json(['transactions' => $userIncomeExpenses], 200);

    }
}
