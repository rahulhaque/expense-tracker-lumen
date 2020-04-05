<?php

namespace App\Http\Controllers;

use App\IncomeExpense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
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

        $query = IncomeExpense::join('income_categories', 'income_categories.id', 'income_expenses.category_id')
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
                $request->get('search_by') ? $request->get('search_by') : ''
            );
        }

        return response()->json(
            $query->select(
                'income_expenses.*',
                'income_categories.category_name',
                'currencies.currency_code',
                'currencies.currency_name',
                'currencies.country'
            )->paginate($request->get('per_page') ? $request->get('per_page') : 10)
        );
    }

    /**
     * Store a newly created resource in storage.
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
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(IncomeExpense::find($id));
    }

    /**
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        IncomeExpense::find($id)->delete();
        return response()->json(['data' => 'income_deleted'], 200);
    }

    /**
     * Generate summary of incomes
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
