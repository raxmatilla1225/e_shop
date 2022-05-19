<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $product = Product::all();
        return view('admin.products.index', ['products' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', ['categories' => $categories]);
    }

//    public function slug(Request $request)
//    {
//        $slug = SlugService::createSlug(Product::class, 'slug', $request->get('name_uz'));
//
//        return response()->json(['slug' => $slug]);
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreProductRequest $request)
    {

//        dd($request->validated());

        $product = new Product();
        $product->name_ru = $request->get('name_ru');
        $product->name_en = $request->get('name_en');
        $product->name_uz = $request->get('name_uz');
        $product->short_desc_ru = $request->get('short_desc_ru');
        $product->short_desc_en = $request->get('short_desc_en');
        $product->short_desc_uz = $request->get('short_desc_uz');
        $product->desc_ru = $request->get('desc_ru');
        $product->desc_en = $request->get('desc_en');
        $product->desc_uz = $request->get('desc_uz');
        $product->price = $request->get('price');
        $product->old_price = $request->get('old_price');
        $product->discount = $request->get('discount');
        $product->status_id = $request->get('status_id');
        $product->category_id = $request->get('category_id');
        $product->order = $request->get('order');
//        $product->slug = $request->get('slug');
        if ($image = $request->file('main_img')) {
            $imageDestinationPath = 'uploads/admin/products';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $product->main_img = $postImage;
        }
        if (count($request->images) > 0) {
            $paths = [];
            foreach ($request->images as $key => $image) {
                $paths[] = $request->images[$key]->store('products');
            }
        }

        $product->images = $paths ?? null;
        $product->brand_id = $request->get('brand_id');
        $product->quantity = $request->get('quantity');
        $product->delivery_days = $request->get('delivery_days');

        if ($product->save()) {
            return redirect()->route('products.index')->with('success', 'Product created successfully');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Product $product)
    {
//        dd($product->images);
        return view('admin.products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Product $product)
    {
//        if(\Auth::user()->hasPermisson('edit_cat')){
//
//        }
        return view('admin.products.edit', ['product' => $product]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateProductRequest $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
//     dd($product);
        $product->name_ru = $request->get('name_ru');
        $product->name_en = $request->get('name_en');
        $product->name_uz = $request->get('name_uz');
        $product->short_desc_ru = $request->get('short_desc_ru');
        $product->short_desc_en = $request->get('short_desc_en');
        $product->short_desc_uz = $request->get('short_desc_uz');
        $product->desc_ru = $request->get('desc_ru');
        $product->desc_en = $request->get('desc_en');
        $product->desc_uz = $request->get('desc_uz');
        $product->price = $request->get('price');
        $product->old_price = $request->get('old_price');
        $product->discount = $request->get('discount');
        $product->status_id = $request->get('status_id');
        $product->category_id = $request->get('category_id');
        $product->order = $request->get('order');
//        $product->slug = $request->get('slug');

        if ($image = $request->file('main_img')) {
            $imageDestinationPath = 'uploads/admin/products';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $product->main_img = $postImage;
        }
        if (count($request->images) > 0) {
            $paths = [];
            foreach ($request->images as $key => $image) {
                $paths[] = $request->images[$key]->store('products');
            }
        }

        $product->images = $paths ?? null;
        $product->brand_id = $request->get('brand_id');
        $product->quantity = $request->get('quantity');
        $product->delivery_days = $request->get('delivery_days');

        $product = $product->update();
        if ($product) {
            return redirect()->route('products.index')->with('success', 'Product updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        $status = $product->delete();
        if ($status) {
            return redirect()->route('products.index')->with('success', 'Product deleted successfully');
        }
        return redirect()->back();
    }

    public function search(\Illuminate\Http\Request $request)
    {
        $pr = $request->get('query');
        if ($pr) {
            $products = Product::query()->where('name_uz', 'LIKE', "%" . $pr . "%")->latest('id')->paginate();
//            dd(compact('products'));
            return view('admin.products.search', ['products' => $products]);
        }
        return redirect()->back()->with('message', 'Query is empty !!!');
    }


}
