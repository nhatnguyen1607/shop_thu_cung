<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sanpham;
use App\Models\Banner;
use App\Models\Gallery;

use App\Repositories\ISanphamRepository;
use App\Repositories\IDanhmucRepository;
use App\Repositories\IEvaluateRepository;

class HomeController extends Controller
{

    private $sanphamRepository;
    protected $evaluateRepository;
    protected $danhmucRepository;
    public function __construct(ISanphamRepository $sanphamRepository, IEvaluateRepository $evaluateRepository, IDanhmucRepository $danhmucRepository)
    {
        $this->sanphamRepository = $sanphamRepository;
        $this->danhmucRepository = $danhmucRepository;
        $this->evaluateRepository = $evaluateRepository;
    }

    public function index()
    {
        $banners = Banner::all();
        $gallerys = Gallery::all();
        $danhmucs = $this->danhmucRepository->allDanhmuc();
        $alls = $this->sanphamRepository->viewAllWithPagi();
        $noibats = $this->sanphamRepository->outstandingproducts();
        return view('user.home', compact('danhmucs', 'banners','gallerys', 'alls', 'noibats'));
    }


    public function detail($id)
    {
        $sanpham = Sanpham::findOrFail($id);
        $randoms = $this->sanphamRepository->randomProduct()->take(5);
        $danhgias = $this->evaluateRepository->findById($id);
        $averageRating = $danhgias->avg('rating');
        $ratingCounts = $danhgias->groupBy('rating')->map->count();
        $totalReviews = $danhgias->count();
        return view('user.detail', [
            'sanpham' => $sanpham,
            'randoms' => $randoms,
            'danhgias' => $danhgias,
            'averageRating' => $averageRating,
            'ratingCounts' => $ratingCounts,
            'totalReviews' => $totalReviews,
            'ratingCounts' => $ratingCounts
        ]);
    }
    public function thucung(){
        return view('user.thucung');
    }
    public function cho()
    {
        $dogs = $this->sanphamRepository->dog();
        return view('user.cho', [
            'dogs' => $dogs,
        ]);
    }
    public function meo()
    {
        $cats = $this->sanphamRepository->cat();
        return view('user.meo', [
            'cats' => $cats,
        ]);
    }
    public function search(Request $request)
    {
        $searchs = $this->sanphamRepository->searchProduct($request);
        return view('user.search')->with('searchs', $searchs)->with('tukhoa', $request->input('tukhoa'));
    }

    public function viewAll()
    {
        $viewAllPaginations = $this->sanphamRepository->viewAllWithPagi();
        return view('user.viewall', ['sanphams' => $viewAllPaginations]);
    }
    public function services()
    {
        return view('user.services');
    }
}
