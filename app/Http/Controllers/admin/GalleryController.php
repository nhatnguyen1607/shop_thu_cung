<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\IGalleryRepository;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    protected $galleryRepository;

    public function __construct(IGalleryRepository $galleryRepository)
    {
        $this->galleryRepository = $galleryRepository;
    }
    public function index()
    {
        $gallerys = $this->galleryRepository->getAll();
        return view('admin.gallery.index', compact('gallerys'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'anhgallery' => 'required|image|max:2048',
        ]);

        $file = $request->file('anhgallery');
        $filename = time() . '_' . $file->getClientOriginalName();
        $destinationPath = public_path('frontend/upload/gallery');

        $file->move($destinationPath, $filename);

        $this->galleryRepository->create([
            'anhgallery' => 'frontend/upload/gallery/' . $filename,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Thêm gallery thành công');
    }
    public function delete($id)
    {
        $this->galleryRepository->delete($id);
        return redirect()->route('gallery.index')->with('success', 'Xóa gallery thành công');
    }
}
