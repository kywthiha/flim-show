<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBusScheduleRequest;
use App\Interfaces\BusScheduleRepositoryInterface;
use App\Models\BusSchedule;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BusScheduleController extends Controller
{

    private BusScheduleRepositoryInterface $busScheduleRepository;

    public function __construct(BusScheduleRepositoryInterface $busScheduleRepository)
    {
        $this->busScheduleRepository = $busScheduleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $busSchedule = $this->busScheduleRepository->getBusSchedule(auth()->user());

        return response()
            ->json([
                "message" => "Success",
                'data' =>  $busSchedule,
            ], Response::HTTP_OK);
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
    public function store(StoreBusScheduleRequest $request)
    {
        $busSchedule = $this->busScheduleRepository->store(auth()->user(), $request->validated());

        return response()
            ->json([
                "message" => "Success",
                'data' =>  $busSchedule,
            ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BusSchedule  $busSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(BusSchedule $busSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BusSchedule  $busSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(BusSchedule $busSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BusSchedule  $busSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusSchedule $busSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusSchedule  $busSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusSchedule $busSchedule)
    {
        //
    }
}
