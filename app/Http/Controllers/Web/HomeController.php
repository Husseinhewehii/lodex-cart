<?php

namespace App\Http\Controllers\Web;

use App\Constants\BannerTypes;
use App\Http\Controllers\BaseController;
use App\Http\Services\ProductService;
use App\Repositories\BranchProductRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\FeatureRepository;
use View;
use App\Repositories\BannerRepository;

class HomeController extends BaseController
{
    private $bannerRepository;
    private $branchProductRepository;
    private $categoryRepository;
    private $featureRepository;
    private $productService;

    public function __construct(
        BannerRepository $bannerRepository,
        BranchProductRepository $branchProductRepository,
        CategoryRepository $categoryRepository,
        FeatureRepository $featureRepository,
        ProductService $productService
    )

    {
        $this->bannerRepository = $bannerRepository;
        $this->branchProductRepository = $branchProductRepository;
        $this->categoryRepository = $categoryRepository;
        $this->featureRepository = $featureRepository;
        $this->productService = $productService;
    }

    public function index()
    {
        request()->request->set('type', BannerTypes::SLIDER);
        request()->request->set('active', 1);
        $sliders = $this->bannerRepository->search(request())->get();

        request()->request->set('type', BannerTypes::HOME);
        $homeBanner = $this->bannerRepository->search(request())->first();

        $mainCategory = session()->get('main_category');

        $childrenIDs = $this->productService->getChildrenIDs($mainCategory);
        request()->request->set('category_ids',$childrenIDs);

        request()->request->set('bundle',1);
        $specialProducts = $this->branchProductRepository->search(request())->limit(5)->get();

        request()->request->remove('bundle');
        $trendingProducts = $this->branchProductRepository->search(request())->limit(10)->get();

        request()->request->set('show_home',1);
        $trendingCategories = $this->categoryRepository->getTrendingCategories(request())->get();

        $activeFeatures = $this->featureRepository->getActiveFeatures(request())->get();

        return View::make('web.home.index',[
            'sliders'=>$sliders,
            'homeBanner'=>$homeBanner,
            'specialProducts'=>$specialProducts,
            'trendingProducts'=>$trendingProducts,
            'trendingCategories'=>$trendingCategories,
            'features'=>$activeFeatures
        ]);
    }
}
