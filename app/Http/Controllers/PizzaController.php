<?php

namespace App\Http\Controllers;

use App\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class PizzaController extends Controller
{
    /**
     * Display a listing of the pizza.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $pizzas = Pizza::all();
        if(!session()->has('data')){
            return redirect('/');
        }
        return view('index',compact('pizzas'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addPizza(Request $request){
        $pizza = new Pizza();
        $pizza->name = $request->name;
        $pizza->price = $request->price;
        $pizza->ingredients = $request->ingredients;
        $pizza->save();
        return redirect('pizza');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id){ 
        $pizzaData = Pizza::find($id);
        $pizzaData->name = $request->name;
        $pizzaData->price = $request->price;
        $pizzaData->ingredients = $request->ingredients;
        $pizzaData->save();
        return redirect('pizza');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        $pizzaData = Pizza::find($id);
        $pizzaData->delete();
        return redirect('pizza');
    }
}

