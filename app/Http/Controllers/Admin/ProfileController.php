<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
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
    public function store(ProfileRequest $request)
    {
        if (!$this->repository->create($request->all())) {

            return redirect()->back()->with('error', 'Houve um erro ao cadastrar o perfil');
        }

        return redirect()->route('profiles.index')->with('success', 'perfil cadastrado com sucesso');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$profile = $this->repository->find($id)) {

            return redirect()->back()->with('error', 'Perfilnão encontrado');
        }

        return view(self::PROFILE . 'edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(profileRequest $request, $id)
    {
        if (!$profile = $this->repository->find($id)) {

            return redirect()->back()->with('error', 'Perfilnão encontrado');
        }

        $profile->update($request->all());

        return redirect()->route('profiles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$profile = $this->repository->find($id)) {

            return redirect()->back()->with('error', 'Perfilnão encontrado');
        }

        $profile->delete();

        return redirect()->route('profiles.index')->with('success', 'Perfildeletado com sucesso');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $profiles = $this->repository->search($request->filter);

        return view(self::PROFILE . 'index', compact('profiles', 'filters'));
    }
}
