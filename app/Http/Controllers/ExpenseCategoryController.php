<?php

namespace App\Http\Controllers;

use App\Expense;
use App\ExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ExpenseCategoryController extends Controller
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

        $query = ExpenseCategory::where('created_by', Auth::id())->orderBy(
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
            $query->paginate($request->get('per_page') ? $request->get('per_page') : 10)
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
            'category_name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('expense_categories', 'category_name')->where('created_by', Auth::id()),
            ]
        ]);

        $expenseCategory = new ExpenseCategory();
        $expenseCategory->category_name = $request->category_name;
        $expenseCategory->created_by = Auth::id();
        $expenseCategory->save();

        return response()->json(['data' => 'expense_category_added', 'request' => $request->all()], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(ExpenseCategory::find($id));
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
            'category_name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('expense_categories', 'category_name')
                    ->where('created_by', Auth::id())
                    ->ignore($id),
            ]
        ]);

        $expenseCategoryById = ExpenseCategory::find($id);
        $expenseCategoryById->category_name = $request->category_name;
        $expenseCategoryById->updated_by = Auth::id();
        $expenseCategoryById->save();

        return response()->json(['data' => 'expense_category_updated', 'request' => $request->all()], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expenseByCategoryId = Expense::where('category_id', $id)->first();
        $expenseCategoryById = ExpenseCategory::find($id);

        if ($expenseByCategoryId ||
            $expenseCategoryById->category_name == 'Loan Return' ||
            $expenseCategoryById->category_name == 'Lent') {
            return response()->json(['data' => 'expense_category_in_use'], 409);
        } else {
            ExpenseCategory::find($id)->delete();
            return response()->json(['data' => 'expense_category_deleted'], 200);
        }
    }
}
