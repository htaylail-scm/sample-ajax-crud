<?php

namespace App\Services\Staff;

use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use App\Contracts\Services\Staff\StaffServiceInterface;

class StaffService implements StaffServiceInterface
{
    public  function staffList(){
        $staffList = Staff::all();
        return $staffList;
    }

    public  function storeStaff($request){
        DB::transaction(function () use ($request) {
            $staff = Staff::create([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone,                
            ]);
            return $staff;
        });
    }

    public  function editStaff(){

    }

    public  function updateStaff(){

    }
    
    public  function deleteStaff(){

    }
}