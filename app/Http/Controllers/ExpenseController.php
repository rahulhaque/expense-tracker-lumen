<?php

namespace App\Http\Controllers;

use App\IncomeExpense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * @group Expense
 * @authenticated
 */
class ExpenseController extends Controller
{
    /**
     * Get expenses
     *
     * @queryParam per_page Rows per page (default: 10) Example: 10
     * @queryParam sort_col Column name to sort (default: id) Example: created_at
     * @queryParam sort_order Column sort order (asc\|desc) Example: desc
     * @queryParam search_col Column name to search Example: category_name
     * @queryParam search_by Text to search for Example: Lent
     *
     * @url /api/v1/expense
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function index(Request $request)
    {
        $this->validate($request, [
            'per_page' => 'integer|min:0',
            'sort_col' => 'string|max:100',
            'sort_order' => 'string|max:4|in:asc,desc',
            'search_col' => 'string|max:100',
            'search_by' => 'string|max:100',
        ]);

        $query = IncomeExpense::join('transaction_categories', 'transaction_categories.id', 'income_expenses.category_id')
            ->join('currencies', 'currencies.id', 'income_expenses.currency_id')
            ->join('users', 'users.id', 'income_expenses.created_by')
            ->where('income_expenses.transaction_type', 'Expense')
            ->where('income_expenses.created_by', Auth::id())
            ->orderBy(
                $request->get('sort_col') ? $request->get('sort_col') : 'id',
                $request->get('sort_order') ? $request->get('sort_order') : 'asc'
            );

        if ($request->get('search_col') || $request->get('search_by')) {
            $query->where(
                $request->get('search_col') ? $request->get('search_col') : 'id',
                'like',
                $request->get('search_by') ? $request->get('search_by') : ''
            );
        }

        return response()->json(
            $query->select(
                'income_expenses.*',
                'transaction_categories.category_name',
                'currencies.currency_code',
                'currencies.currency_name',
                'currencies.country'
            )->paginate($request->get('per_page') ? $request->get('per_page') : 10)
        );
    }

    /**
     * Store expense
     *
     * @bodyParam expense_date datetime required Expense date Example: 2020-03-30 21:08:36
     * @bodyParam category_id int required Expense category id Example: 1
     * @bodyParam amount double required Expense amount Example: 100.00
     * @bodyParam spent_on string required Expense reason Example: Breakfast
     * @bodyParam remarks string required Expense remarks Example: Coffee and toast
     *
     * @url /api/v1/expense
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'expense_date' => 'required',
            'category_id' => 'required|integer',
            'amount' => 'required|numeric',
            'spent_on' => 'required|string|max:100',
            'remarks' => 'string|max:200'
        ]);

        $expense = new IncomeExpense();
        $expense->category_id = $request->category_id;
        $expense->spent_on = $request->spent_on;
        $expense->remarks = $request->remarks;
        $expense->amount = $request->amount;
        $expense->transaction_date = $request->expense_date;
        $expense->transaction_type = 'Expense';
        $expense->currency_id = $request->currency_id;
        $expense->created_by = Auth::id();
        $expense->save();

        return response()->json(['data' => 'expense_added', 'request' => $request->all()], 201);
    }

    /**
     * Show expense
     *
     * @urlParam id required Expense id to show Example: 1
     *
     * @url /api/v1/expense/{id}
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return response()->json(IncomeExpense::with('currency', 'category')->find($id));
    }

    /**
     * Update expense
     *
     * @urlParam id required Expense id to update Example: 1
     * @bodyParam category_id int required Expense category id Example: 1
     * @bodyParam amount double required Expense amount Example: 100.00
     * @bodyParam spent_on string required Expense reason Example: Breakfast
     * @bodyParam remarks string required Expense remarks Example: Coffee and toast
     *
     * @url /api/v1/expense/{id}
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'expense_date' => 'required',
            'category_id' => 'required|integer',
            'amount' => 'required|numeric',
            'spent_on' => 'required|string|max:100',
            'remarks' => 'string|max:200'
        ]);

        $expenseById = IncomeExpense::find($id);
        $expenseById->category_id = $request->category_id;
        $expenseById->spent_on = $request->spent_on;
        $expenseById->remarks = $request->remarks;
        $expenseById->amount = $request->amount;
        $expenseById->transaction_date = $request->expense_date;
        $expenseById->transaction_type = 'Expense';
        $expenseById->currency_id = $request->currency_id;
        $expenseById->updated_by = Auth::id();
        $expenseById->save();

        return response()->json(['data' => 'expense_updated', 'request' => $request->all()], 200);
    }

    /**
     * Delete expense
     *
     * @urlParam id required Expense id to delete Example: 1
     *
     * @url /api/v1/expense/{id}
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        if (IncomeExpense::where('id', $id)->where('created_by', Auth::id())->delete()) {
            return response()->json(['data' => 'expense_deleted'], 200);
        }
        return response()->json(['error' => 'unauthorised'], 403);
    }

    /**
     * Summary of expenses
     *
     * @url /api/v1/expense/summary
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function summary()
    {
        $userExpenses = IncomeExpense::join('currencies', 'currencies.id', 'income_expenses.currency_id')
            ->where('income_expenses.transaction_type', 'Expense')
            ->where('income_expenses.created_by', Auth::id())
            ->select('currencies.currency_code', 'currencies.currency_name', DB::raw('SUM(amount) AS total'))
            ->groupBy('currency_id');

        $expenseThisMonth = $userExpenses->whereYear('income_expenses.transaction_date', date('Y'))
            ->whereMonth('income_expenses.transaction_date', date('n'))
            ->get();

        $expenseToday = $userExpenses->whereDate('income_expenses.transaction_date', date('Y-m-d'))
            ->get();

        return response()->json(['data' => [
            'expense_month' => $expenseThisMonth,
            'expense_today' => $expenseToday
        ]], 200);
    }
}
