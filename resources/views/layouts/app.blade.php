<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TeleCare')</title>

    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    
    <!-- Fontes Globais -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Inria+Sans:wght@400;700&display=swap">

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

    <!-- Vite / Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- CSS Injetado da View Filha -->
    @stack('styles')
</head>

<body class="bg-[#eef7ff] text-black">

    <div class="flex flex-col xl:flex-row min-h-screen mx-auto max-w-[1600px]">

        <!-- SIDEBAR FIXA -->
        <aside
            class="w-full xl:w-[300px] bg-[#eef7ff] shadow-lg flex flex-col p-6 shrink-0 xl:sticky xl:top-0 xl:h-screen">
            <!-- Logo -->
            <a href="{{ url('/dashboard') }}" class="flex justify-center mb-10">
                <img src="{{ asset('images/dash/logotipo.png') }}"
                    onerror="this.src='https://placehold.co/215x166?text=Logo+TeleCare'" alt="Logotipo Telecare">
            </a>

            <!-- Navegação -->
            <nav class="flex flex-col gap-3 mb-10">
                <a href="{{ url('/dashboard') }}"
                    class="h-[50px] flex justify-center items-center rounded-[15px] text-[20px] transition-all duration-200 {{ request()->is('dashboard') ? 'bg-[#098e98] text-white font-semibold' : 'bg-white text-black font-normal hover:bg-[#098e98] hover:text-white hover:font-semibold' }}">Início</a>

                <a href="{{ route('agenda.index') }}"
                    class="h-[50px] flex justify-center items-center rounded-[15px] text-[20px] transition-all duration-200 {{ request()->is('agenda') ? 'bg-[#098e98] text-white font-semibold' : 'bg-white text-black font-normal hover:bg-[#098e98] hover:text-white hover:font-semibold' }}">Agenda</a>

                <a href="{{ route('pacientes.index') }}"
                    class="h-[50px] flex justify-center items-center rounded-[15px] text-[20px] transition-all duration-200 {{ request()->is('pacientes*') ? 'bg-[#098e98] text-white font-semibold' : 'bg-white text-black font-normal hover:bg-[#098e98] hover:text-white hover:font-semibold' }}">Pacientes</a>

                <a href="#"
                    class="h-[50px] flex justify-center items-center rounded-[15px] text-[20px] transition-all duration-200 {{ request()->is('profissionais*') ? 'bg-[#098e98] text-white font-semibold' : 'bg-white text-black font-normal hover:bg-[#098e98] hover:text-white hover:font-semibold' }}">Profissionais</a>

                <a href="#"
                    class="h-[50px] flex justify-center items-center rounded-[15px] text-[20px] transition-all duration-200 {{ request()->is('configuracoes*') ? 'bg-[#098e98] text-white font-semibold' : 'bg-white text-black font-normal hover:bg-[#098e98] hover:text-white hover:font-semibold' }}">Configurações</a>
            </nav>

            <div class="mt-auto"></div>

            <!-- Perfil -->
            <div class="flex items-center gap-4 mb-6">
                <!-- Se houver uma coluna 'foto' no banco, você pode puxar dinamicamente, caso contrário, mantemos a padrão -->
                <img class="w-[74px] h-[74px] rounded-full object-cover bg-gray-200"
                    src="{{ asset('images/paciente/medico.png') }}" 
                    onerror="this.src='https://placehold.co/74x74'"
                    alt="Icon Doctor">
                <div>
                    <!-- Puxa o nome do usuário logado -->
                    <p class="text-[20px] font-normal leading-tight">Admin<br>{{ auth()->user()->nome ?? auth()->user()->name }}</p>
                    
                    <!-- Puxa o CRM (se você tiver essa coluna no banco de dados) -->
                    <p class="text-[var(--body-size-medium)] text-gray-700 mt-1">CRM: {{ auth()->user()->crm ?? '000000' }}</p>
                </div>
            </div>

            <!-- Sair -->
            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit"
                    class="flex items-center gap-3 text-[var(--body-size-medium)] text-black hover:text-red-600 transition w-full text-left bg-transparent border-none p-0 cursor-pointer">
                    <img class="w-[30px] h-[30px]" src="{{ asset('images/paciente/Log out.svg') }}"
                        onerror="this.style.display='none'" alt="Log out">
                    <span>Sair do Sistema</span>
                </button>
            </form>
        </aside>

        <!-- ÁREA PRINCIPAL -->
        <main class="flex-1 p-6 xl:p-10 flex flex-col gap-8 w-full overflow-hidden">
            @yield('content')
        </main>

    </div>

</body>

</html>
