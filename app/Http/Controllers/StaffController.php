<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Validator;
use App\Http\Requests\CreateStaffRequest;
use App\Contracts\Services\Staff\StaffServiceInterface;
use Illuminate\Http\Request;
use App\Models\Staff;

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
        return view('staff.index')->with('staffLists', $staffLists)
        ->with('no');
       
    }    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStaffRequest $request)
    {
        \Log::info("controller validatior");
        \Log::info($request);
        $validator = Validator($request->all(), $request->rules());
        
        if ($validator->fails()) {
            return response()->json([
                'status'=>403,
                'errors' => $validator->messages,
            ]);
        } else {
            $this->staffService->storeStaff($request);
            return response()->json([
                'status'=>200,
                'message'=>'success'
            ]);
        }
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
        if($staff)
        {
            return response()->json([
                'status'=>200,
                'staff'=> $staff,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $staff = $this->staffService->updateStaff($request, $id);
        return response()->json([
            'status'=>200,
            'message'=>'success',
            'data' => $staff,
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
        \Log::info("delete controller");
        \Log::info($id);
        $this->staffService->deleteStaff($id);     
        return [
            'text' => "Success delete"
        ];
    }
}
