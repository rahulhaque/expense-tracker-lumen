<?php

namespace App\Http\Controllers;

use App\IncomeExpense;
use App\TransactionCategory;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * @group Charts
 * @authenticated
 */
class ChartController extends Controller
{
    /**
     * Income expense categories
     *
     * @url /api/v1/chart/income-expense/category
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function incomeExpenseCategories()
    {
        $incomeExpenseCategories = TransactionCategory::where('created_by', Auth::id())
            ->orderBy('category_name', 'ASC')
            ->get();

        return response()->json($incomeExpenseCategories);
    }

    /**
     * Month wise
     *
     * @queryParam month Number of month to get data (default: 12) Example: 6
     *
     * @url /api/v1/chart/income-expense/month-wise
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function incomeExpenseDataMonthWise(Request $request)
    {
        $requestedMonths = $request->month ?? 12;
        $thisMonth = date('Y-m-t');
        $previousYearMonth = date("Y-m-01", strtotime($thisMonth . '-' . ($requestedMonths - 1) . ' months'));

        $userIncomeExpenses = IncomeExpense::join('currencies', 'currencies.id', 'income_expenses.currency_id')
            ->where('income_expenses.created_by', Auth::id())
            ->whereDate('income_expenses.created_at', '>=', $previousYearMonth)
            ->whereDate('income_expenses.created_at', '<=', $thisMonth)
            ->select(
                'currencies.currency_code',
                'currencies.currency_name',
                'income_expenses.transaction_type',
                DB::raw('SUM(income_expenses.amount) AS total'),
                DB::raw('DATE_FORMAT(income_expenses.transaction_date, "%Y-%m") AS transaction_month')
            )
            ->groupBy('currency_id', 'transaction_month', 'transaction_type')
            ->get();

        $userCurrencies = $userIncomeExpenses->pluck('currency_code')->unique();
        $userTransactionTypes = $userIncomeExpenses->pluck('transaction_type')->unique();

        $monthPeriod = CarbonPeriod::create($previousYearMonth, $thisMonth)->month();
        $months = collect($monthPeriod)->map(function (Carbon $date) {
            return [
                'value' => $date->format('Y-m'),
                'text' => $date->format('M-Y')
            ];
        });

        $datasets = [];
        foreach ($userCurrencies as $currency) {
            foreach ($userTransactionTypes as $transactionType) {
                if ($userIncomeExpenses->where('currency_code', $currency)->where('transaction_type', $transactionType)->sum('total') > 0) {
                    $datasets[] = [
                        'label' => $transactionType . ' (' . $currency . ')',
                        'backgroundColor' => IncomeExpense::$COLOR_PROFILE[$transactionType],
                        'data' => $months->map(function ($month) use ($userIncomeExpenses, $currency, $transactionType) {
                            return $userIncomeExpenses->where('transaction_month', $month['value'])->where('currency_code', $currency)->where('transaction_type', $transactionType)->sum('total');
                        })
                    ];
                }
            }
        }

        $barChartData['labels'] = $months->pluck('text')->toArray();
        $barChartData['datasets'] = $datasets;
        $barChartOptions = [
            'legend' => [
                'position' => 'top'
            ],
            'tooltips' => [
                'mode' => 'index',
                'intersect' => false
            ]
        ];

        return response()->json(['data' => [
            'barChartData' => $barChartData,
            'options' => $barChartOptions
        ]], 200);
    }

    /**
     * Month and category wise
     *
     * @queryParam month Number of month to get data (default: 12) Example: 6
     * @queryParam category_id required Category id to get data Example: 6
     *
     * @url /api/v1/chart/income-expense/category-wise
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function incomeExpenseDataMonthAndCategoryWise(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|integer'
        ]);

        $requestedMonths = $request->month ?? 12;
        $thisMonth = date('Y-m-t');
        $previousYearMonth = date("Y-m-01", strtotime($thisMonth . '-' . ($requestedMonths - 1) . ' months'));

        $userIncomeExpenses = IncomeExpense::join('currencies', 'currencies.id', 'income_expenses.currency_id')
            ->where('income_expenses.created_by', Auth::id())
            ->where('income_expenses.category_id', $request->category_id)
            ->whereDate('income_expenses.created_at', '>=', $previousYearMonth)
            ->whereDate('income_expenses.created_at', '<=', $thisMonth)
            ->select(
                'currencies.currency_code',
                'currencies.currency_name',
                'income_expenses.transaction_type',
                DB::raw('SUM(income_expenses.amount) AS total'),
                DB::raw('DATE_FORMAT(income_expenses.transaction_date, "%Y-%m") AS transaction_month')
            )
            ->groupBy('currency_id', 'transaction_month', 'transaction_type')
            ->get();

        $userCurrencies = $userIncomeExpenses->pluck('currency_code')->unique();
        $userTransactionTypes = $userIncomeExpenses->pluck('transaction_type')->unique();

        $monthPeriod = CarbonPeriod::create($previousYearMonth, $thisMonth)->month();
        $months = collect($monthPeriod)->map(function (Carbon $date) {
            return [
                'value' => $date->format('Y-m'),
                'text' => $date->format('M-Y')
            ];
        });

        $datasets = [];
        foreach ($userCurrencies as $currency) {
            foreach ($userTransactionTypes as $transactionType) {
                if ($userIncomeExpenses->where('currency_code', $currency)->where('transaction_type', $transactionType)->sum('total') > 0) {
                    $datasets[] = [
                        'label' => $transactionType . ' (' . $currency . ')',
                        'backgroundColor' => IncomeExpense::$COLOR_PROFILE[$transactionType],
                        'data' => $months->map(function ($month) use ($userIncomeExpenses, $currency, $transactionType) {
                            return $userIncomeExpenses->where('transaction_month', $month['value'])->where('currency_code', $currency)->where('transaction_type', $transactionType)->sum('total');
                        })
                    ];
                }
            }
        }

        $barChartData['labels'] = $months->pluck('text')->toArray();
        $barChartData['datasets'] = $datasets;
        $barChartOptions = [
            'legend' => [
                'position' => 'top'
            ],
            'tooltips' => [
                'mode' => 'index',
                'intersect' => false
            ]
        ];

        return response()->json(['data' => [
            'barChartData' => $barChartData,
            'options' => $barChartOptions
        ]], 200);
    }
}
