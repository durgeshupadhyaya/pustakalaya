<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreDeliveryChargeRequest;
use App\Http\Requests\Admin\UpdateDeliveryChargeRequest;
use App\Models\DeliveryCharge;
use Illuminate\Http\Request;

class DeliveryChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliverycharges = DeliveryCharge::oldest('order')->paginate(10);
        return view('admin.deliverycharge.index', compact('deliverycharges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.deliverycharge.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeliveryChargeRequest $request)
    {
        $input = $request->all();
        DeliveryCharge::create($input);
        return redirect()->route('admin.delivery.index')->with('message', 'Created Successfully');
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
    public function edit(DeliveryCharge $delivery)
    {
        return view('admin.deliverycharge.edit', compact('delivery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeliveryChargeRequest $request, DeliveryCharge $delivery)
    {
        $input = $request->all();
        $delivery->update($input);
        return redirect()->route('admin.delivery.index')->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryCharge $delivery)
    {
        $delivery->delete();
        return redirect()->route('admin.delivery.index')->with('message', 'Delete Successfully');
    }
}
