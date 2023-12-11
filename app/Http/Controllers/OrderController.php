<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Session;
//use Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //CRUD simple version
    public function index()
    {
        //$orders = Order::all();
        $orders = array(
            'session' => Session::getId(),
        );
        return view('orders.index', compact('orders'));
    }


    //API version
    public function geteventdata() {
        $this->destroyUnOrdered();

        $orders = Order::where('event_id', '165')->get(['seat_id', 'order_status']);
        return response()->json($orders);      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function reservation(){
        $session = Session::getId();
        $orders = Order::where(['event_id' =>'165', 'person_session' => $session ] )->get(['seat_id', 'order_status']);       
        return view('orders.reservation', compact('orders', 'session'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 
    }



    public function set_tmp_reservation(Request $request) {

        $seat_id = (int) filter_var($request->get('seat_id'), FILTER_SANITIZE_NUMBER_INT);

        //$seat_id = 35;
        $sess = $request->get('user_session');

        $orders = Order::where(['event_id' => '165', 'seat_id' => $seat_id])->get(['seat_id', 'order_status']);
        if (count($orders) == 0) {

            $data = Order::create([
                'cinema_id'=> 5,
                'room_id' => 2,
                'event_id' => 165,
                'seat_id' => $seat_id,
                'order_date' => date('Y-m-d H:i:s'),
                'person_session' => $sess,
                'order_status' => 'tmp_reserved',
            ]);

            return response()->json(['response' => 'tmp_reserved']); 

        } else {
            return response()->json(['response' => 'sy_reserved']); 
        }

        //return response()->json($orders);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
    public function reservation_save(Request $request){
        $sess = $request->get('user_session');
        $name = $request->get('name');
        $email = $request->get('email');

        $orders = Order::where(['event_id' => '165', 'person_session' => $sess])->get(['id','seat_id', 'order_status']);

        foreach($orders as $oneOrder){

            $oneOrder->order_date = date("Y-m-d H:i:s");
            $oneOrder->person_name = $name;
            $oneOrder->person_email = $email;
            $oneOrder->order_status = 'sold';

            $oneOrder->save();
        } 
        
        


        //return response()->json(['data' => 'A jegyvásárlás sikeres. E-mailben elküldtük a részleteket'], 200); 
        return redirect('/actualevent')->with('status', 'A jegyvásárlás sikeres. E-mailben elküldtük a részleteket'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function destroyUnOrdered(){
        $test_date_time = strtotime(date('Y-m-d H:i:s') . ' - 2 minute');
        $test_date = date('Y-m-d H:i:s', $test_date_time);
        $orders = Order::where(['event_id' => '165', 'order_status' => 'tmp_reserved'])->where('order_date', '<', $test_date)->get(['id','seat_id','order_date', 'order_status']);

        foreach($orders as $oneOrder){
            $oneOrder->delete();
        }

        return response()->json($orders); 
    }

    public function destroyTwoSeats() {

        for($i=0;$i<2; $i++) {
            $random_number = mt_rand(1, 80);
            $orders = Order::where(['event_id' => '165', 'seat_id' => $random_number])->get();
            foreach($orders as $oneOrder){
                $oneOrder->delete();
            } 
        }

        /*
        $orders = Order::where(['event_id' => '165', 'seat_id' => '35'])->get();
        foreach($orders as $oneOrder){
            $oneOrder->delete();
        }        
        $orders = Order::where(['event_id' => '165', 'seat_id' => '36'])->get();
        foreach($orders as $oneOrder){
            $oneOrder->delete();
        } 
        */

        return response()->json(['result' => 'ok']); 
    }
}
