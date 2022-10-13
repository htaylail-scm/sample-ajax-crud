<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Contracts\Services\Staff\StaffServiceInterface;

class StaffController extends Controller
{
    private $staffService;
    public function __construct(StaffServiceInterface $staffService)
    {
        $this->staffService = $staffService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffLists = $this->staffService->staffList();
        return view('staff.index')->with('staffLists', $staffLists);
           
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStaffRequest $request)
    {
        $this->staffService->storeStaff($request);
        return response()->json([
            'status' => 200,
            'message' => "Staff Data Update Successfully"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff = $this->staffService->editStaff($id);
        if (!$staff) {
            return abort(404);
        }
        return view('staff.show')->with('staff', $staff);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = $this->staffService->editStaff($id);
        if (!$staff) {
            return abort(404);
        }
        return response()->json([
            'status' => 200,
            'staff' => $staff,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStaffRequest $request, $id)
    {
        $staff = $this->staffService->updateStaff($request, $id);
        return response()->json([
            'status' => 200,
            'staff' => $staff,
            'message' => "Staff Data Update Successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->staffService->deleteStaff($id);
        return response()->json([
            'status' => 200,
            'message' => "Staff Delete Successfully"
        ]);
    }
}
