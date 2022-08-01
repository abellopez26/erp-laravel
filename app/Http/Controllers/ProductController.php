<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Repositories\ProviderRepository;
use App\Models\Product;
use App\Models\Provider;


class ProductController extends Controller
{

    private $productRepository;
    private $providerRepository;

    public function __CONSTRUCT
    (
        ProductRepository $productRepository,
        ProviderRepository $providerRepository
    )

    {

        $this->productRepository = $productRepository;
        $this->providerRepository = $providerRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepository->all();

        $data = [
            'category_name' => 'inventory',
            'page_name' => 'products',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        return view('admin.products')->with($data)->with('products', $products);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providers = $this->providerRepository->all();

        $data = [
            'category_name' => 'inventory',
            'page_name' => 'products | new',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        return view('admin.new_product')->with($data)->with('providers', $providers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product($request->all());

        $product = $this->productRepository->save($product);

        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $providers = $this->providerRepository->all();

        $data = [
            'category_name' => 'inventory',
            'page_name' => 'products | edit',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        $product = $this->productRepository->find($product);

        return view('admin.edit_product')->with($data)->with('providers', $providers)->with('product', $product);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product = $this->productRepository->update($product, $request->all());

        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product = $this->productRepository->delete($product);

        return redirect('products');
    }
}
