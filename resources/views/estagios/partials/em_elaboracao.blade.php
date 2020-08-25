<div>
    
    @if(!empty($estagio->analise_tecnica))
        <b>Última análise técnica do setor de graduação:</b> {{$estagio->analise_tecnica}}
    @endif

    <br><br>
    <form method="POST" action="/enviar_para_analise_tecnica/{{$estagio->id}}">
    @csrf

    <div class="form-group">
        <button type="submit" class="btn btn-success" name="enviar_para_analise_tecnica" value="enviar_para_analise_tecnica"
            onClick="return confirm('Tem certeza que quer enviar para o Setor de Graduação?')">
                Salvar e enviar para Análise Técnica do <b>Setor de Graduação
        </button>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-info" name="enviar_para_analise_tecnica" value="apenas_salvar">
            Apenas salvar alterações
        </button>
    </div>
    
    @include ('estagios.form')

    <div class="form-group">
        <button type="submit" class="btn btn-info" name="enviar_para_analise_tecnica" value="apenas_salvar">
            Apenas salvar alterações
        </button>
    </div>

    </form>

</div>   

