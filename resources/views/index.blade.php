@extends('layouts.main')

@yield('content')
@include('layouts.navbar')
    <div class="container mt-5">
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8">
				<div class="text-right">
					@if(Auth::user()->role == 1)
					<a href="" class="btn btn-warning btn-sm text-white font-weight-bolder" data-toggle="modal" data-target="#createPizza">
						<i class="material-icons float-left" data-toggle="tooltip" title="Add Pizza!" data-placement="left">add</i>&nbsp;Add
					</a>
					@endif
				</div>
				<hr>
				<table class="table table-borderless table-hover">
					<thead>
						<tr>
							<th>Name</th>
							<th>Ingredients</th>
							<th>Price</th>
							<th></th>
						</tr>
					</thead>
					@foreach($pizzas as $pizza)
					<tbody>
						<tr>
							<td class="pizzaName">{{$pizza->name}}</td>
							<td>
								{{$pizza->ingredients}}
							</td>
							<td class="text-success font-weight-bolder">{{$pizza->price}}$</td>
							<td>
								@if(Auth::user()->role == 1)
								<a href="" data-toggle="modal" data-target="#updatePizza{{$pizza->id}}"><i class="material-icons text-info" data-toggle="tooltip" title="Edit Pizza!" data-placement="left">edit</i></a>
								<a href="{{url('delete',$pizza->id)}}" data-toggle="tooltip" title="Delete Pizza!" data-placement="right"><i class="material-icons text-danger">delete</i></a>
								@endif
							</td>
						</tr>
					</tbody>
					@endforeach
				</table>
			</div>
			<div class="col-2"></div>
		</div>
	</div>


<!-- ========================================START Model CREATE================================================ -->
	<!-- The Modal -->
	<div class="modal fade" id="createPizza">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create Pizza</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body text-right">
			<form  action="{{url('addPizza')}}" method="post">
				@csrf
				<div class="form-group">
					<input type="text" id="name" name="name" class="form-control name" placeholder="Pizza name" required>
					<span class="errorMessage" style="display:none; color:red;">shall start with letter only !</span>
				</div>
				<div class="form-group">
					<input type="number" id="price" name="price" class="form-control price" placeholder="Prize in dollars" required>
					<span class="errorMsg" style="display:none;color:red;">shall be between 1 to 50 !</span>
				</div>
				<div class="form-group">
					<textarea name="ingredients" placeholder="Ingredients" class="form-control "></textarea>
				</div>
			<a data-dismiss="modal" class="closeModal">DISCARD</a>
		 	 &nbsp;
		  <input type="submit" value="CREATE" class="submit createBtn text-warning">
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- =================================END MODEL CREATE==================================================== -->

  <!-- ========================================START Model UPDATE================================================ -->
	<!-- The Modal -->
	@foreach($pizzas as $pizza)
	<div class="modal fade" id="updatePizza{{$pizza->id}}">
	
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Pizza</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body text-right">
			<form  action="{{url('update',$pizza->id)}}" method="post">
				@csrf
				@method('PUT')
				<div class="form-group">
					<input type="text" name="name" class="form-control name" value="{{$pizza->name}}" required>
					<span class="errorMessage" style="display:none; color:red;">shall start with letter only !</span>
				</div>
				<div class="form-group">
					<input type="number" name="price" class="form-control price" value="{{$pizza->price}}" required>
					<span class="errorMsg" style="display:none;color:red;">shall be between 1 to 50 !</span>
				</div>
				<div class="form-group">
					<textarea name="ingredients"  class="form-control">{{$pizza->ingredients}}</textarea>
				</div>
			<a data-dismiss="modal" class="closeModal">DISCARD</a>
		 	 &nbsp;
		  <input type="submit" value="UPDATE" class="submit createBtn text-warning">
        </div>
        </form>
      </div>
    </div>
  </div>
  @endforeach
  <!-- =================================END MODEL UPDATE==================================================== -->

