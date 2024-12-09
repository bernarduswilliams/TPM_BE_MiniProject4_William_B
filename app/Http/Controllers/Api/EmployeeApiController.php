<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeApiController extends Controller
{
    public function index(Request $request){
        $employees = Employee::all();
        return response()->json([
            'success'=>true,
            'employee_data'=>$employees],
            200);
    }

    public function save(Request $request){
        $Employee = New Employee;
        try {
            $Employee->name = $request->name;
            $Employee->reason = $request->reason;
            $Employee->join_date = $request->join_date;
            $Employee->scale = $request->scale;
            $Employee->job_id = $request->job_id;
            $Employee->image = "this is file dummy";
            $Employee->save();
        }catch (\Exception $e){
            return response()->json(['error'=>$e->getMessage()],500);
        }

        return response()->json([
            'success'=>true,
            'employee_date'=>$Employee
        ]);
    }

    public function update($id, Request $request){
        $employeeToUpdate = Employee::find($id);

        $employeeToUpdate->reason = $request->reason;
        $employeeToUpdate->scale = $request->scale;
        $employeeToUpdate->save();

        return response()->json([
            'success'=>true,
            'message'=>'Employee data has update succesfully',
            'new_employee_data'=>$employeeToUpdate
            ], 200);
    }

    public function delete($id){
        $employee = Employee::find($id);
        $employee->delete();
        return response()->json([
            'success'=>true,
            'message'=>'Employee data has been deleted succesfully'
        ],200);
    }
}
