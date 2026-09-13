<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Novo Cadastro - TeleCare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Novo Cadastro</h1>
        <form method="post" action='/profissionais'>
            @csrf
            
            <div class="mb-3">
                <label for="tipo_profissional" class="form-label">Tipo de Cadastro</label>
                <select id="tipo_profissional" name="tipo_profissional" class="form-select" required onchange="controlarCampos()">
                    <option value="" disabled selected>Selecione...</option>
                    <option value="medico">Médico</option>
                    <option value="secretaria">Secretária</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="nome" class="form-label">Informe o Nome do Profissional</label>
                <input type="text" id="nome" name="nome" class="form-control" required>
            </div>
            
                        <div class="mb-3" id="div_cpf">
                <label for="cpf" class="form-label">Informe o CPF do Profissional</label>
                <input type="text" id="cpf" name="cpf" class="form-control">
            </div>
            
            <div class="mb-3" id="div_crm">
                <label for="crm" class="form-label">Informe o CRM</label>
                <input type="text" id="crm" name="crm" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="telefone" class="form-label">Informe o Telefone</label>
                <input type="text" id="telefone" name="telefone" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Informe o Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="especialidade_id" class="form-label">Informe a Especialidade</label>
                <select id="especialidade_id" name="especialidade_id" class="form-select" required disabled>
                    <option value="" disabled selected>Selecione a especialidade...</option>
                    @foreach ($especialidades as $especialidade)
                        <option value="{{ $especialidade->id }}">{{ $especialidade->nome }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function controlarCampos() {
            const tipo = document.getElementById('tipo_profissional').value;
            const campoEspecialidade = document.getElementById('especialidade_id');
            const inputCrm = document.getElementById('crm');
            const divCrm = document.getElementById('div_crm');

            if (tipo === 'medico') {
                campoEspecialidade.disabled = false;
                divCrm.style.display = 'block';
                inputCrm.required = true;
                inputCrm.disabled = false;
            } else if (tipo === 'secretaria') {
                campoEspecialidade.disabled = true;
                campoEspecialidade.value = ""; 
                inputCrm.disabled = true;
                inputCrm.value = "";
            }
        }
        
        window.onload = controlarCampos;
    </script>
</body>

</html>