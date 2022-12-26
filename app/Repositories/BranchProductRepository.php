<?php

namespace App\Repositories;

use App\Models\BranchProduct;
use Symfony\Component\HttpFoundation\Request;

class BranchProductRepository
{
    public function search(Request $request)
    {
        $branchProducts = BranchProduct::query()->orderByDesc("id")
            ->where('branch_id','=',1);

        if ($request->filled('bundle')) {
            $branchProducts->whereHas('product', function ($query) use ($request) {
                $query->where('bundle', '=', $request->get('bundle'));
            });
        }

        if ($request->filled('category_ids')) {
            $branchProducts->whereHas('product', function ($query) use ($request) {
                $query->whereIn('category_id', $request->get('category_ids'));
            });
        }

        return $branchProducts;
    }
}
