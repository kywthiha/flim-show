<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTimeScheduleRequest;
use App\Interfaces\BusScheduleRepositoryInterface;
use App\Interfaces\TimeScheduleConfirguationRepositoryInterface;
use App\Interfaces\TimeScheduleRepositoryInterface;
use App\Models\TimeSchedule;
use App\Services\TimeScheduleService;
use Illuminate\Http\Request;

class TimeScheduleController extends Controller
{

    private TimeScheduleRepositoryInterface $timeScheduleRepository;
    private BusScheduleRepositoryInterface $busScheduleRepository;
    private TimeScheduleService $timeScheduleService;
    private TimeScheduleConfirguationRepositoryInterface $timeScheduleConfirguationRepository;

    public function __construct(TimeScheduleRepositoryInterface $timeScheduleRepository,TimeScheduleConfirguationRepositoryInterface $timeScheduleConfirguationRepository, BusScheduleRepositoryInterface $busScheduleRepository, TimeScheduleService $timeScheduleService)
    {
        $this->timeScheduleRepository = $timeScheduleRepository;
        $this->timeScheduleConfirguationRepository = $timeScheduleConfirguationRepository;
        $this->busScheduleRepository = $busScheduleRepository;
        $this->timeScheduleService = $timeScheduleService;

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTimeScheduleRequest $request)
    {
        $timeSchedule = $this->timeScheduleRepository->store(auth()->user(), $request->validated());

        return response()->json($timeSchedule);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TimeSchedule  $timeSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(TimeSchedule $timeSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TimeSchedule  $timeSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeSchedule $timeSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TimeSchedule  $timeSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimeSchedule $timeSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TimeSchedule  $timeSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeSchedule $timeSchedule)
    {
        //
    }

    public function getCatchMovieTime()
    {
        $timeScheduleConfirguation = $this->timeScheduleConfirguationRepository->getTimeScheduleConfirguation(auth()->user());
        $busSchedule = $this->busScheduleRepository->getBusSchedule(auth()->user());
        $timeSchedule = $this->timeScheduleService->catchMovieTime($busSchedule, $timeScheduleConfirguation);
        return response()->json($timeSchedule);
    }
}
