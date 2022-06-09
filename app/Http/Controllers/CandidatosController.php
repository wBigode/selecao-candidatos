<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Candidato;
use App\Models\Experiencia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CandidatoRequest;

class CandidatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidatos = Candidato::all();

        return view('candidatos.index')->with('candidatos', $candidatos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidatos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CandidatoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CandidatoRequest $request)
    {
        DB::beginTransaction();

        try {
            $candidato = new Candidato();

            $candidato->nome = $request->get('nome');
            $candidato->email = $request->get('email');
            $candidato->telefone = $request->get('telefone');
            $candidato->usuario = $request->get('usuario');
            $candidato->senha = Hash::make($request->get('senha'));
            $candidato->save();

            if (null !== $request->get('experiencias')) {
                $experienciaProfissional = new Experiencia();

                $experienciaProfissional->candidato_id = $candidato->id;
                $experienciaProfissional->experiencia_tipo_id = 1;
                $experienciaProfissional->descricao = $request->get('experiencias');
                $experienciaProfissional->save();
            }

            if (null !== $request->get('formacoes')) {
                $experienciaAcademica = new Experiencia();

                $experienciaAcademica->candidato_id = $candidato->id;
                $experienciaAcademica->experiencia_tipo_id = 2;
                $experienciaAcademica->descricao = $request->get('formacoes');
                $experienciaAcademica->save();
            }

            DB::commit();
        } catch (Exception $ex) {

            DB::rollBack();
            return $ex->getMessage();
        }

        return redirect('/candidatos');
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
        $candidato = Candidato::find($id);
        $experiencia = Experiencia::where(['candidato_id' => $id, 'experiencia_tipo_id' => 1])->first();
        $formacao = Experiencia::where(['candidato_id' => $id, 'experiencia_tipo_id' => 2])->first();

        return view('candidatos.edit', [
            'candidato'     => $candidato,
            'experiencia'   => $experiencia,
            'formacao'      => $formacao
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CandidatoRequest $request, $id)
    {
        DB::beginTransaction();

        try {
            $candidato =  Candidato::find($id);

            $candidato->nome = $request->get('nome');
            $candidato->email = $request->get('email');
            $candidato->telefone = $request->get('telefone');
            $candidato->usuario = $request->get('usuario');
            $candidato->senha = Hash::make($request->get('senha'));
            $candidato->save();

            if ((null !== $request->get('experiencias')) && (null !== $request->get('experiencia_id'))) {
                $experienciaProfissional = Experiencia::find($request->get('experiencia_id'));

                $experienciaProfissional->candidato_id = $candidato->id;
                $experienciaProfissional->experiencia_tipo_id = 1;
                $experienciaProfissional->descricao = $request->get('experiencias');
                $experienciaProfissional->save();
            }

            if ((null !== $request->get('formacoes')) && (null !== $request->get('formacao_id'))) {
                $experienciaAcademica = Experiencia::find($request->get('formacao_id'));

                $experienciaAcademica->candidato_id = $candidato->id;
                $experienciaAcademica->experiencia_tipo_id = 2;
                $experienciaAcademica->descricao = $request->get('formacoes');
                $experienciaAcademica->save();
            }

            DB::commit();
        } catch (Exception $ex) {

            DB::rollBack();
            return $ex->getMessage();
        }

        return redirect('/candidatos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $candidato =  Candidato::find($id);
            $candidato->delete();

            DB::commit();
        } catch (Exception $ex) {

            DB::rollBack();
            return $ex->getMessage();
        }

        return redirect('/candidatos');
    }
}
