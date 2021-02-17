<?php

namespace App\Http\Controllers;

use App\TransactionCategory;
use App\IncomeExpense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

/**
 * @group Expense Category
 * @authenticated
 */
class ExpenseCategoryController extends Controller
{
    /**
     * Get expense categories
     *
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

        $query = TransactionCategory::where('created_by', Auth::id())
            ->where('category_type', 'Expense');

        $result = $query->apify();

        return response()->json($result);
    }

    /**
     * Store expense category
     *
     * @bodyParam category_name string required - Example: Shopping
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('transaction_categories', 'category_name')->where('created_by', Auth::id()),
            ]
        ]);

        $expenseCategory = new TransactionCategory();
        $expenseCategory->category_name = $request->category_name;
        $expenseCategory->category_type = 'Expense';
        $expenseCategory->created_by = Auth::id();
        $expenseCategory->save();

        return response()->json(['data' => 'expense_category_added', 'request' => $request->all()], 201);
    }

    /**
     * Show a category info
     *
     * @urlParam id required Category id to show Example: 1
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return response()->json(TransactionCategory::find($id));
    }

    /**
     * Update a category
     *
     * @urlParam id required Category id to update Example: 1
     * @bodyParam category_name string required New category name to update Example: Travel
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('transaction_categories', 'category_name')
                    ->where('created_by', Auth::id())
                    ->ignore($id),
            ]
        ]);

        $expenseCategoryById = TransactionCategory::findOrFail($id);
        $expenseCategoryById->category_name = $request->category_name;
        $expenseCategoryById->updated_by = Auth::id();
        $expenseCategoryById->save();

        return response()->json(['data' => 'expense_category_updated', 'request' => $request->all()], 200);
    }

    /**
     * Delete a category
     *
     * @urlParam id required Category id to delete Example: 1
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $expenseCategoryById = TransactionCategory::deletable()->where('created_by', Auth::id())->findOrFail($id);

        if ($expenseCategoryById->delete()) {
            return response()->json(['data' => 'expense_category_deleted'], 200);
        } else {
            return response()->json(['error' => 'unauthorised'], 403);
        }
    }
}
