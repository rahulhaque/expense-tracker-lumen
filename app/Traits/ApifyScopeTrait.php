<?php

namespace App\Traits;


trait ApifyScopeTrait
{
    /**
     * Make a query API ready
     *
     * @param $query
     * @return array
     */
    public function scopeApify($query)
    {
        $request = app('request');

        $query->orderBy(
            $request->sort_col ? $request->sort_col : 'id',
            $request->sort_order ? $request->sort_order : 'asc'
        );

        if (is_array($request->search_col) || is_array($request->search_by)) {
            $length = count($request->search_col);
            $query->where(function ($subQuery) use ($request, $length) {
                for ($i = 0; $i < $length; $i++) {

                    if (is_array($request->search_cond) && $i != 0) {
                        $ci = $i - 1;
                        // Search condition exist as an array
                        if ($request->search_cond[$ci] == 'and') {
                            $subQuery->where(
                                $request->search_col[$i],
                                'like',
                                $request->search_by[$i]
                            );
                        } elseif ($request->search_cond[$ci] == 'or') {
                            $subQuery->orWhere(
                                $request->search_col[$i],
                                'like',
                                $request->search_by[$i]
                            );
                        }
                    } elseif (is_string($request->search_cond)) {
                        // Search condition exist as a string
                        if ($request->search_cond == 'and') {
                            $subQuery->where(
                                $request->search_col[$i],
                                'like',
                                $request->search_by[$i]
                            );
                        } elseif ($request->search_cond == 'or') {
                            $subQuery->orWhere(
                                $request->search_col[$i],
                                'like',
                                $request->search_by[$i]
                            );
                        }
                    } else {
                        // If search condition doesn't exist
                        $subQuery->where(
                            $request->search_col[$i],
                            'like',
                            $request->search_by[$i]
                        );
                    }

                }
            });
        }
        elseif ($request->search_col || $request->search_by) {
            $query->where(
                $request->search_col ? $request->search_col : 'id',
                'like',
                $request->search_by ? $request->search_by : ''
            );
        }

        if ($request->per_page && $request->per_page >= 0) {
            $result = $query->paginate($request->per_page);
        } else {
            $result = ['data' => $query->get()];
        }

        return $result;
    }
}