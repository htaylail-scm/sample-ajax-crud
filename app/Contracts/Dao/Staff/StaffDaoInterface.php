<?php

namespace App\Contracts\Dao\Staff;
interface StaffDaoInterface
{

   /**
   * Get staffList
   * @return $staffLists
   */
    public  function staffList();

    /**
     * Register staff
     * @param request 
     * @return int id
     */
    public  function storeStaff($request);

    /**
     * Edit staff
     * @param Object staff $id
     * @return int staff $id
     */
    public  function editStaff($id);

    /**
     * Update staff
     * @param Object $request and user $id
     * @return int id
     */
    public  function updateStaff($request, $id);

    /**
     * Delete staff
     * @param Object user $id
     * @return
     */
    public  function deleteStaff($id);
}
