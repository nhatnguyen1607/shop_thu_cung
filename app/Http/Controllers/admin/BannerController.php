<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\IBannerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TaiKhoan;
use App\Models\Banner;

class BannerController extends Controller
{
    protected $bannerRepository;

    public function __construct(IBannerRepository $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }
    public function index()
    {
        $banners = $this->bannerRepository->getAll();
        return view('admin.banner.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'anhbanner' => 'required|image|max:2048',
        ]);

        $file = $request->file('anhbanner');
        $filename = time() . '_' . $file->getClientOriginalName();
        $destinationPath = public_path('frontend/upload/banner');

        $file->move($destinationPath, $filename);

        $this->bannerRepository->create([
            'anhbanner' => 'frontend/upload/banner/' . $filename,
        ]);

        return redirect()->route('banner.index')->with('success', 'Thêm banner thành công');
    }
    public function delete($id)
    {
        $this->bannerRepository->delete($id);
        return redirect()->route('banner.index')->with('success', 'Xóa banner thành công');
    }
}
