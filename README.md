AUTHETICATION / ATENTICAÇÃO

LOGIN /VALIDAR SISTEMA 

AUTHORIZATION -> AUTORIZAR
validar se o usuario pode fazer op no sistema

Validação (Sessão de Usuario) 
    basic (obsoleto)
        ebvia as credenicias a cada requisição

    cookies
        o servidor armazena (em arquivo, no db) o user envia logado 
        o cliente(navegador) envia cada requisição a chave de sessão 
            mais usado na web, sistema serverside

    tokens (JWT)
        forma moderna e robusta 
        o servidor gera um token de sessão unico e devolve ao cliente (não é salvo)
        o cliente eniva cada requisição esse token
        o servidor decripta o token para obter o usuario logado

    onde usa ?
        integração com api, sistema front / back separado, mobile 

    

Funcionalidades 
    Criar usuario
    ver todos users cadastrado
    excluir usuario
    relatorio financeiro



