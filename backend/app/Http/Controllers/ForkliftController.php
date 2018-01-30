<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateForkliftRequest;
use App\Http\Requests\UpdateForkliftRequest;
use App\Repositories\ForkliftRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ForkliftController extends AppBaseController
{
    /** @var  ForkliftRepository */
    private $forkliftRepository;

    public function __construct(ForkliftRepository $forkliftRepo)
    {
        $this->forkliftRepository = $forkliftRepo;
    }

    /**
     * Display a listing of the Forklift.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->forkliftRepository->pushCriteria(new RequestCriteria($request));
        $forklifts = $this->forkliftRepository->all();

        return view('forklifts.index')
            ->with('forklifts', $forklifts);
    }

    /**
     * Show the form for creating a new Forklift.
     *
     * @return Response
     */
    public function create()
    {
        return view('forklifts.create');
    }

    /**
     * Store a newly created Forklift in storage.
     *
     * @param CreateForkliftRequest $request
     *
     * @return Response
     */
    public function store(CreateForkliftRequest $request)
    {
        $input = $request->all();

        $forklift = $this->forkliftRepository->create($input);

        Flash::success('Forklift saved successfully.');

        return redirect(route('forklifts.index'));
    }

    /**
     * Display the specified Forklift.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $forklift = $this->forkliftRepository->findWithoutFail($id);

        if (empty($forklift)) {
            Flash::error('Forklift not found');

            return redirect(route('forklifts.index'));
        }

        return view('forklifts.show')->with('forklift', $forklift);
    }

    /**
     * Show the form for editing the specified Forklift.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $forklift = $this->forkliftRepository->findWithoutFail($id);

        if (empty($forklift)) {
            Flash::error('Forklift not found');

            return redirect(route('forklifts.index'));
        }

        return view('forklifts.edit')->with('forklift', $forklift);
    }

    /**
     * Update the specified Forklift in storage.
     *
     * @param  int              $id
     * @param UpdateForkliftRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateForkliftRequest $request)
    {
        $forklift = $this->forkliftRepository->findWithoutFail($id);

        if (empty($forklift)) {
            Flash::error('Forklift not found');

            return redirect(route('forklifts.index'));
        }

        $forklift = $this->forkliftRepository->update($request->all(), $id);

        Flash::success('Forklift updated successfully.');

        return redirect(route('forklifts.index'));
    }

    /**
     * Remove the specified Forklift from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $forklift = $this->forkliftRepository->findWithoutFail($id);

        if (empty($forklift)) {
            Flash::error('Forklift not found');

            return redirect(route('forklifts.index'));
        }

        $this->forkliftRepository->delete($id);

        Flash::success('Forklift deleted successfully.');

        return redirect(route('forklifts.index'));
    }
}
