<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sanpham;
use App\Models\Banner;

use App\Repositories\ISanphamRepository;
use App\Repositories\IEvaluateRepository;

class HomeController extends Controller
{

    private $sanphamRepository;
    protected $evaluateRepository;
    public function __construct(ISanphamRepository $sanphamRepository, IEvaluateRepository $evaluateRepository)
    {
        $this->sanphamRepository = $sanphamRepository;
        $this->evaluateRepository = $evaluateRepository;
    }

    public function index()
    {
        $banners = Banner::all();
        $alls = $this->sanphamRepository->allproduct();
        $sanphams = $this->sanphamRepository->outstandingproducts();
        $spcho = $this->sanphamRepository->dog_products();
        $spmeo = $this->sanphamRepository->cat_products();
        $concho = $this->sanphamRepository->dog();
        $conmeo = $this->sanphamRepository->cat();
        return view('user.home', [
            'banners' => $banners,
            'alls' => $alls,
            'sanphams' => $sanphams,
            'spcho' => $spcho,
            'spmeo' => $spmeo,
            'concho' => $concho,
            'conmeo' => $conmeo,
        ]);
    }

    public function thucung()
    {
        $concho = $this->sanphamRepository->dog();
        $conmeo = $this->sanphamRepository->cat();

        return view('user.thucung', [
            'concho' => $concho,
            'conmeo' => $conmeo,
        ]);
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
