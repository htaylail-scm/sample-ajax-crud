<?php

namespace App\Contracts\Dao\Staff;

interface StaffDaoInterface
{
    public  function staffList();
    public  function storeStaff($request);
    public  function editStaff();
    public  function updateStaff();
    public  function deleteStaff();
   
}