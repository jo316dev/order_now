<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanRequest;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{

    private $repository;
    const PLANS = 'admin.pages.plans.';



    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = $this->repository->latest()->paginate();

        return view(self::PLANS . 'index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(self::PLANS . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlanRequest $request)
    {
        if (!$this->repository->create($request->all())) {

            return redirect()->back()->with('error', 'Houve um erro ao cadastrar o plano');
        }

        return redirect()->route('plans.index')->with('success', 'Plano cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $url
     * @return \Illuminate\Http\Response
     */
    public function edit($url)
    {
        if (!$plan = $this->repository->where('url', $url)->first()) {

            return redirect()->back()->with('error', 'Plano não encontrado');
        }

        return view(self::PLANS . 'edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $url
     * @return \Illuminate\Http\Response
     */
    public function update(PlanRequest $request, $url)
    {
        if (!$plan = $this->repository->where('url', $url)->first()) {

            return redirect()->back()->with('error', 'Plano não encontrado');
        }

        $plan->update($request->all());

        return redirect()->route('plans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $url
     * @return \Illuminate\Http\Response
     */
    public function destroy($url)
    {
        if (!$plan = $this->repository->where('url', $url)->first()) {

            return redirect()->back()->with('error', 'Plano não encontrado');
        }

        $plan->delete();

        return redirect()->route('plans.index')->with('success', 'Plano deletado com sucesso');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');



        $plans = $this->repository->search($request->filter);

        return view(self::PLANS . 'index', compact('plans', 'filters'));
    }
}
