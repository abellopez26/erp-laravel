<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProviderRepository;
use App\Models\Provider;

class ProviderController extends Controller
{
    private $providerRepository;

    public function __construct(ProviderRepository $providerRepository) {

        $this->providerRepository = $providerRepository;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = $this->providerRepository->all();

        $data = [
            'category_name' => 'personal',
            'page_name' => 'providers',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        return view('admin.providers')->with($data)->with('providers', $providers);
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
            'page_name' => 'providers | new',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        return view('admin.new_provider')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $provider = new Provider($request->all());

        $this->providerRepository->save($provider);

        return redirect('providers');
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
    public function edit(Provider $provider)
    {
        $data = [
            'category_name' => 'personal',
            'page_name' => 'providers | edit',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];

        $provider = $this->providerRepository->find($provider);

        return view('admin.edit_provider')->with('provider', $provider)->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        $provider = $this->providerRepository->update($provider, $request->all());

        return redirect('providers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        $provider = $this->providerRepository->delete($provider);

        return redirect('providers');
    }
}
