<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Administrador - Telecare</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Inria+Sans:wght@400;700&display=swap">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <style>
    :root {
      --body-size-medium: 16px;
      --space-300: 15px;
    }
    body {
      font-family: 'Inter', sans-serif;
    }
    .font-inria {
      font-family: 'Inria Sans', sans-serif;
    }
  </style>
</head>
<body class="bg-[#eef7ff] text-black">

  <div class="flex flex-col xl:flex-row min-h-screen mx-auto max-w-[1600px]">
    
    <!-- SIDEBAR -->
    <aside class="w-full xl:w-[300px] bg-[#eef7ff] shadow-lg flex flex-col p-6 shrink-0 xl:sticky xl:top-0 xl:h-screen">
      <!-- Logo -->
      <a href="#" class="flex justify-center mb-10">
        <img src="{{ asset('img/Logotipo.png') }}" alt="Logotipo Telecare">
      </a>

      <!-- Navegação -->
      <nav class="flex flex-col gap-3 mb-10">
        <a href="#" class="h-[50px] flex justify-center items-center rounded-[15px] bg-[#95b8a0] text-white text-[20px] font-semibold transition hover:opacity-90">Início</a>
        <a href="#" class="h-[50px] flex justify-center items-center rounded-[15px] bg-white text-black text-[20px] transition hover:bg-gray-50">Agenda</a>
        <a href="#" class="h-[50px] flex justify-center items-center rounded-[15px] bg-white text-black text-[20px] transition hover:bg-gray-50">Pacientes</a>
        <a href="#" class="h-[50px] flex justify-center items-center rounded-[15px] bg-white text-black text-[20px] transition hover:bg-gray-50">Profissionais</a>
        <a href="#" class="h-[50px] flex justify-center items-center rounded-[15px] bg-white text-black text-[20px] transition hover:bg-gray-50">Configurações</a>
      </nav>

      <div class="mt-auto"></div> <!-- Espaçador para jogar o perfil para baixo -->

      <!-- Perfil do Doutor -->
      <div class="flex items-center gap-4 mb-6">
        <img class="w-[74px] h-[74px] rounded-full object-cover bg-gray-200" src="data:image/png;base64,…(icon-doctor.png)" alt="Icon Doctor">
        <div>
          <p class="text-[20px] font-normal leading-tight">Admin<br>Dr. José Zé de Zezé</p>
          <p class="text-[var(--body-size-medium)] text-gray-700 mt-1">CRM: 707530</p>
        </div>
      </div>

      <!-- Sair -->
      <a href="#" class="flex items-center gap-3 text-[var(--body-size-medium)] text-black hover:text-red-600 transition">
        <img class="w-[30px] h-[30px]" src="data:image/svg+xml;base64,…(log-out.svg)" alt="Log out">
        <span>Sair do Sistema</span>
      </a>
    </aside>

    <!-- CONTEÚDO PRINCIPAL -->
    <main class="flex-1 p-6 xl:p-10 flex flex-col gap-8 w-full overflow-hidden">
      
      <!-- CARDS DO TOPO -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card 1 -->
        <div class="bg-[#bef0d7] rounded-[15px] border-l-[14px] border-[#81a392] shadow-md p-6 flex flex-col justify-between h-[170px]">
          <div class="flex justify-between items-start">
            <div>
              <p class="font-inria text-[22px] text-black">Pacientes Hoje:</p>
              <p class="font-inria text-[48px] font-bold tracking-tight mt-2">07</p>
            </div>
            <img class="w-10 h-10 mt-2" src="data:image/svg+xml;base64,…(users.svg)" alt="Users">
          </div>
          <div class="flex items-center gap-2 mt-auto border-t border-[#81a392]/30 pt-2">
            <a href="#" class="font-inria text-[22px] text-[#81a392] hover:underline">Acessar Agenda</a>
            <img class="w-6 h-6" src="data:image/svg+xml;base64,…(chevron-right.svg)" alt="Seta">
          </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-[15px] border-l-[14px] border-[#519ebc] shadow-md p-6 flex flex-col justify-between h-[170px]">
          <div class="flex justify-between items-start">
            <div>
              <p class="font-inria text-[22px] text-black">Consultas Concluídas:</p>
              <p class="font-inria text-[48px] font-bold tracking-tight mt-2">02</p>
            </div>
            <img class="w-10 h-10 mt-2" src="data:image/svg+xml;base64,…(check-circle.svg)" alt="Check">
          </div>
          <div class="flex items-center gap-2 mt-auto border-t border-gray-200 pt-2">
            <a href="#" class="font-inria text-[22px] text-[#519ebc] hover:underline">Ver Lista</a>
            <img class="w-6 h-6" src="data:image/svg+xml;base64,…(chevron-right.svg)" alt="Seta">
          </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-[#f6e8b7] rounded-[15px] border-l-[14px] border-[#eab946] shadow-md p-6 flex flex-col justify-between h-[170px]">
          <div class="flex justify-between items-start">
            <div>
              <p class="font-inria text-[22px] text-black">Próximo Horário Vago:</p>
              <p class="font-inria text-[48px] font-bold tracking-tight mt-2">17:00</p>
            </div>
            <img class="w-10 h-10 mt-2" src="data:image/svg+xml;base64,…(clock.svg)" alt="Clock">
          </div>
          <div class="flex items-center gap-2 mt-auto border-t border-[#eab946]/30 pt-2">
            <a href="#" class="font-inria text-[22px] text-black/60 hover:underline">Ver Horários</a>
            <img class="w-6 h-6" src="data:image/svg+xml;base64,…(chevron-right.svg)" alt="Seta">
          </div>
        </div>
      </div>

      <!-- SEÇÃO INFERIOR: PRÓXIMO ATENDIMENTO E AGENDA -->
      <div class="flex flex-col lg:flex-row gap-6">
        
        <!-- AGENDA DO DIA (Ocupa mais espaço) -->
        <div class="bg-white rounded-[15px] shadow-md p-6 lg:flex-[2] flex flex-col">
          <!-- Header da Agenda -->
          <div class="flex justify-between items-center mb-6">
            <h2 class="font-inria text-[30px] text-black">Agenda do Dia</h2>
            <a href="#" class="flex items-center gap-1 font-inria text-[16px] text-black hover:underline">
              Acessar Agenda
              <img class="w-4 h-4" src="data:image/svg+xml;base64,…(chevron-right.svg)" alt="Seta">
            </a>
          </div>

          <!-- Tabela de Agenda Responsiva -->
          <div class="overflow-x-auto">
            <table class="w-full min-w-[500px] font-inria text-left border-collapse">
              <thead>
                <tr class="text-[20px] text-black border-b border-gray-200">
                  <th class="py-3 font-bold w-[80px]">Hora</th>
                  <th class="py-3 font-bold">Paciente</th>
                  <th class="py-3 font-bold">Tipo de Consulta</th>
                  <th class="py-3 font-bold text-center w-[130px]">Status</th>
                </tr>
              </thead>
              <tbody class="text-[18px]">
                <tr class="border-b border-gray-100">
                  <td class="py-3">09:00</td>
                  <td class="py-3">Pedro Silva</td>
                  <td class="py-3">Consulta</td>
                  <td class="py-3"><div class="bg-[#88b39f] text-white rounded-full py-1 text-center font-bold">OK</div></td>
                </tr>
                <tr class="border-b border-gray-100">
                  <td class="py-3">10:00</td>
                  <td class="py-3">Joana Guedes</td>
                  <td class="py-3">Retorno</td>
                  <td class="py-3"><div class="bg-[#88b39f] text-white rounded-full py-1 text-center font-bold">OK</div></td>
                </tr>
                <tr class="border-b border-gray-100">
                  <td class="py-3">11:00</td>
                  <td class="py-3">Leonardo Alves</td>
                  <td class="py-3">Consulta</td>
                  <td class="py-3"><div class="bg-red-500/80 text-white rounded-full py-1 text-center font-bold">Cancelado</div></td>
                </tr>
                <tr class="border-b border-gray-100">
                  <td class="py-3">12:00</td>
                  <td class="py-3 font-bold">Ingrid Bonfim</td> <!-- Destacado pois é a próxima -->
                  <td class="py-3">Consulta</td>
                  <td class="py-3"><div class="bg-[#519ebc] text-white rounded-full py-1 text-center font-bold">Confirmado</div></td>
                </tr>
                <tr class="border-b border-gray-100">
                  <td class="py-3">14:00</td>
                  <td class="py-3">Paulo Tomiazzi</td>
                  <td class="py-3">Retorno</td>
                  <td class="py-3"><div class="bg-yellow-300/80 text-black rounded-full py-1 text-center font-bold">Pendente</div></td>
                </tr>
                <tr class="border-b border-gray-100">
                  <td class="py-3">15:00</td>
                  <td class="py-3">Bruna Martins</td>
                  <td class="py-3">Consulta</td>
                  <td class="py-3"><div class="bg-[#519ebc] text-white rounded-full py-1 text-center font-bold">Confirmado</div></td>
                </tr>
                <tr class="border-b border-gray-100">
                  <td class="py-3">16:00</td>
                  <td class="py-3">Otávio Neves</td>
                  <td class="py-3">-</td>
                  <td class="py-3"><div class="bg-[#519ebc] text-white rounded-full py-1 text-center font-bold">Confirmado</div></td>
                </tr>
                <tr>
                  <td class="py-3">17:00</td>
                  <td class="py-3">Livre</td>
                  <td class="py-3">Consulta</td>
                  <td class="py-3"><a href="#" class="block bg-[#2fb568] text-white rounded-full py-1 text-center font-bold hover:bg-green-600 transition">Agendar</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- PRÓXIMO ATENDIMENTO (Barra lateral direita) -->
        <div class="bg-white rounded-[15px] shadow-md p-6 lg:flex-[1] flex flex-col items-center max-w-full lg:max-w-[320px] mx-auto w-full">
          <h2 class="font-inria text-[26px] text-black text-center mb-6 uppercase">Próximo Atendimento</h2>
          
          <div class="relative mb-4">
            <img class="w-[122px] h-[122px] rounded-full object-cover shadow-sm bg-gray-100" src="data:image/jpeg;base64,…(unnamed-1.jpg)" alt="Foto da Paciente">
            <!-- Indicador Online/Status -->
            <div class="absolute bottom-1 right-3 w-[22px] h-[22px] bg-[#41d112] border-2 border-white rounded-full"></div>
          </div>

          <h3 class="font-inria text-[24px] font-bold text-black text-center">Ingrid Bonfim</h3>
          
          <div class="bg-[#6edff6] text-black font-inria font-bold text-[16px] px-6 py-1 rounded-full mt-2 mb-4">
            Consulta
          </div>

          <p class="font-inria text-[18px] text-black mb-4">12:00 - 12:45</p>

          <div class="w-full border-t border-gray-200 my-2"></div>

          <p class="font-inria text-[18px] text-gray-700 text-center my-4">
            Motivo: Paciente com dores articulares e mal-estar
          </p>

          <a href="#" class="mt-auto w-full max-w-[230px] bg-[#0b9095] hover:bg-teal-700 transition-colors text-white font-inria font-bold text-[20px] rounded-full py-3 text-center uppercase tracking-wide">
            Iniciar Agora
          </a>
        </div>

      </div>
    </main>
  </div>
</body>
</html>