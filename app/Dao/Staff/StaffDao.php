<?php

namespace App\Dao\Staff;

use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use App\Contracts\Dao\Staff\StaffDaoInterface;

class StaffDao implements StaffDaoInterface
{
    /**
     * Get StaffList
     * @return Object staffList
     */
    public  function staffList()
    {
        $staffList = Staff::all();
        return $staffList;
    }

    /**
     * Register staff
     * @param Object $request
     * @return Object $staff
     */
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

    /**
     * Edit staff
     *
     * @param Object $id
     * @return Object $id
     */
    public  function editStaff($id)
    {
        $staff = Staff::find($id);
        return $staff;
    }

    /**
     * Update staff
     *
     * @param Object $request, $id
     * @return Object $staff
     */
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

    /**
     * Delete staff
     *
     * @param Object $id
     * @return Object $staff
     */
    public  function deleteStaff($id)
    {
        DB::transaction(function () use ($id) {
            $staff = Staff::where('id', $id)->delete();
            if ($staff) {
                return Staff::where('id', $id)->withTrashed()->update(
                    [
                        'deleted_at' => now(),
                    ]
                );
            }
            return $staff;
        });
    }
}
