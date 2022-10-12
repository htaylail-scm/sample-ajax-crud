<?php

namespace App\Contracts\Services\Staff;

interface StaffServiceInterface
{
    public  function staffList();
    public  function storeStaff($request);
    public  function editStaff($id);
    public  function updateStaff($request, $id);
    public  function deleteStaff($id);
}