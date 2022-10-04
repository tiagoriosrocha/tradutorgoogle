<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Tradutor</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/">

    

    

<link href="/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="/css/carousel.css" rel="stylesheet">
  </head>
  <body>
    
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Tradutor do Tiago</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/">Link</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<main>

<br>
  <div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <p class="h1 mb-2 mt-2">Formulário de Tradução</p>
        </div>
    </div>
    
    <form method="post" action="traduzir">
            {{ csrf_field() }}
            
    <div class="row">
      <div class="col-md-6 col-sm-12">
            <div class="mb-3">
                <label for="linguagem_origem" class="form-label">Origem</label>
                <select class="form-select"  name="linguagem_origem">
                    @if(isset($lingua_origem))
                        @foreach($vetorLinguagens as $umElemento)
                            <option @if($lingua_origem == $umElemento) selected @endif>{{$umElemento}}</option>
                        @endforeach
                    @else
                        @foreach($vetorLinguagens as $umElemento)
                            <option @if("pt" == $umElemento) selected @endif>{{$umElemento}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="mb-3">
                <label for="texto_original" class="form-label">Texto Original</label>
                <textarea class="form-control" rows="10" cols="50" name="texto_original">{{$textooriginal ?? ''}}</textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="linguagem_destino" class="form-label">Destino</label>
                <select class="form-select" name="linguagem_destino">
                    @if(isset($lingua_destino))
                        @foreach($vetorLinguagens as $umElemento)
                            <option @if($lingua_destino == $umElemento) selected @endif>{{$umElemento}}</option>
                        @endforeach
                    @else
                        @foreach($vetorLinguagens as $umElemento)
                            <option @if("en" == $umElemento) selected @endif>{{$umElemento}}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="mb-3">
                <label for="texto_traduzido" class="form-label">Texto Destino</label>
                <textarea class="form-control" rows="10" cols="50" name="texto_traduzido">{{$textotraduzido ?? ''}}</textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <button class="btn btn-primary btn-lg" type="submit">Traduzir</button>
        </div>
    </div>
        </form>    
      </div>
    </div>

  <!-- FOOTER -->
  <footer class="container">
    <p></p>
  </footer>
</main>


    <script src="/js/bootstrap.min.js"></script>

      
  </body>
</html>
