<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTimeScheduleConfirguationRequest;
use App\Interfaces\TimeScheduleConfirguationRepositoryInterface;
use App\Interfaces\TimeScheduleRepositoryInterface;
use App\Models\TimeScheduleConfirguation;
use Illuminate\Http\Request;

class TimeScheduleConfirguationController extends Controller
{

    private TimeScheduleConfirguationRepositoryInterface $timeScheduleConfirguationRepository;

    public function __construct(TimeScheduleConfirguationRepositoryInterface $timeScheduleConfirguationRepository)
    {
        $this->timeScheduleConfirguationRepository = $timeScheduleConfirguationRepository;
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
    public function store(StoreTimeScheduleConfirguationRequest $request)
    {
        $timeScheduleConfirguation = $this->timeScheduleConfirguationRepository->store(auth()->user(), $request->validated());

        return response()->json($timeScheduleConfirguation);
    }
}
