<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use Illuminate\Http\Request;
use Exception;
use Twilio\Rest\Client;
use Alert;


class ShippingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $shippings = Shipping::latest()->simplePaginate(6);
        return view('shippings', compact('shippings'));
    }

    public function deleteship(){
        $shippings = Shipping::withTrashed()->get();
        return view('restoreships', compact('shippings'));
    }

    public function restore($id)
    {
        
        $shippings = Shipping::withTrashed()->find($id)->restore();
        
        return redirect()->back()->with('success', 'La restauration été bien effectuer');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $account_sid = getenv("TWILIO_SID");
            $account_token = getenv("TWILIO_TOKEN");
            $number = getenv("TWILIO_FROM");
            $client = new Client($account_sid, $account_token);

            $this->validate($request, [
                'cargo_name' => 'required',
                'cargo_desc' => 'required|min:30',
                'sender_name' => 'required',
                'sender_phone' => 'required|min:10|max:10',
                'receiver_name' => 'required',
                'receiver_phone' => 'required',
                'origin' => 'required',
                'bus' => 'required',
                'destination' => 'required',
            ]);

            if ($request->origin === $request->destination) {
                toast('Origin and Destination cannot be the same', 'warning');
                return redirect()->back();
            }

            $ref_id = 'ID-' . random_int(1000000, 9999999);
            $shipping = new Shipping();
            $shipping->txn_id = 'TXN-' . random_int(1000000, 9999999);
            $shipping->cargo_id = $ref_id;
            $shipping->cargo_name = $request->cargo_name;
            $shipping->cargo_desc = $request->cargo_desc;
            $shipping->sender_id = 'SND-' . random_int(1000, 9999);
            $shipping->sender_name = $request->sender_name;
            $shipping->sender_phone = intval($request->sender_phone);
            $shipping->receiver_id = 'RCV-' . random_int(1000, 9999);
            $shipping->receiver_name = $request->receiver_name;
            $shipping->receiver_phone = $request->receiver_phone;
            $shipping->origin = $request->origin;
            $shipping->destination = $request->destination;
            $shipping->bus = $request->bus;

            $client->messages->create('+212' . $request->receiver_phone, [
                "from" => $number,
                "body" => "Your cargo was received",
            ]);
            $save = $shipping->save();

            //code...
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        if ($save) {


            toast('Cargo ready for shipping!', 'success');
            return redirect()->back();
        } else {
            toast('An error occured. Please try again later!', 'warning');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $txn = Shipping::find($id);
        return view('show', compact('txn'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipping $shipping)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        try {
            $account_sid = getenv("TWILIO_SID");
            $account_token = getenv("TWILIO_TOKEN");
            $number = getenv("TWILIO_FROM");
            $client = new Client($account_sid, $account_token);

            $txn = $request->txn_id;
            $id = Shipping::where('txn_id', $txn)->first();

            $id->status = $request->status;
            $client->messages->create('+212' . $id->receiver_phone, [
                "from" => $number,
                "body" => "Your cargo was " . $request->status,
            ]);
            $save = $id->save();
            //code...
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        if ($save) {

            // Get one of the services


            // Use the service

            //send message to sender


            toast('Cargo status updated successfully!', 'success');
            return redirect()->back();
        } else {
            toast('An error occured. Please try again later!', 'warning');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $txn = $request->txn_id;
        $delete = Shipping::where('txn_id', $txn)->delete();

        if ($delete) {
            # code...
            toast('Cargo status deleted successfully!', 'success');
            return redirect()->back();
        } else {
            toast('An error occured. Please try again later!', 'warning');
            return redirect()->back();
        }
    }
}
