<?php

namespace App\Http\Controllers;

use App\Models\Carlist;
use App\Models\Charge;
use App\Models\Rate;
use App\Models\User;
use App\Models\Washer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function cars(){
        $charges = Charge::all();
        $washers = Washer::all();
        $date = Carbon::now()->format('d/m/Y');
        $cars = Carlist::where('id','>',0)->where('date',Carbon::now()->format('d/m/Y'))->orderByDesc('id')->get();
        return view('cars',[
            'charges'=>$charges,
            'washers'=>$washers,
            'cars'=>$cars,
            't'=>$date

        ]);
    }
    public function payCar(Request $request){
        $output = "";
        $car = Carlist::find($request->id);
        $output =$car;
        return response($output);
    }
    public function pCar(Request $request){
        $updatePayment = Carlist::where('id',$request->id)->update(['payment_method'=>$request->payment_method]);
        return redirect()->back()->with('success','PAYMENT SUCCESS');

    }
    public function filterD(Request $request){
        $from = date('d/m/Y', strtotime($request->from));
        $to = date('d/m/Y', strtotime($request->to));
        $charges = Charge::all();
        $washers = Washer::all();
        $cars = Carlist::where('id','>',0)->whereBetween('date', [$from,$to])->orderByDesc('id')->get();
        $f = $from;
        $t = $to;
        return view('cars',[
            'charges'=>$charges,
            'washers'=>$washers,
            'cars'=>$cars,
            'f'=>$f,
            't'=>$t,

        ]);
    }
    public function getAmount(Request $request){
        $output = "";
        $amount= Charge::find($request->id);
        $output =$amount;

        return response($output);
    }
    public function washers(){
        $washers = Washer::all();
        return view('washers',[
            'washers'=>$washers
        ]);
    }
    public function users(){
        $washers = User::all();
        return view('users',[
            'washers'=>$washers
        ]);
    }
    public function addUsers(){
        return view('addUsers');
    }
    public function deleteUser(Request $request){
        $output = "";
        $user = User::find($request->id);
        $output = $user;
        return response($output);
    }
    public function deleteU(Request $request){
        $user = User::find($request->id);
        $user->delete();
        return redirect()->back()->with('success','USER DELETED SUCCESS');

    }
    public function storeUser(Request $request){
        $user = User::create([
            'role' => $request->input('role'),
            'name' => $request->input('name'),
           'email' => $request->input('email'),
           'password' => '123456',
           'cars' => $request->input('cars'),
           'washer' => $request->input('washers'),
           'payments' => $request->input('payments'),
           'charges' => $request->input('charges'),
           'users' => $request->input('users'),
        ]);
        return redirect(url('users'))->with('success','USER ADDED SUCCESS DEFAULT PASSWORD 123456');
    }
    public function editUsers(Request $request){
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->cars = $request->cars;
        $user->washer = $request->washers;
        $user->payments = $request->payments;
        $user->charges = $request->charges;
        $user->users = $request->users;
        $user->save();
        return redirect(url('users'))->with('success','USER ADDED SUCCESS');

    }
    public function editUser($id){
        $user = User::find($id);
        return view('editUsers',[
            'user'=>$user
        ]);

    }
    public function filterDate(Request $request){
        $from = date('d/m/Y', strtotime($request->from));
        $to = date('d/m/Y', strtotime($request->to));
        $cars = Carlist::whereBetween('date', [$from, $to])->get();
        $washers = Washer::all();
        $mpesas = Carlist::where('payment_method',1)->whereBetween('date', [$from, $to])->get();
        $cashs = Carlist::where('payment_method',2)->whereBetween('date', [$from, $to])->get();
        $total = Carlist::whereBetween('date', [$from, $to])->where('payment_method','!=',null)->sum('amount');
        $paid = Carlist::whereBetween('date', [$from, $to])->sum('discountAmount');
        $m = Carlist::where('payment_method',1)->whereBetween('date', [$from, $to])->sum('amount');
        $c = Carlist::where('payment_method',2)->whereBetween('date', [$from, $to])->sum('amount');
        $p = Carlist::where('payment_method',null)->whereBetween('date', [$from, $to])->sum('amount');
        $f = $from;
        $t = $to;
        return view('payments',[
            'cars'=>$cars,
            'mpesas'=>$mpesas,
            'cashs'=>$cashs,
            'washers'=>$washers,
            'total'=>$total,
            'paid'=>$paid,
            'm'=>$m,
            'c'=>$c,
            'f'=>$f,
            'p'=>$p,
            't'=>$t,

        ]);
    }
    public function getWasher(Request $request){
        $output = "";
        $washers = Washer::where('phone',$request->phone)->first();
        $output = $washers;
        return response($output);
    }
    public function getName(Request $request){
        $output = "";
        $washers = Washer::where('last_name','LIKE','%'.$request->name.'%')->where('first_name','LIKE','%'.$request->first_name.'%')->first();
        $output = $washers;
        return response($output);
    }
    public function payments(){
        $cars = Carlist::where('date',Carbon::now()->format('d/m/Y'))->orderByDesc('id')->get();
        $washers = Washer::all();
        $mpesas = Carlist::where('payment_method',1)->where('date',Carbon::now()->format('d/m/Y'))->get();
        $cashs = Carlist::where('payment_method',2)->where('date',Carbon::now()->format('d/m/Y'))->get();
        $total = Carlist::where('date',Carbon::now()->format('d/m/Y'))->where('payment_method','!=',null)->sum('amount');
        $paid = Carlist::where('date',Carbon::now()->format('d/m/Y'))->where('payment_method','!=',null)->sum('discountAmount');
        $m = Carlist::where('payment_method',1)->where('date',Carbon::now()->format('d/m/Y'))->sum('amount');
        $c = Carlist::where('payment_method',2)->where('date',Carbon::now()->format('d/m/Y'))->sum('amount');
        $p = Carlist::where('payment_method',null)->where('date',Carbon::now()->format('d/m/Y'))->sum('amount');
        $date = Carbon::now()->format('d/m/Y');
        return view('payments',[
            'cars'=>$cars,
            'mpesas'=>$mpesas,
            'cashs'=>$cashs,
            'washers'=>$washers,
            'total'=>$total,
            'paid'=>$paid,
            'm'=>$m,
            'c'=>$c,
            'p'=>$p,
            't'=>$date
        ]);
    }
    public function washerDetail($id){
        $date = Carbon::now()->format('d/m/Y');
        $cars = Carlist::where('washer_id',$id)->orderByDesc('id')->get();
        $washers = Washer::all();
        $wash = Washer::find($id);
        $mpesas = Carlist::where('payment_method',1)->where('washer_id',$id)->get();
        $cashs = Carlist::where('payment_method',2)->where('washer_id',$id)->get();
        $total = Carlist::where('date',Carbon::now()->format('d/m/Y'))->where('washer_id',$id)->sum('amount');
        $paid = Carlist::where('date',Carbon::now()->format('d/m/Y'))->where('washer_id',$id)->sum('discountAmount');
        $m = Carlist::where('date',Carbon::now()->format('d/m/Y'))->where('washer_id',$id)->where('payment_method',1)->sum('amount');
        $c = Carlist::where('date',Carbon::now()->format('d/m/Y'))->where('washer_id',$id)->where('payment_method',2)->sum('amount');
        return view('washerDetail',[
            'cars'=>$cars,
            'mpesas'=>$mpesas,
            'cashs'=>$cashs,
            'washers'=>$washers,
            'wash'=>$wash,
            'total'=>$total,
            'paid'=>$paid,
            't'=>$date,
            'm'=>$m,
            'c'=>$c,

        ]);
    }
    public function filterWasher(Request $request){
        $from = date('d/m/Y', strtotime($request->from));
        $to = date('d/m/Y', strtotime($request->to));
        $cars = Carlist::where('washer_id',$request->id)->whereBetween('date', [$from, $to])->get();
        $washers = Washer::all();
        $wash = Washer::find($request->id);
        $total = Carlist::whereBetween('date', [$from, $to])->where('washer_id',$request->id)->sum('amount');
        $paid = Carlist::whereBetween('date', [$from, $to])->where('washer_id',$request->id)->sum('discountAmount');
        $m = Carlist::where('payment_method',1)->where('washer_id',$request->id)->whereBetween('date', [$from, $to])->sum('amount');
        $c = Carlist::where('payment_method',2)->where('washer_id',$request->id)->whereBetween('date', [$from, $to])->sum('amount');
        $mpesas = Carlist::where('payment_method',1)->where('washer_id',$request->id)->whereBetween('date', [$from, $to])->get();
        $cashs = Carlist::where('payment_method',2)->where('washer_id',$request->id)->whereBetween('date', [$from, $to])->get();
        $f = $from;
        $t = $to;
        return view('washerDetail',[
            'cars'=>$cars,
            'm'=>$m,
            'c'=>$c,
            'mpesas'=>$mpesas,
            'cashs'=>$cashs,
            'washers'=>$washers,
            'wash'=>$wash,
            'f'=>$f,
            't'=>$t,
            'total'=>$total,
            'paid'=>$paid,

        ]);
    }
    public function charges(){
        $charges = Charge::all();
        $rate = Rate::find('1');
        return view('charges',[
            'charges'=>$charges,
            'rate'=>$rate
        ]);
    }
    public function addCharge(Request $request){
        $charge = new Charge();
        $charge->car_type = $request->input('car_type');
        $charge->car_amount = $request->input('car_amount');
        $charge->save();
        return redirect()->back()->with('success','CAR CHARGE ADDED SUCCESS');
    }
    public function addWashers(Request $request){
        $charge = new Washer();
        $charge->first_name = $request->input('first_name');
        $charge->last_name = $request->input('last_name');
        $charge->phone = $request->input('phone');
        $charge->save();
        return redirect()->back()->with('success','WASHER ADDED SUCCESS');
    }
    public function addCar(Request $request){
        $charge = new Carlist();
        $charge->date = Carbon::now()->format('d/m/Y');
        $charge->number_plate = $request->input('number_plate');
        $charge->phone = $request->input('phone');
        $charge->washer_id = $request->input('washer_id');
        $charge->amount = $request->input('amount');
        $charge->payment_method = $request->input('payment_method');
        $findRate = Rate::find('1');
        $rate = $findRate->rate;
        $final = ($rate / 100) * $request->input('amount');
        $finalAmount = $final;
        $charge->discountAmount = $finalAmount;

        $charge->save();


//        $updateWasherAmount = Washer::where('id',$request->input('washer_id'))->update(['amount'=>$finalAmount,'rate'=>$rate]);
        return redirect()->back()->with('success','CAR ADDED SUCCESS');
    }
    public function eRate(Request $request){
        $rate = Rate::find('1');
        $rate->rate = $request->input('rate');
        $rate->save();
        return redirect()->back()->with('success','WASHER RATE UPDATED SUCCESS');
    }
    public function eCharge(Request $request){
        $edit = Charge::find($request->id);
        $edit->car_type = $request->input('car_type');
        $edit->car_amount = $request->input('car_amount');
        $edit->save();
        return redirect()->back()->with('success','CAR CHARGE EDITED SUCCESS');
    }
    public function eWashers(Request $request){
        $edit = Washer::find($request->id);
        $edit->first_name = $request->input('first_name');
        $edit->last_name = $request->input('last_name');
        $edit->phone = $request->input('phone');
        $edit->save();
        return redirect()->back()->with('success','WASHER EDITED SUCCESS');
    }
    public function editCharge(Request $request){
        $output = "";
        $charge = Charge::find($request->id);
        $output =$charge;

        return response($output);
    }
    public function editWasher(Request $request){
        $output = "";
        $washer = Washer::find($request->id);
        $output =$washer;

        return response($output);
    }
    public function editRate(Request $request){
        $output = "";
        $edit= Rate::find('1');
        $output =$edit;

        return response($output);
    }
}
