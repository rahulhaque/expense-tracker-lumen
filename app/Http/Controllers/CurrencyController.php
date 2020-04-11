<?php

namespace App\Http\Controllers;

use App\Currency;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * @group Currency
 * @authenticated
 */
class CurrencyController extends Controller
{
    /**
     * Get currencies
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

        $query = Currency::orderBy(
                $request->get('sort_col') ? $request->get('sort_col') : 'id',
                $request->get('sort_order') ? $request->get('sort_order') : 'asc'
            );

        if ($request->get('search_col') || $request->get('search_by')) {
            $query->where(
                $request->get('search_col') ? $request->get('search_col') : 'id',
                $request->get('search_by') ? $request->get('search_by') : ''
            );
        }

        if ($request->get('per_page')) {
            $query = $query->select(
                'currencies.id',
                'currencies.currency_code',
                'currency_name',
                'country'
            )->paginate($request->get('per_page') ? $request->get('per_page') : 10);
        }
        else {
            $data = $query->select(
                'currencies.id',
                'currencies.currency_code',
                'currency_name',
                'country'
            )->get();

            $query = [
                "current_page" => 1,
                "data" => $data
            ];
        }

        return response()->json(
            $query
        );
    }

    /**
     * Store currency
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show currency
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update currency
     *
     * @urlParam id required User id of whom to update currency
     * @bodyParam currency_id int required Currency id to update
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'currency_id' => 'required',
        ]);

        $userById = User::find($id);

        if ($userById->currency_id == $request->currency_id) {
            return response()->json(['data' => 'same_data', 'request' => $request->all()], 422);
        }

        $userById->currency_id = $request->currency_id;
        $userById->save();

        return response()->json(['data' => 'currency_updated', 'request' => $request->all()], 200);
    }

    /**
     * Delete currency
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
