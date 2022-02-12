<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    private $repository;
    const PROFILE = 'admin.pages.profiles.';



    public function __construct(Profile $profile)
    {
        $this->repository = $profile;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = $this->repository->latest()->paginate();

        return view(self::PROFILE . 'index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(self::PROFILE . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(profileRequest $request)
    {
        if (!$this->repository->create($request->all())) {

            return redirect()->back()->with('error', 'Houve um erro ao cadastrar o profileo');
        }

        return redirect()->route('profiles.index')->with('success', 'profileo cadastrado com sucesso');
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
        if (!$profile = $this->repository->where('url', $url)->first()) {

            return redirect()->back()->with('error', 'profileo não encontrado');
        }

        return view(self::PROFILE . 'edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $url
     * @return \Illuminate\Http\Response
     */
    public function update(profileRequest $request, $url)
    {
        if (!$profile = $this->repository->where('url', $url)->first()) {

            return redirect()->back()->with('error', 'profileo não encontrado');
        }

        $profile->update($request->all());

        return redirect()->route('profiles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $url
     * @return \Illuminate\Http\Response
     */
    public function destroy($url)
    {
        if (!$profile = $this->repository->where('url', $url)->first()) {

            return redirect()->back()->with('error', 'profileo não encontrado');
        }

        $profile->delete();

        return redirect()->route('profiles.index')->with('success', 'profileo deletado com sucesso');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');



        $profiles = $this->repository->search($request->filter);

        return view(self::PROFILE . 'index', compact('profiles', 'filters'));
    }
}
