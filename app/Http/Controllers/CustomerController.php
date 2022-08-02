<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CustomerRepository;
use App\Models\Customer;
use App\Http\Requests\CustomerCreateFormRequest;
use Session;

class CustomerController extends Controller
{

    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository) {

        $this->customerRepository = $customerRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->customerRepository->all();

        $data = [
            'category_name' => 'personal',
            'page_name' => 'customers',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        return view('admin.customers')->with($data)->with('customers', $customers);
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
            'page_name' => 'customers | new',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        return view('admin.new_customer')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerCreateFormRequest $request)
    {

        $customer = new Customer($request->all());

        $this->customerRepository->save($customer);

        Session::flash('save', 'Cliente guardado');

        return redirect('customers');

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
    public function edit(Customer $customer)
    {
        $data = [
            'category_name' => 'personal',
            'page_name' => 'customers | edit',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        $customer = $this->customerRepository->find($customer);

        return view('admin.edit_customer')->with('customer', $customer)->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        Session::flash('update', 'Cliente actualizado');

        $customer = $this->customerRepository->update($customer, $request->all());

        return redirect('customers');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        Session::flash('delete', 'Cliente eliminado');
        $customer = $this->customerRepository->delete($customer);

        return redirect('customers');
    }



}
