<?php

namespace App\Http\Controllers;

use App\Mail\MyEmail;
use App\Models\Employee;
use App\Models\Jobdesk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{
    public function welcome(){
        $employees = Employee::all();
        return view('welcome', compact('employees'));
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'reason' => 'required|string|min:5',
            'join_date' => 'required|date',
            'scale' => 'required|integer|between:1,10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'job_category' => 'required|exists:jobdesks,id',
        ]);

        $filePath = public_path('storage/images');
        $file = $request->file('image');
        $fileName = $request->name . '-' . $file->getClientOriginalName();
        //edit name file gambar ^
        $file->move($filePath, $fileName);

        Employee::create([
            'name' => $request->name,
            'reason' => $request->reason,
            'join_date' => $request->join_date,
            'scale' => $request->scale,
            'image' => $fileName,
            'job_id'=> $request->job_category
        ]);

        Mail::to('user@gmail.com')->send(new MyEmail([
            'name' => $request->name,
            'reason' => $request->reason,
            'join_date' => $request->join_date
        ]));

        return redirect()->route('welcome');

    }

    public function createEmployee(){
        $jobdesks = Jobdesk::all();
        return view('createEmployee', compact('jobdesks'));
    }

    public function editEmployee($id){
        $employee = Employee::findOrFail($id);
        return view('editEmployee', compact('employee'));
    }

    public function updateEmployee($id, Request $request){
        $employee = Employee::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'reason' => 'required|string|min:5',
            'join_date' => 'required|date',
            'scale' => 'required|integer|between:1,10',
            'image' => 'nullable|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($employee->image) {
                $oldImagePath = public_path('storage/images/' . $employee->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload the new image
            $filePath = public_path('storage/images');
            $file = $request->file('image');
            $fileName = $request->name . '-' . $file->getClientOriginalName();
            $file->move($filePath, $fileName);
        }else{
            $fileName = $employee->image;
        }

        $employee->update([
            'name' => $request->name,
            'reason' => $request->reason,
            'join_date' => $request->join_date,
            'scale' => $request->scale,
            'image' => $fileName
        ]);

        return redirect()->route('welcome');
    }

    public function deleteEmployee($id){
        $employee = Employee::findOrFail($id);

        if ($employee->image) {
            $oldImagePath = public_path('storage/images/' . $employee->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        Employee::destroy($id);
        return redirect()->route('welcome');
    }
}
