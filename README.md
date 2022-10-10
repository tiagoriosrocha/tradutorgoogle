## Tradutor

Este tradutor faz uso do Laravel 6.20, Bootstrap 5.2 e da RapidAPI para fazer a tradução do texto usando o Google Translator.

## Visualização do funcionamento

Este tradutor está funcionando no seguinte [link](https://tradutorgoogle.herokuapp.com/)

## Serviço de Tradução

O serviço de tradução (que usa o Google Translate) que o RapidAPI fornece, pode ser acessado através do seguinte link: [google-translate1](https://rapidapi.com/googlecloud/api/google-translate1).


## Rotas

Há apenas 2 rotas:
Rota: GET / -> rota que carrega o formulário.
Rota: POST /traduzir -> recebe os dados do formulário e faz a tradução.

## View

Toda interface (com bootostrap) está contida em apenas uma view chamada formulario.blade.php

## Controller

O controller que está operacionalizando a aplicação se chama GoogleTradutorController e nele há três métodos:

carregarLinguagens(): método privado que faz a busca na API a relação de linguagens suportadas.

carregarFormulario(): método público que chama o método anterior para carregar as linguagens e monta o formulário (view) para o usuário.

produzirTraducao(Request): método público que recebe um Request com todos os dados do formulário, faz a tradução via API e retorna novamente o mesmo formulário com os dados da tradução e a relaçãoo das linguagens (método carregarLinguagens). 