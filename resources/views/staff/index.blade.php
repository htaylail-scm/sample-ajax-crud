@extends('layouts.app')
@section('content')
<div class="container">
<div class="m-5">
   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddStaffModal">Add Staff</button>
   <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>
            @isset($staffLists)
            
                @foreach($staffLists as $staff)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $staff->name }}</td>
                    <td>{{ $staff->email }}</td>
                    <td>{{ $staff->address }}</td>
                    <td>{{ $staff->phone }}</td>
                    <td>{{ $staff->age }}</td>
                    <td>
                        <button type="button" class="btn btn-primary editStaff" data-bs-toggle="modal" value="{{ $staff->id }}"  data-bs-target="#EditStaffModal">Edit</button>
                        <button>Delete</button>
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