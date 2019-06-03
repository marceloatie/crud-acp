<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Título Opcional</title>
 
        <!--Custon CSS (está em /public/assets/site/css/certificate.css)-->
        <link rel="stylesheet" href="{{ url('assets/site/css/certificate.css') }}">
    </head>
    <body>

        <style type="CSS">
            table {
                width: 100%;
                border-collapse: collapse;
            }
                  
            table, th, td {
                border: 1px solid black;
                text-align: center;
            }
        </style>

    <table>
        <caption><h1>Alunos</h1></caption>
            <thead>
                <tr>
                    <th scope="col">Aluno</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Professor</th>
                </tr>
            </thead>

            <tbody>
                    
            @forelse($alunos as $aluno)
                <tr>
                    <th scope="row">{{ $aluno->nome }}</th>
                    <td>{{ ($aluno->curso != null) ? $aluno->curso->nome : '-' }}</td>
                    <td>{{ ($aluno->curso != null && $aluno->curso->professor != null) ? $aluno->curso->professor->nome : '-' }}</td>
                </tr>
            @empty
                <tr>
                    <th scope="row" colspan="3">Nenhum aluno cadastrado.</th>
                </tr>
            @endforelse

            </tbody>
    </table>

    </body>
</html>