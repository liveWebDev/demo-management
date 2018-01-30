<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateNewsLetterRequest;
use App\Http\Requests\Admin\UpdateNewsLetterRequest;
use App\Repositories\Admin\NewsLetterRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class NewsLetterController extends AppBaseController
{
    /** @var  NewsLetterRepository */
    private $newsLetterRepository;

    public function __construct(NewsLetterRepository $newsLetterRepo)
    {
        $this->newsLetterRepository = $newsLetterRepo;
    }

    /**
     * Display a listing of the NewsLetter.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->newsLetterRepository->pushCriteria(new RequestCriteria($request));
        $newsLetters = $this->newsLetterRepository->all();

        return view('admin.news_letters.index')
            ->with('newsLetters', $newsLetters);
    }

    /**
     * Show the form for creating a new NewsLetter.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.news_letters.create');
    }

    /**
     * Store a newly created NewsLetter in storage.
     *
     * @param CreateNewsLetterRequest $request
     *
     * @return Response
     */
    public function store(CreateNewsLetterRequest $request)
    {
        $input = $request->all();

        $newsLetter = $this->newsLetterRepository->create($input);

        Flash::success('News Letter saved successfully.');

        return redirect(route('admin.newsLetters.index'));
    }

    /**
     * Display the specified NewsLetter.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $newsLetter = $this->newsLetterRepository->findWithoutFail($id);

        if (empty($newsLetter)) {
            Flash::error('News Letter not found');

            return redirect(route('admin.newsLetters.index'));
        }

        return view('admin.news_letters.show')->with('newsLetter', $newsLetter);
    }

    /**
     * Show the form for editing the specified NewsLetter.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $newsLetter = $this->newsLetterRepository->findWithoutFail($id);

        if (empty($newsLetter)) {
            Flash::error('News Letter not found');

            return redirect(route('admin.newsLetters.index'));
        }

        return view('admin.news_letters.edit')->with('newsLetter', $newsLetter);
    }

    /**
     * Update the specified NewsLetter in storage.
     *
     * @param  int              $id
     * @param UpdateNewsLetterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNewsLetterRequest $request)
    {
        $newsLetter = $this->newsLetterRepository->findWithoutFail($id);

        if (empty($newsLetter)) {
            Flash::error('News Letter not found');

            return redirect(route('admin.newsLetters.index'));
        }

        $newsLetter = $this->newsLetterRepository->update($request->all(), $id);

        Flash::success('News Letter updated successfully.');

        return redirect(route('admin.newsLetters.index'));
    }

    /**
     * Remove the specified NewsLetter from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $newsLetter = $this->newsLetterRepository->findWithoutFail($id);

        if (empty($newsLetter)) {
            Flash::error('News Letter not found');

            return redirect(route('admin.newsLetters.index'));
        }

        $this->newsLetterRepository->delete($id);

        Flash::success('News Letter deleted successfully.');

        return redirect(route('admin.newsLetters.index'));
    }
}
