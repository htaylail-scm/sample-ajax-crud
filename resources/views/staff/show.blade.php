@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-6">
        <div class="card" >
            <div class="card-body">
            <h5 class="card-title">Staff Data Details</h5>       
            <p class="card-text">{{ $staff->name }}</p>
            <p class="card-text">{{ $staff->email }}</p>
            <p class="card-text">{{ $staff->address }}</p>
            <p class="card-text">{{ $staff->phone }}</p>  
            <button class="btn btn-primary text-white"><a href="{{ route('staff.index') }}">Back</a></button>
        </div>
    </div>   
</div>
</div>
@endsection