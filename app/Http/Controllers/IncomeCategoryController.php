<?php

namespace App\Http\Controllers;

use App\Income;
use App\IncomeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class IncomeCategoryController extends Controller
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

        $query = IncomeCategory::where('created_by', Auth::id())->orderBy(
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
                Rule::unique('income_categories', 'category_name')->where('created_by', Auth::id()),
            ]
        ]);

        $incomeCategory = new IncomeCategory();
        $incomeCategory->category_name = $request->category_name;
        $incomeCategory->created_by = Auth::id();
        $incomeCategory->save();

        return response()->json(['data' => 'income_category_added', 'request' => $request->all()], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(IncomeCategory::find($id));
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
                Rule::unique('income_categories', 'category_name')
                    ->where('created_by', Auth::id())
                    ->ignore($id),
            ]
        ]);

        $incomeCategoryById = IncomeCategory::find($id);
        $incomeCategoryById->category_name = $request->category_name;
        $incomeCategoryById->updated_by = Auth::id();
        $incomeCategoryById->save();

        return response()->json(['data' => 'income_category_updated', 'request' => $request->all()], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $incomeByCategoryId = Income::where('category_id', $id)->first();
        $incomeCategoryById = IncomeCategory::find($id);

        if ($incomeByCategoryId ||
            $incomeCategoryById->category_name == 'Salary' ||
            $incomeCategoryById->category_name == 'Loan' ||
            $incomeCategoryById->category_name == 'Lent Return') {
            return response()->json(['data' => 'income_category_in_use'], 409);
        } else {
            IncomeCategory::find($id)->delete();
            return response()->json(['data' => 'income_category_deleted'], 200);
        }
    }
}
