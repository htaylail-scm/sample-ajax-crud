@extends('layouts.app')
@section('content')
<div class="container">
    <div class="m-5">
        <div id="success_message"></div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddStaffModal">Add Staff</button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Eamil</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>
                @isset($staffLists)
                @foreach($staffLists as $staff)
                <tr>
                    <th scope="row"> {{ ++$no }} </th>
                    <td>{{ $staff->name }}</td>
                    <td>{{ $staff->email }}</td>
                    <td>{{ $staff->address }}</td>
                    <td>{{ $staff->phone }}</td>
                    <td>
                        <button class="btn btn-warning"><a href="{{ route('staff.show', $staff->id) }}">View</a></button>
                        <button class="btn btn-primary editStaff" data-bs-toggle="modal" value="{{ $staff->id }}" data-bs-target="#EditStaffModal">Edit</button>
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
    </div>
</div>
@include('staff.create')
@include('staff.edit')
@endsection
@section('script')
@parent
<script src="{{ asset('js/staff.js') }}"></script>
@endsection