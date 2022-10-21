<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Empty_;


class EmployeeController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $employees = Employee::orderBy('id')->paginate(5);
        return view('employees.index', compact('employees'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('employees.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'email' => 'required',
        ]);

       Employee::create($request->post());

        return redirect()->route('employees.index')->with('success','Employee has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Employee  $employee
    * @return \Illuminate\Http\Response
    */
    public function show(Employee $employee)
    {
        return view('employees.show',compact('employee'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Employee $employee
    * @return \Illuminate\Http\Response
    */
    public function edit(Employee $employee)
    {
        return view('employees.edit',compact('employee'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\employee $employee
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'age' => 'required',
        ]);

        $employee->fill($request->post())->save();

        return redirect()->route('employees.index')->with('success','Employee Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\employee  $employee
    * @return \Illuminate\Http\Response
    */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success','employee has been deleted successfully');
    }
}
