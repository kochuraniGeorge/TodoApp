<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//////////////////////////////////////////////////////////////////////////////
public function addTask(Request $request)
{
   
    $user = Auth::user();
    //test change
    //test 2
                                    //   echo "<pre>";
                                     // print_r($user['id']);die;
                                      //print_r($user['all()']);die;   
        //  echo "<pre>";print_r($request->all());die;
        $validator = Validator::make($request->all(), [
            'task.*.name' => 'required|string|max:255',// '*' indicates that this validation rule applies to all elements within the "task" array.
            'task.*.description' => 'required|string|max:150'
        //   dd('here'); 
        ],
        [
            'task.*.name.required' => 'The Name of Task field is required.',
            'task.*.description.required' => 'The New ToDo field is required.'
                ]);
        if ($validator->fails()) {
            // echo "<pre>";print_r($request->all());die;
            // dd($request->all());
            // $errors=$validator->errors();
            //  dd($errors); 
            return redirect('homePage')
                ->withErrors($validator)
                ->withInput(); 
        }
        $tasks = $request->input('task');
// dd($tasks);
        foreach ($tasks as $task) { 
            Task::create([
                'name' => $task['name'],
                'description' => $task['description'],
                'created_by' => $user->id,
            ]);
        }
        return redirect()->back()->with('success', 'New ToDo added successfully. Press "My Task" to view your tasks.');
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////
//     $names = $request->input('name');
//     $descriptions = $request->input('description');
//     if (count($names) !== count($descriptions)) {
//         return redirect('homePage')->with('error', 'This field can not be empty.');
//     }
//     foreach ($names as $index => $name) {
//         Task::create([
//             'name' => $name,
//             'description' => $descriptions[$index],
//             'created_by' => $user->id // Collect the user ID from the user table
//         ]);}}    
 ///////////////////////////////////////////////////////////////////////////////////////////////
public function myTasks()
{
    $user = Auth::user();
    $tableData= Task::where('created_by',$user->id)->get();  // the code fetches records from the tasks table where the created_by column matches the id of the $user  //we call the model here,with conditions,here we needed specific user added tasks 
    return view('myTasks', ['tableData' => $tableData]);// Pass the retrieved data to the "myTasks" view
                                                       //key    =>value
}
/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
