<?php

namespace App\Contracts\Services\Staff;

interface StaffServiceInterface
{
    public  function staffList();
    public  function storeStaff($request);
    public  function editStaff();
    public  function updateStaff();
    public  function deleteStaff();
}