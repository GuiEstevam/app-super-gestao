{{ $slot }}
<form action={{ route('site.contato') }} method="post">
  @csrf
  <input name="nome" value='{{ old('nome') }}' type="text" placeholder="Nome" class="{{ $classe }}">
  <br>
  <input name="telefone" value='{{ old('telefone') }}' type="text" placeholder="Telefone" class="{{ $classe }}">
  <br>
  <input name="email" value='{{ old('email') }}' type="text" placeholder="E-mail" class="{{ $classe }}">
  <br>
  <select name="motivo_contatos_id" class="{{ $classe }}">
    @foreach ($motivo_contatos as $key => $motivo_contato)
      <option {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}
        value="{{ $motivo_contato->id }}">
        {{ $motivo_contato->motivo_contato }}</option>
    @endforeach
  </select>
  <br>
  <textarea name="mensagem" class="{{ $classe }}">{{ old('mensagem') != '' ? old('mensagem') : 'Preencha aqui a sua mensagem' }}
</textarea>
  <br>
  <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

@if ($errors->any())
  <div style="position:absolute; top:0px; width:100%; background:red">
    <pre>
{{ print_r($errors) }}
</pre>
  </div>
@endif