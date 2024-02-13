<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.partners.index',[ 'partners'=>Partner::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.partners.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePartnerRequest $request)
    {
        //


        $champs=$request->all();
        $champs['image']=$request->file('image')->store('partners','public');
        Partner::create($champs);
        return to_route('partners.index')->with('success', 'partner added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        //
        return view('admin.partners.edit',[ 'partner'=>$partner]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePartnerRequest $request, Partner $partner)
    {
        //
        $partner->update($request->all());
        return redirect()->route('partners.index')->with('success', "partner  updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {
        //
        Gate::authorize('delete',Auth::user());
        $partner->delete();

        return redirect()->route('partners.index')->with('success', "partner $partner->name delete successfully");
    }
}
