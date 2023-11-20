<?php

namespace App\Http\Controllers;

use App\Models\Task;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data = [
            'page_title' => 'Task Management',
            'tasks' => Task::latest()->paginate(10),
        ];

        if (isset($request->search)) {
            return view('tasks.index', [
                'tasks' => Task::where('title', 'LIKE', '%' . $request->search . '%')->paginate(10)
            ]);
        }


        return view('tasks.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['page_title' => 'Add New Task'];

        return view('tasks.create', $data);
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
            'title' => 'required|max:120|min:3',
            'description' => 'required'
        ]);

        Task::create([
            'title'       => $request->title,
            'description' => $request->description,
            'completed'   => false,
            'created_at'  => new DateTime(),
            'updated_at'  => null,
        ]);

        return redirect()
            ->to('/tasks')
            ->with('message', 'Successfully added task');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tasks = Task::findOrFail($id);

        $data = ['page_title' => $tasks->title, 'tasks' => $tasks];

        return view('tasks.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tasks = Task::findOrFail($id);
        $data = [
            'page_title' => 'Update Task',
            'tasks' => $tasks
        ];

        return view('tasks.edit', $data);
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

        Task::find($id)->update([
            'title'       => $request->title,
            'description' => $request->description,
            'updated_at'  => new DateTime(),
        ]);

        return redirect()
            ->to('/tasks')
            ->with('message', 'Successfully updated task');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tasks = Task::findOrFail($id);
        $tasks->delete();

        return redirect()
            ->to('/tasks')
            ->with('message', 'Successfully deleted task');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updateCompletedTask($id)
    {

        $tasks = Task::find($id);
        $tasks->update(['completed' => true, 'updated_at' => new DateTime()]);

        return redirect()
            ->to('/tasks')
            ->with('message', 'Successfully undo task');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updateUndoTask($id)
    {
        $tasks = Task::find($id);
        $tasks->update(['completed' => false, 'updated_at' => new DateTime()]);

        return redirect()
            ->to('/tasks')
            ->with('message', 'Successfully undo task');
    }
}
