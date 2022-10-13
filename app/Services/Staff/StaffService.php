<?php

namespace App\Services\Staff;

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

    /**
     * Get staffList
     * @return String
     */
    public  function staffList()
    {
        return $this->staffDao->staffList();
    }

    /**
     * Register staff
     * @param Object $request 
     * @return int id
     */
    public  function storeStaff($request)
    {
        return $this->staffDao->storeStaff($request);
    }

    /**
     * Eidt staff
     * @param int $id
     * @return Object
     */
    public  function editStaff($id)
    {
        return $this->staffDao->editStaff($id);
    }

    /**
     * Update staff
     * @param int staff $id
     * @return Object $staff
     */
    public  function updateStaff($request, $id)
    {
        return $this->staffDao->updateStaff($request, $id);
    }

    /**
     * Delete staff
     * @param int staff $id
     * @return  Object $staff
     */
    public  function deleteStaff($id)
    {
        return $this->staffDao->deleteStaff($id);
    }
}
