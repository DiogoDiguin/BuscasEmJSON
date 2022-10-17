<?php

    $dadosJsonPr = file_get_contents('C:\xampp\htdocs\diogo\BuscasEmJSON\Json/Projetos.jsonc');
    $dadosJsonDecodePr = json_decode($dadosJsonPr);
    $projetos = $dadosJsonDecodePr->projetos;

    $dadosJsonCient = file_get_contents('C:\xampp\htdocs\diogo\BuscasEmJSON\Json/Cientista.jsonc');
    $dadosJsonDecodeCient = json_decode($dadosJsonCient);
    $cientistas = $dadosJsonDecodeCient->cientistas;

    $dadosJsonTelefones = file_get_contents('C:\xampp\htdocs\diogo\BuscasEmJSON\Json/Telefones.jsonc');
    $dadosJsonDecodeTelefones = json_decode($dadosJsonTelefones);
    $telefones = $dadosJsonDecodeTelefones->telefones;

    $dadosJsonSocial = file_get_contents('C:\xampp\htdocs\diogo\BuscasEmJSON\Json/RedesSociais.jsonc');
    $dadosJsonDecodeSocial = json_decode($dadosJsonSocial);
    $redesSociais = $dadosJsonDecodeSocial->redesSociais;

    $dJ_AreaAtuacao = file_get_contents('C:\xampp\htdocs\diogo\BuscasEmJSON\Json/AreaAtuacao.jsonc');
    $dJ_DecodeAreaAtuacao = json_decode($dJ_AreaAtuacao);
    $areaAtuacao = $dJ_DecodeAreaAtuacao->areaAtuacao;

    $dJ_AreaAtuacaoCient = file_get_contents('C:\xampp\htdocs\diogo\BuscasEmJSON\Json/AreaAtuacaoCientista.jsonc');
    $dJ_DecodeAreaAtuacaoCient = json_decode($dJ_AreaAtuacaoCient);
    $areaAtuacaoCientista = $dJ_DecodeAreaAtuacaoCient->areaAtuacaoCientista;

    $dJ_Titulacao = file_get_contents('C:\xampp\htdocs\diogo\BuscasEmJSON\Json/Titulacao.jsonc');
    $dJ_DecodedTitulacao= json_decode($dJ_Titulacao);
    $titulacao = $dJ_DecodedTitulacao->titulacao;

    $dJ_Formacao = file_get_contents('C:\xampp\htdocs\diogo\BuscasEmJSON\Json/Formacao.jsonc');
    $dJ_DecodeFormacao = json_decode($dJ_Formacao);
    $formacao = $dJ_DecodeFormacao->formacao;

?>