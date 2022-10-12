@extends('layouts.app')
@section('content')
<div class="container">
<div class="m-5">
   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddStaffModal">Add Staff</button>
   <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">First</th>
                <th scope="col">Eamil</th>
                <th scope="col">Handle</th>
                <th scope="col">Operation</th>
            </tr>
        </thead>
        <tbody>
            @isset($staffLists)
            
                @foreach($staffLists as $staff)
                <tr>
                    <th scope="row"> 1 </th>
                    <td>{{ $staff->name }}</td>
                    <td>{{ $staff->email }}</td>
                    <td>{{ $staff->address }}</td>
                    <td>{{ $staff->phone }}</td>
                    <td>{{ $staff->age }}</td>
                    <td>
                        <button class="btn btn-primary"><a href="{{ route('staff.show', $staff->id) }}">View</a></button>
                        <button class="btn btn-primary editStaff" data-bs-toggle="modal" value="{{ $staff->id }}"  data-bs-target="#EditStaffModal">Edit</button>
                        <button class="btn btn-danger deleteStaff" value="{{ $staff->id }}">Delete</button>
                    </td>
                </tr>
                @endforeach
            @else
            <tr>
            <td colspan="5"> There is no staff data</td>
            </tr>
          
            @endisset 
        </tbody>
    </table>
    @include('staff.create')
    @include('staff.edit')
   </div>
</div>
@endsection