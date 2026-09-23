<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consultar Profissional</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">

        <h1>Dados do Profissional</h1>

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" id="nome" class="form-control" disabled
                value="{{ $profissionais->nome }}">
        </div>

        <div class="mb-3">
            <label for="tipo_profissional" class="form-label">Tipo do Profissional</label>
            <input type="text" id="tipo_profissional" class="form-control" disabled
                value="{{ $profissionais->tipo_profissional === 'medico' ? 'Médico' : 'Secretária' }}">
        </div>

        <div class="mb-3">
            <label for="especialidade" class="form-label">Especialidade</label>
            <input type="text" id="especialidade" class="form-control" disabled
                value="{{ $profissionais->especialidade ? $profissionais->especialidade->nome : 'N/A' }}">
        </div>

        <div class="mb-3">
            <label for="crm" class="form-label">CRM</label>
            <input type="text" id="crm" class="form-control" disabled
                value="{{ $profissionais->crm ? $profissionais->crm : 'N/A' }}">
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" id="telefone" class="form-control" disabled
                value="{{ $profissionais->telefone }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" class="form-control" disabled
                value="{{ $profissionais->email }}">
        </div>

        <div class="alert alert-danger mt-4">
            <p class="text-danger">Deseja Excluir?</p>
            <a href="/profissionais" class="btn btn-secondary">Voltar</a>
            <form method="post" action="/profissionais/{{ $profissionais->id }}" class="d-inline">
                @CSRF
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Excluir</button>
            </form>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
</body>

</html>