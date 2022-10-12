<?php

namespace App\Services\Staff;

use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use App\Contracts\Dao\Staff\StaffDaoInterface;
use App\Contracts\Services\Staff\StaffServiceInterface;

class StaffService implements StaffServiceInterface
{
    private $staffDao;

    /**
     * Constructor
     */
    public function __construct(StaffDaoInterface $staffDao)
    {
        $this->staffDao = $staffDao;
    }
    public  function staffList(){
        return $this->staffDao->staffList();
    }

    public  function storeStaff($request){
        return $this->staffDao->storeStaff($request);
    }

    public  function editStaff($id){
        return $this->staffDao->editStaff($id);
    }

    public  function updateStaff($request, $id){
        return $this->staffDao->updateStaff($request, $id);
    }

    public  function deleteStaff($id){
        return $this->staffDao->deleteStaff($id);
    }
}