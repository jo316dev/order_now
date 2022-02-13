<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    private $repository;
    const PERMISSION = 'admin.pages.permissions.';



    public function __construct(Permission $permission)
    {
        $this->repository = $permission;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = $this->repository->latest()->paginate();

        return view(self::PERMISSION . 'index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(self::PERMISSION . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        if (!$this->repository->create($request->all())) {

            return redirect()->back()->with('error', 'Houve um erro ao cadastrar o perfil');
        }

        return redirect()->route('permissions.index')->with('success', 'perfil cadastrado com sucesso');
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
        if (!$permission = $this->repository->find($id)) {

            return redirect()->back()->with('error', 'Perfil não encontrado');
        }

        return view(self::PERMISSION . 'edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, $id)
    {
        if (!$permission = $this->repository->find($id)) {

            return redirect()->back()->with('error', 'Perfilnão encontrado');
        }

        $permission->update($request->all());

        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$permission = $this->repository->find($id)) {

            return redirect()->back()->with('error', 'Perfilnão encontrado');
        }

        $permission->delete();

        return redirect()->route('permissions.index')->with('success', 'Perfildeletado com sucesso');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $permissions = $this->repository->search($request->filter);

        return view(self::PERMISSION . 'index', compact('permissions', 'filters'));
    }
}
