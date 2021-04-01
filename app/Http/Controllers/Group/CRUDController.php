<?php

namespace App\Http\Controllers\Group;

use App\Group;
use App\Http\Controllers\Controller;
use App\Http\Requests\GroupCRUDRequest as Request;
use \Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class CRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'group.index'
        )->withGroups(
            Group::getAll()
        );
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
        try {
            $data = $request->validated();

            $division = Group::create([
                'name' => $data['group-name'],
            ]);

            return response()->json(
                [
                    'data' => $division
                ],
                201
            );
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'message' => $e->getMessage(),
                    'path' => route('group.store'),
                    'timespan' => Carbon::now()->toDateTimeLocalString()
                ],
                500
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        $users = $group->users;

        return view('group.view')
            ->withGroup($group);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return response()->json(
            [
                'data' => $group,
                'update-path' => route('group.update', $group->id)
            ],
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $data = $request->validated();

        try {
            $group->update([
                'name' => $data['group-name']
            ]);

            return response()->json(
                [
                    'data' => $group,
                ],
                200
            );
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'message' => $e->getMessage(),
                    'path' => route('group.update', $group->id),
                    'timespan' => Carbon::now()->toDateTimeLocalString()
                ],
                500
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        try {
            $group->update([
                "is_active" => false
            ]);

            return response()->json([
                'message' => "Group was deleted!",
            ], 200);
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'message' => $e->getMessage(),
                    'path' => route('group.destroy', $group->id),
                    'timespan' => Carbon::now()->toDateTimeLocalString()
                ],
                500
            );
        }
    }

    protected function getStudentsActivity(Collection $attendance)
    {
        $result = StudentActivityService::getStudentActivityReport($attendance);

        return $result;
    }
}
