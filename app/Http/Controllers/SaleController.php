<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SaleRepository;
use App\Models\Sale;

class SaleController extends Controller
{

    private $saleRepository;

    public function __construct(SaleRepository $saleRepository) {

        $this->saleRepository = $saleRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = $this->saleRepository->all();

        $data = [
            'category_name' => 'personal',
            'page_name' => 'Sales',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        return view('admin.Sales')->with($data)->with('sales', $sales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'category_name' => 'personal',
            'page_name' => 'Sales | new',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        return view('admin.new_Sale')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sale = new Sale($request->all());

        $this->saleRepository->save($sale);

        return redirect('sales');

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
    public function edit(Sale $sale)
    {
        $data = [
            'category_name' => 'personal',
            'page_name' => 'Sales | edit',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        $sale = $this->SaleRepository->find($Sale);

        return view('admin.edit_Sale')->with('sale', $sale)->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        $sale = $this->saleRepository->update($sale, $request->all());

        return redirect('Sales');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        $sale = $this->saleRepository->delete($sale);

        return redirect('sales');
    }
}