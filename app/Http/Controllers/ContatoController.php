<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use App\Models\SiteContato;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato()
    {
        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request)
    {

        $regras = [
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'required|email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
            'email.email' => 'O campo email precisa ser um email válido',
            'motivo_contatos_id.required' => 'O campo motivo do contato precisa ser preenchido',
            'mensagem.max' => 'O campo mensagem precisa ter no máximo 2000 caracteres',
            'required' => 'O campo :attribute precisa ser preenchido',
            'email' => 'O campo :attribute precisa ser um email válido',
        ];

        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
