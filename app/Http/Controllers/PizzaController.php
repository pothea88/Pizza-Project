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
        $request->validate([
            'name' => ['required','string'],
            'price'=> ['required','min:1','max:50']
        ]); 
        $pizza = new Pizza();
        $pizza->name = $request->name;
        $pizza->price = $request->price;
        $pizza->ingredients = $request->ingredients;
        $pizza->save();
        return redirect('pizza');
    }
    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required|string',
            'price'=> 'required|min:1|max:50'
        ]); 
        $pizzaData = Pizza::find($id);
        $pizzaData->name = $request->name;
        $pizzaData->price = $request->price;
        $pizzaData->ingredients = $request->ingredients;
        $pizzaData->save();
        return redirect('pizza');
    }
    public function delete($id){
        $pizzaData = Pizza::find($id);
        $pizzaData->delete();
        return redirect('pizza');
    }
}
