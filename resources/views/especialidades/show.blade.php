<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dados da Especialidade</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Dados da Especialidade</h1>

        <div class="mb-3">
            <label for="nome" class="form-label">Especialidade</label>
            <input type="text" id="nome" name="nome" class="form-control" disabled
                value="{{ $especialidades->nome }}">
        </div>


        <div class="alert alert-danger">

            <p class="text-danger">Deseja excluir esse registro ?</p>
            <a href="/especialidades" class="btn btn-secondary">Voltar</a>

            <form method="post" action='/especialidades/{{ $especialidades->id }}'>
                @CSRF
                @method('DELETE')

                <button type="submit" class="btn btn-danger" style="margin-top:4px;">Excluir</button>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
        </script>
    </div>
</body>

</html>
