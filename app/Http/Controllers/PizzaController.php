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
        if(!session()->has('data')){
            return redirect('/');
        }
        return view('index',compact('pizzas'));
    }
    public function addPizza(Request $request){
        $pizza = new Pizza();
        $pizza->name = $request->name;
        $pizza->price = $request->price;
        $pizza->ingredients = $request->ingredients;
        $pizza->save();
        return redirect('pizza');
    }
}
