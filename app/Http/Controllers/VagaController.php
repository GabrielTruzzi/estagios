<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VagaRequest;
use App\Models\Vaga;
use Auth;
use Illuminate\Support\Facades\Gate;

class VagaController extends Controller
{
    public function index(Request $request){
        if ( Gate::allows('empresa') ) {
            $cnpj = Auth::user()->cnpj;
            $vagas = Vaga::where('cnpj',$cnpj)->orderBy('created_at', 'desc')->paginate(10);
            return view('vagas.index')->with('vagas',$vagas);
        } else if ( Gate::allows('admin')){
            $vagas = Vaga::orderBy('created_at', 'desc')->paginate(10);
        }

        return view('vagas.index')->with([
            'vagas' => $vagas,
        ]);
    }

    public function show(Vaga $vaga){
        return view('vagas.show')->with('vaga', $vaga);
    }

    public function create(){
        $this->authorize('logado');
        return view('vagas.create')->with('vaga',new Vaga);
    }

    public function store(VagaRequest $request){
        $this->authorize('logado');
        $vaga = Vaga::create($request->validated());
        return redirect ("vagas/{$vaga->id}");
    }
    
    public function edit(Vaga $vaga) {
        # PRECISAMOS ARRUMAR
        if ( Gate::allows('empresa',$vaga->cnpj) | Gate::allows('admin') ) {
            return view('/vagas.edit')-> with('vaga', $vaga);
        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }
    }

    public function update(VagaRequest $request, Vaga $vaga){
        # PRECISAMOS ARRUMAR
        if ( Gate::allows('empresa',$vaga->cnpj) | Gate::allows('admin') ) {
            $this->authorize('admin_ou_empresa',$vaga->cnpj);;
            $vaga->status = $request->status;
            $validated = $request->validated();
            $vaga->update($validated);
            return redirect("/vagas/{$vaga->id}");
        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }
    }

    public function destroy(Vaga $vaga){
        # PRECISAMOS ARRUMAR
        if ( Gate::allows('empresa',$vaga->cnpj) | Gate::allows('admin') ) {
            $vaga->delete();
            return redirect('/');
        } else {
            request()->session()->flash('alert-danger', 'Sem permissão para executar ação');
        }
    }
}