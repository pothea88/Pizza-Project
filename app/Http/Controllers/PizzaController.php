<?php

namespace App\Http\Controllers;

use App\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class PizzaController extends Controller
{
    public function index(){
        $pizzas = Pizza::all();
        // dd($name);
        // if(Auth::check()){
            return view('index',compact('pizzas'));
        // }
        // return redirect('/');
         
    }
    public function addPizza(Request $request){
        $pizza = new Pizza();
        $pizza->name = $request->name;
        $pizza->price = $request->price;
        $pizza->ingredients = $request->ingredients;
        $pizza->save();
        return redirect('pizza');
    }
    public function dataEdit($id){
        $pizzaData = Pizza::find($id);
        dd($pizzaData);
        return view('index',compact('pizzaData'));
    }
}
