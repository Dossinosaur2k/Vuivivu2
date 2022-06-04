<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CrawlHistoryCreateRequest;
use App\Http\Requests\CrawlHistoryUpdateRequest;
use App\Repositories\Interfaces\CrawlHistoryRepository;
use App\Validators\CrawlHistoryValidator;

/**
 * Class CrawlHistoriesController.
 *
 * @package namespace App\Http\Controllers;
 */
class CrawlHistoriesController extends Controller
{
    /**
     * @var CrawlHistoryRepository
     */
    protected $repository;

    /**
     * @var CrawlHistoryValidator
     */
    protected $validator;

    /**
     * CrawlHistoriesController constructor.
     *
     * @param CrawlHistoryRepository $repository
     * @param CrawlHistoryValidator $validator
     */
    public function __construct(CrawlHistoryRepository $repository, CrawlHistoryValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        // $crawlHistories = $this->repository->all();

        // if (request()->wantsJson()) {

        //     return response()->json([
        //         'data' => $crawlHistories,
        //     ]);
        // }
        $histories = $this->repository->getAll();
        $histories = $this->repository->pagination($request);
        // dd($histories);
        return view('admin.crawlHistories.all')->with('histories', $histories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CrawlHistoryCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CrawlHistoryCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $crawlHistory = $this->repository->create($request->all());

            $response = [
                'message' => 'CrawlHistory created.',
                'data'    => $crawlHistory->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $crawlHistory = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $crawlHistory,
            ]);
        }
        $erros = $crawlHistory->fail;
        // dd($erros);
        return view('admin.crawlHistories.show_error')->with('errors', $erros);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $crawlHistory = $this->repository->find($id);

        return view('crawlHistories.edit', compact('crawlHistory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CrawlHistoryUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(CrawlHistoryUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $crawlHistory = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'CrawlHistory updated.',
                'data'    => $crawlHistory->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'CrawlHistory deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'CrawlHistory deleted.');
    }
}
