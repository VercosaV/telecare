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
        <h1>Editar Prontuário</h1>


        <form method="post" action='/prontuarios/{{ $prontuarios->id }}'>
            @CSRF
            @method('PUT')

            <div class="mb-3">
                <label for="data_registro" class="form-label">Data de Registro</label>
                <input type="date" id="data_registro" name="data_registro" class="form-control" required="">
            </div>

            <div class="mb-3">
                <label for="diagnostico" class="form-label">Diagnóstico</label>
                <input type="text" id="diagnostico" name="diagnostico" class="form-control" required
                    value="{{ $prontuarios->diagnostico }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Paciente</label>
                <input type="text" class="form-control" disabled value="{{ $pacientes->nome }}">


                <input type="hidden" name="paciente_id" value="{{ $pacientes->id }}">
            </div>
            <a href="/prontuarios" class="btn btn-secondary">Voltar</a>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>


    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
</body>

</html>
