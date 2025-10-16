<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    [text* nome autocomplete:off placeholder "nome completo"]
</div>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    [tel* telefone class:phone autocomplete:off placeholder "telefone"]
</div>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    [email* email autocomplete:off placeholder "e-mail"]
</div>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    [text cargo autocomplete:off placeholder "cargo"]
</div>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 anexar">
    <label for="fileuploadfield" class="labelAnexar">Anexar</label>[file Anexar id:fileuploadfield limit:3000Kb filetypes:doc|docx|pdf|txt|xls|xlsx|jpg class:fileuploadfield btnAnexar]<span>[submit "enviar"]</span>

    [file Anexar id:fileuploadfield limit:3000Kb filetypes:doc|docx|pdf|txt|xls|xlsx|jpg class:fileuploadfield btnAnexar]<span>[submit "enviar"]</span>
</div>



--------

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-flex align-items-center">
    [text* nome autocomplete:off placeholder "nome"] 
    [email* email autocomplete:off placeholder "e-mail"] 
    <label for="fileuploadfield" class:labelAnexar >Anexar</label>[file Anexar id:fileuploadfield limit:3000Kb filetypes:doc|docx|pdf|txt|xls|xlsx|jpg class:fileuploadfield btnAnexar placeholder "anexar"]
    [submit "enviar" class:btn class:btnPadrao]
</div>

--------

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    [text* nome autocomplete:off placeholder "Nome"] 
</div>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    [email* email class:mail autocomplete:off placeholder "E-mail"] 
</div>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    [tel* telefone class:phone autocomplete:off placeholder "Telefone"] 
</div>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
   [textarea mensagem id:message class:form-control 40x3 autocomplete:off placeholder "Mensagem"]
</div>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 gridSubmit">[submit "Enviar" class:btn btnPadrao]</div>


<!-- ------------------  orçamento  ------------------------------ -->

<div class="row d-flex">
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        [text* nome autocomplete:off placeholder "nome completo"]
    </div>
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        [tel* telefone class:phone autocomplete:off placeholder "telefone"]
    </div>
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        [email* email autocomplete:off placeholder "e-mail"]
    </div>
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        [text data-evento class:date placeholder "data do evento"]
    </div>
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        [text* tipo-de-evento autocomplete:off placeholder "tipo de evento"]
    </div>
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
        [number* qtde-convidados min:1 max:999 class:qtde-convidados placeholder "nº convidados"]
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 rowFull">
        [text* endereco autocomplete:off placeholder "endereço"]
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 gridSubmit">
        [submit "enviar"]
    </div>
</div>