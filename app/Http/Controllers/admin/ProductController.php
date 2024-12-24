<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\Sanpham;
use App\Models\Danhmuc;
use App\Models\AnhSP;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Repositories\IProductRepository;

class ProductController extends Controller
{

    private $productRepository;

    public function __construct(IProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->allProduct();

        foreach ($products as $product) {
            $firstImage = DB::table('anh_sp')
                ->where('id_sanpham', $product->id_sanpham)
                ->orderBy('id_anh', 'asc')
                ->first();

            $product->first_image = $firstImage ? $firstImage->anh_sp : 'default_image_path';
        }

        return view('admin.products.index', ['products' => $products]);
    }
    public function search(Request $request)
    {
        $searchs = $this->productRepository->searchProduct($request);
        foreach ($searchs as $search) {
            $firstImage = DB::table('anh_sp')
                ->where('id_sanpham', $search->id_sanpham)
                ->orderBy('id_anh', 'asc')
                ->first();

            $search->first_image = $firstImage ? $firstImage->anh_sp : 'default_image_path';
        }
        return view('admin.products.search')->with('searchs', $searchs)->with('tukhoa', $request->input('tukhoa'));
    }
    public function create()
    {
        $list_danhmucs = Danhmuc::all();
        return view('admin.products.create', ['list_danhmucs' => $list_danhmucs]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tensp' => 'required',
            'giasp' => 'required|decimal:0,2',
            'mota' => 'nullable',
            'giamgia' => 'nullable|numeric',
            'soluong' => 'required|numeric',
            'id_danhmuc' => 'required'
        ]);

        $giagoc = $validatedData['giasp'];
        $giamgia = $validatedData['giamgia'] ?? 0;
        $validatedData['giakhuyenmai'] = $giagoc - (($giagoc * $giamgia) / 100);
        $product = $this->productRepository->storeProduct($validatedData);

        if (!$product) {
            return redirect()->back()->with('error', 'Không thể tạo sản phẩm mới.');
        }

        if ($request->hasFile('anhsp')) {
            $this->storeProductImages($product->id_sanpham, $request->file('anhsp'));
        }

        return redirect()->route('product.index')->with('success', 'Thêm sản phẩm thành công');
    }

    public function storeProductImages($productId, $images)
    {
        foreach ($images as $file) {
            $imagePath = $file->store('upload', 'public_frontend');
            $imageName = pathinfo($imagePath, PATHINFO_FILENAME);
            $imageExtension = $file->getClientOriginalExtension();
            $imageUrl = "frontend/upload/{$imageName}.{$imageExtension}";

            AnhSP::create([
                'id_sanpham' => $productId,
                'anh_sp' => $imageUrl,
            ]);
        }
    }

    public function edit($id)
    {
        $list_danhmucs = Danhmuc::all();
        $product = $this->productRepository->findProduct($id);
        $images = AnhSP::where('id_sanpham', $id)->get();

        return view('admin.products.edit', [
            'product' => $product,
            'list_danhmucs' => $list_danhmucs,
            'images' => $images
        ]);
    }


    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'tensp' => 'required',
            'giasp' => 'required|decimal:0,2',
            'mota' => 'nullable',
            'giamgia' => 'nullable|numeric',
            'soluong' => 'required|numeric',
            'id_danhmuc' => 'required'
        ]);

        $giagoc = $validatedData['giasp'];
        $giamgia = $validatedData['giamgia'] ?? 0;
        $validatedData['giakhuyenmai'] = $giagoc - (($giagoc * $giamgia) / 100);

        $this->productRepository->updateProduct($validatedData, $id);
        if ($request->has('delete_images')) {
            $imageIds = $request->delete_images;
            $images = AnhSP::whereIn('id_anh', $imageIds)->get();

            foreach ($images as $image) {
                $imagePath = public_path($image->anh_sp);

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            AnhSP::whereIn('id_anh', $imageIds)->delete();
        }
        if ($request->hasFile('anhsp')) {
            foreach ($request->file('anhsp') as $file) {
                $imagePath = $file->store('upload', 'public_frontend');
                $imageName = pathinfo($imagePath, PATHINFO_FILENAME);
                $imageExtension = $file->getClientOriginalExtension();
                $imageUrl = "frontend/upload/{$imageName}.{$imageExtension}";

                AnhSP::create([
                    'id_sanpham' => $id,
                    'anh_sp' => $imageUrl,
                ]);
            }
        }

        return redirect()->route('product.index')->with('success', 'Cập nhật sản phẩm thành công');
    }


    public function destroy($id)
    {
        $product = $this->productRepository->findProduct($id);

        if ($product->anhsp) {
            $mainImagePath = public_path($product->anhsp);
            if (file_exists($mainImagePath)) {
                unlink($mainImagePath);
            }
        }
        $images = AnhSP::where('id_sanpham', $id)->get();

        foreach ($images as $image) {
            $imagePath = public_path($image->anh_sp);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        AnhSP::where('id_sanpham', $id)->delete();
        $this->productRepository->deleteProduct($id);
        return redirect()->route('product.index')->with('success', 'Xóa sản phẩm thành công');
    }
}
