## Tradutor

Este tradutor faz uso do Laravel e da RapidAPI para efetivamente fazer a tradução do texto usando o Google Translator.

## Visualização do funcionamento

Este tradutor está funcionando no seguinte [link](https://tradutorgoogle.herokuapp.com/)

## Serviço de Tradução

O serviço pode ser acessado através do seguinte link: [google-translate1](https://rapidapi.com/googlecloud/api/google-translate1).


## Rotas

Há apenas 2 rotas:
GET / -> rota que carrega o formulário
POST /traduzir -> recebe os dados do formulário e faz a tradução

## View

Toda interface está contida em apenas uma view chamada formulario.blade.php

## Controller

O controller que está operacionalizando a aplicação se chama GoogleTradutorController e nele há dois métodos acessíveis por rotas e um interno:

carregarLinguagens(): método privado que faz a busca na API pelas linguagens que são possíveis de se fazer a tradução.

carregarFormulario(): método que chama o método anterior para carregar as linguagens possíveis e monta o formulário (view).

produzirTraducao(Request): método que recebe um Request com todos os dados da solicitação, faz a tradução no servidor e retorna novamente o mesmo formulário com os dados para serem exibidos. 