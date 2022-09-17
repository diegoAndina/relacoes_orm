<?php

namespace App\\Http\\Controllers\\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $funcionario = Funcionario::where('nome', 'LIKE', "%$keyword%")
                ->orWhere('cpf', 'LIKE', "%$keyword%")
                ->orWhere('salario', 'LIKE', "%$keyword%")
                ->orWhere('situacao', 'LIKE', "%$keyword%")
                ->orWhere('data_contratacao', 'LIKE', "%$keyword%")
                ->orWhere('data_demissao', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $funcionario = Funcionario::latest()->paginate($perPage);
        }

        return view('admin.funcionario.index', compact('funcionario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.funcionario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Funcionario::create($requestData);

        return redirect('admin/funcionario')->with('flash_message', 'Funcionario added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $funcionario = Funcionario::findOrFail($id);

        return view('admin.funcionario.show', compact('funcionario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $funcionario = Funcionario::findOrFail($id);

        return view('admin.funcionario.edit', compact('funcionario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $funcionario = Funcionario::findOrFail($id);
        $funcionario->update($requestData);

        return redirect('admin/funcionario')->with('flash_message', 'Funcionario updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Funcionario::destroy($id);

        return redirect('admin/funcionario')->with('flash_message', 'Funcionario deleted!');
    }
}
