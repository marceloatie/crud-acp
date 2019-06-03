<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand" href="{{ url('/') }}">
                Cursei Express
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            &nbsp;

            <ul class="nav navbar-nav">
              <li><a href="{{ url('/professor') }}">Professores</a></li>
              <li><a href="{{ url('/curso') }}">Cursos</a></li>
              <li><a href="{{ url('/aluno') }}">Alunos</a></li>
              <li><a href="{{ url('/relatorio') }}">Relatório</a></li>
            </ul>
        </div>
    </div>
</nav>