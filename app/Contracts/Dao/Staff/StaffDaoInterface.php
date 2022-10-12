<?php

namespace App\Contracts\Dao\Staff;

interface StaffDaoInterface
{
    public  function staffList();
    public  function storeStaff($request);
    public  function editStaff($id);
    public  function updateStaff($request, $id);
    public  function deleteStaff($id);
   
}