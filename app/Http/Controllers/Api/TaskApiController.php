<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use DateTime;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class TaskApiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tasks = Task::all();
        $keyword = $request->search;

        if ($keyword) {
            $tasks = Task::where('title', 'LIKE', '%' . $keyword  . '%')->get();
            return response()
                ->json(['data' => $tasks])
                ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
        }

        $response = [
            'error' => false,
            'status_code' => Response::HTTP_OK,
            'message'     => 'Results All Tasks',
            'data' => $tasks,
        ];

        return response()
            ->json($response)
            ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $tasks = Task::create([
            'title'        => $request->title,
            'description'  => $request->description,
            'completed'    => false,
            'created_at'   => new DateTime(),
            'updated_at'   => null,
        ]);

        $response = [
            'error'        => false,
            'status_code'  => Response::HTTP_CREATED,
            'message'      => Response::$statusTexts[Response::HTTP_CREATED],
            'data'         => $tasks,
        ];

        return response()
            ->json($response)
            ->setStatusCode(Response::HTTP_CREATED, Response::$statusTexts[Response::HTTP_CREATED]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $tasks  = Task::where('id', $task->id)->firstOrFail();

        return response()
            ->json($tasks)
            ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
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
        $task = Task::findOrFail($id);
        $task->update($request->all());

        return response()
            ->json($task)
            ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()
            ->json()
            ->setStatusCode(
                Response::HTTP_NO_CONTENT,
                Response::$statusTexts[Response::HTTP_NO_CONTENT]
            );
    }
}
