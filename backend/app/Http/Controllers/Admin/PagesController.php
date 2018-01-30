<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreatePagesRequest;
use App\Http\Requests\Admin\UpdatePagesRequest;
use App\Repositories\Admin\PagesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PagesController extends AppBaseController
{
    /** @var  PagesRepository */
    private $pagesRepository;

    public function __construct(PagesRepository $pagesRepo)
    {
        $this->pagesRepository = $pagesRepo;
    }

    /**
     * Display a listing of the Pages.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pagesRepository->pushCriteria(new RequestCriteria($request));
        $pages = $this->pagesRepository->all();

        return view('admin.pages.index')
            ->with('pages', $pages);
    }

    /**
     * Show the form for creating a new Pages.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created Pages in storage.
     *
     * @param CreatePagesRequest $request
     *
     * @return Response
     */
    public function store(CreatePagesRequest $request)
    {
        $input = $request->all();

        $pages = $this->pagesRepository->create($input);

        Flash::success('Pages saved successfully.');

        return redirect(route('admin.pages.index'));
    }

    /**
     * Display the specified Pages.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pages = $this->pagesRepository->findWithoutFail($id);

        if (empty($pages)) {
            Flash::error('Pages not found');

            return redirect(route('admin.pages.index'));
        }

        return view('admin.pages.show')->with('pages', $pages);
    }

    /**
     * Show the form for editing the specified Pages.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pages = $this->pagesRepository->findWithoutFail($id);

        if (empty($pages)) {
            Flash::error('Pages not found');

            return redirect(route('admin.pages.index'));
        }

        return view('admin.pages.edit')->with('pages', $pages);
    }

    /**
     * Update the specified Pages in storage.
     *
     * @param  int              $id
     * @param UpdatePagesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePagesRequest $request)
    {
        $pages = $this->pagesRepository->findWithoutFail($id);

        if (empty($pages)) {
            Flash::error('Pages not found');

            return redirect(route('admin.pages.index'));
        }

        $pages = $this->pagesRepository->update($request->all(), $id);

        Flash::success('Pages updated successfully.');

        return redirect(route('admin.pages.index'));
    }

    /**
     * Remove the specified Pages from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pages = $this->pagesRepository->findWithoutFail($id);

        if (empty($pages)) {
            Flash::error('Pages not found');

            return redirect(route('admin.pages.index'));
        }

        $this->pagesRepository->delete($id);

        Flash::success('Pages deleted successfully.');

        return redirect(route('admin.pages.index'));
    }
}
