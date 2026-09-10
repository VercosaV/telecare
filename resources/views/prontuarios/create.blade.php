<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Novo Prontuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Novo Prontuário</h1>
        <form method="post" action='/prontuarios'>
            @CSRF
            <div class="mb-3">
                <label for="data_registro" class="form-label">Data de Registro</label>
                <input type="date" id="data_registro" name="data_registro" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="diagnostico" class="form-label">Diagnóstico</label>
                <input type="text" id="diagnostico" name="diagnostico" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="paciente_id" class="form-label">Paciente</label>
                <select id="paciente_id" name="paciente_id" class="form-select" required="">
                    @foreach ($pacientes as $p)
                        <option value="{{ $p->id }}">{{ $p->nome }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
</body>

</html>
