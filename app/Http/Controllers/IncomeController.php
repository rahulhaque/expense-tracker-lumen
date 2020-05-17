<?php

namespace App\Http\Controllers;

use App\IncomeExpense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * @group Income
 * @authenticated
 */
class IncomeController extends Controller
{
    /**
     * Get incomes
     *
     * @queryParam per_page Rows per page (default: 10) Example: 10
     * @queryParam sort_col Column name to sort (default: id) Example: created_at
     * @queryParam sort_order Column sort order (asc\|desc) Example: desc
     * @queryParam search_col Column name to search Example: category_name
     * @queryParam search_by Text to search for Example: Salary
     *
     * @return \Illuminate\Http\Response
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
            ->where('income_expenses.transaction_type', 'Income')
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
     * Store income
     *
     * @bodyParam income_date datetime required Income date Example: 2020-03-30 21:08:36
     * @bodyParam category_id int required Income category id Example: 1
     * @bodyParam amount double required Income amount Example: 100.00
     * @bodyParam source string required Income from Example: Salary
     * @bodyParam notes string required Income notes Example: Through bank
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'income_date' => 'required',
            'category_id' => 'required|integer',
            'source' => 'required|string|max:100',
            'notes' => 'string|max:200',
            'amount' => 'required|numeric',
        ]);

        $income = new IncomeExpense();
        $income->category_id = $request->category_id;
        $income->source = $request->source;
        $income->remarks = $request->notes;
        $income->amount = $request->amount;
        $income->transaction_date = $request->income_date;
        $income->transaction_type = 'Income';
        $income->currency_id = $request->currency_id;
        $income->created_by = Auth::id();
        $income->save();

        return response()->json(['data' => 'income_added', 'request' => $request->all()], 201);
    }

    /**
     * Show income
     *
     * @urlParam id required Income id to show Example: 1
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(IncomeExpense::with('currency', 'category')->find($id));
    }

    /**
     * Update income
     *
     * @urlParam id required Income id to update Example: 1
     * @bodyParam income_date datetime required Income date Example: 2020-03-30 21:08:36
     * @bodyParam category_id int required Income category id Example: 1
     * @bodyParam amount double required Income amount Example: 100.00
     * @bodyParam source string required Income from Example: Business
     * @bodyParam notes string required Income notes Example: Cash
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'income_date' => 'required',
            'category_id' => 'required|integer',
            'source' => 'required|string|max:100',
            'notes' => 'string|max:200',
            'amount' => 'required|numeric',
        ]);

        $incomeById = IncomeExpense::find($id);
        $incomeById->category_id = $request->category_id;
        $incomeById->source = $request->source;
        $incomeById->remarks = $request->notes;
        $incomeById->amount = $request->amount;
        $incomeById->transaction_date = $request->income_date;
        $incomeById->transaction_type = 'Income';
        $incomeById->currency_id = $request->currency_id;
        $incomeById->updated_by = Auth::id();
        $incomeById->save();

        return response()->json(['data' => 'income_updated', 'request' => $request->all()], 200);
    }

    /**
     * Delete income
     *
     * @urlParam id required Income id to delete Example: 1
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (IncomeExpense::where('id', $id)->where('created_by', Auth::id())->delete()){
            return response()->json(['data' => 'income_deleted'], 200);
        }
        return response()->json(['error' => 'unauthorised'], 403);
    }

    /**
     * Summary of incomes
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function summary()
    {
        $userIncomes = IncomeExpense::join('currencies', 'currencies.id', 'income_expenses.currency_id')
            ->where('income_expenses.transaction_type', 'Income')
            ->where('income_expenses.created_by', Auth::id())
            ->select('currencies.currency_code', 'currencies.currency_name', DB::raw('SUM(amount) AS total'))
            ->groupBy('currency_id');

        $incomeThisMonth = $userIncomes->whereYear('income_expenses.transaction_date', date('Y'))
            ->whereMonth('income_expenses.transaction_date', date('n'))
            ->get();

        $incomeToday = $userIncomes->whereDate('income_expenses.transaction_date', date('Y-m-d'))
            ->get();

        return response()->json(['data' => [
            'income_month' => $incomeThisMonth,
            'income_today' => $incomeToday
        ]], 200);
    }
}
