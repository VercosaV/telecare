<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Prontuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Dados do Prontuário</h1>
        <div class="mb-3">
            <p><strong>Data de Registro:</strong> {{ $prontuario->data_registro }}</p>
        </div>
        <div class="mb-3">
            <p><strong>Diagnóstico:</strong> {{ $prontuario->diagnostico }}</p>
        </div>
        <div class="mb-3">
            <p><strong>Paciente:</strong> {{ $prontuario->paciente->nome }}</p>
        </div>
        <div class="alert alert-danger" >
            <p class="text-danger">Deseja Excluir ?</p>
            <a href="/prontuarios" class="btn btn-secondary">Voltar</a>
            <form method="post" action="/prontuarios/{{ $prontuario->id }}">
                @CSRF
                @method('delete')
                <button class="btn btn-danger" style="margin-top:4px;" type="submit">Excluir</button>
            </form>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
</body>

</html>
