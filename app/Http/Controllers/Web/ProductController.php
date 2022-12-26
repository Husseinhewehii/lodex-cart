<?php

namespace App\Http\Controllers\Web;

use App\Constants\BannerTypes;
use App\Http\Controllers\BaseController;
use App\Http\Services\ProductService;
use App\Models\BranchProduct;
use App\Models\Category;
use App\Repositories\BannerRepository;
use App\Repositories\BranchProductRepository;
use App\Repositories\BranchRepository;
use App\Repositories\ProductRepository;
use View;

class ProductController extends BaseController
{
    protected $productRepository;
    protected $branchProductRepository;
    protected $bannerRepository;
    protected $productService;

    public function __construct(
        ProductRepository $productRepository,
        BranchProductRepository $branchProductRepository,
        BannerRepository $bannerRepository,
        ProductService $productService
    ) {
        $this->productRepository = $productRepository;
        $this->branchProductRepository = $branchProductRepository;
        $this->bannerRepository = $bannerRepository;
        $this->productService = $productService;
    }

    public function index(Category $category)
    {
        if($category->activeChildren()->count() > 0){
            $categoriesIDs = $this->productService->getChildrenIDs($category);
            $list = $this->getCategoriesProducts($categoriesIDs);
        }else{
            request()->request->set('category', $category->id);
            $list = $this->getCategoryProducts();
        }

        $ancestor = $category->parent_id ? $this->productService->getAncestor($category) : $category;
        session()->put('main_category', $ancestor);


        request()->request->set('type', BannerTypes::PRODUCT);
        $productBanner = $this->bannerRepository->search(request())->first();

        $mainCategory = session()->get('main_category');

        $relatedIDs = $this->productService->getChildrenIDs($mainCategory);
        $newProducts = $this->branchProductRepository->search(request())
            ->whereIn('category_id',$relatedIDs)
            ->latest()->limit(6)->get();

        if(!$category->parent_id){
            return redirect(route('web.home.index'));
        }

        return View::make('web.products.index', ['list' => $list, 'category' => $category, 'newProducts' => $newProducts, 'productBanner' => $productBanner]);
    }

    public function show(BranchProduct $product)
    {
        $mainCategory = session()->get('main_category');
        $relatedIDs = $this->productService->getChildrenIDs($mainCategory);
        $relatedProducts = BranchProduct::query()->where('branch_id', '=', $product->branch_id)
            ->where('id', '!=', $product->id)
            ->whereIn('category_id',$relatedIDs)
            ->limit(6)->get();
        return View::make('web.products.show', ['product' => $product, 'relatedProducts' => $relatedProducts]);
    }

    public function getCategoryProducts()
    {
        return $this->productRepository->searchFromRequest(request())
            ->whereHas('branchProducts')
            ->with(['branchProducts' => function ($query) {
                $query->where('branch_id', '=', 1);
            }])->paginate(12);
    }

    public function getCategoriesProducts($categoriesIDs)
    {
        return $this->productRepository->getCategoriesProducts($categoriesIDs)
            ->whereHas('branchProducts')
            ->with(['branchProducts' => function ($query) {
                $query->where('branch_id', '=', 1);
            }])->paginate(12);

    }

}
