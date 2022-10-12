<?php

namespace App\Dao\Staff;

use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use App\Contracts\Dao\Staff\StaffDaoInterface;

class StaffDao implements StaffDaoInterface
{
    public  function staffList()
    {
        $staffList = Staff::all();
        return $staffList;
    }

    public  function storeStaff($request)
    {
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

    public  function editStaff($id)
    {
        $staff = Staff::find($id);
        return $staff;
    }

    public  function updateStaff($request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $staff = Staff::find($id);
            
            $staff->update([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone,                
            ]);     
            return $staff;
        });
    }

    public  function deleteStaff($id)
    {
        DB::transaction(function () use ($id) {
            $staff = Staff::find($id);
            $staff->delete();
            $staff->save();            
            return $staff;
        });
    }
}