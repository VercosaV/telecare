<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dados do Paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Dados do Paciente</h1>

        <div class="mb-3">
            <label for="nome" class="form-label">nome do paciente</label>
            <input type="text" id="nome" name="nome" class="form-control" disabled
                value="{{ $pacientes->nome }}">
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">cpf do paciente</label>
            <input type="text" id="cpf" name="cpf" class="form-control" disabled
                value="{{ $pacientes->cpf }}">
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">telefone do paciente</label>
            <input type="text" id="telefone" name="telefone" class="form-control" disabled
                value="{{ $pacientes->telefone }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">email do paciente</label>
            <input type="email" id="email" name="email" class="form-control" disabled
                value="{{ $pacientes->email }}">
        </div>
        <div class="alert alert-danger">
            <a href="/pacientes" class="btn btn-secondary">Voltar</a>
            <p>Deseja excluir esse registro ?</p>
            <form method="post" action='/pacientes/{{ $pacientes->id }}'>
                @CSRF
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
        </script>
    </div>
</body>

</html>
