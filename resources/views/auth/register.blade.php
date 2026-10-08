<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Nova Conta - TeleCare</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">

    <!-- Importação do Tailwind CSS via Vite -->
    @vite(['resources/css/app.css'])
</head>

<body class="bg-[#eef7ff] font-['Inter',_sans-serif] m-0 p-0 overflow-hidden">

    <!-- Container Principal Flexbox -->
    <div class="flex w-full h-screen">

        <!-- Lado Esquerdo: Banner fixo -->
        <div class="hidden md:block md:w-[55%] h-full relative bg-[#95b8a0]">
            <img class="absolute inset-0 w-full h-full object-cover" src="{{ asset('images/auth/banner.png') }}"
                alt="Banner TeleCare">
        </div>

        <!-- Lado Direito: Formulário com scroll independente -->
        <div class="w-full md:w-[45%] h-full overflow-y-auto">

            <div class="min-h-full flex flex-col justify-center items-center p-4 sm:p-8 md:p-12">
                <!-- Cartão Branco -->
                <div
                    class="w-full max-w-[430px] bg-white rounded-lg border border-gray-300 p-6 sm:px-10 sm:py-8 shadow-sm flex flex-col gap-5">

                    <!-- Logotipo e Título -->
                    <div class="flex flex-col items-center gap-2">
                        <img class="h-[90px] w-auto object-contain" src="{{ asset('images/auth/logotipo.png') }}"
                            alt="Logotipo TeleCare">
                        <h2 class="text-[22px] font-bold text-[#098e98]">Criar Nova Conta</h2>
                    </div>

                    <form class="flex flex-col gap-4">

                        <!-- Campo Nome Completo -->
                        <div class="flex flex-col gap-1">
                            <label class="text-[14px] text-[#1e1e1e]">Nome Completo</label>
                            <div class="relative flex items-center">
                                <img class="absolute left-3 w-5 h-5 opacity-50"
                                    src="{{ asset('images/auth/people.svg') }}" alt="Ícone Pessoa">
                                <input
                                    class="w-full h-10 pl-10 pr-3.5 py-2 rounded-lg border border-gray-300 bg-white text-gray-500 placeholder-gray-400 focus:outline-none focus:border-[#098e98] focus:ring-1 focus:ring-[#098e98]"
                                    type="text" placeholder="Digite seu Nome Completo">
                            </div>
                        </div>

                        <!-- Campo CPF -->
                        <div class="flex flex-col gap-1">
                            <label class="text-[14px] text-[#1e1e1e]">CPF</label>
                            <div class="relative flex items-center">
                                <img class="absolute left-3 w-5 h-5 opacity-50"
                                    src="{{ asset('images/auth/people.svg') }}" alt="Ícone Pessoa">
                                <input
                                    class="w-full h-10 pl-10 pr-3.5 py-2 rounded-lg border border-gray-300 bg-white text-gray-500 placeholder-gray-400 focus:outline-none focus:border-[#098e98] focus:ring-1 focus:ring-[#098e98]"
                                    type="text" placeholder="Digite seu CPF">
                            </div>
                        </div>

                        <!-- Campo Email -->
                        <div class="flex flex-col gap-1">
                            <label class="text-[14px] text-[#1e1e1e]">Email</label>
                            <div class="relative flex items-center">
                                <img class="absolute left-3 w-5 h-5 opacity-50"
                                    src="{{ asset('images/auth/people.svg') }}" alt="Ícone Email">
                                <input
                                    class="w-full h-10 pl-10 pr-3.5 py-2 rounded-lg border border-gray-300 bg-white text-gray-500 placeholder-gray-400 focus:outline-none focus:border-[#098e98] focus:ring-1 focus:ring-[#098e98]"
                                    type="email" placeholder="Digite seu email">
                            </div>
                        </div>

                        <!-- Campo Senha -->
                        <div class="flex flex-col gap-1">
                            <label class="text-[14px] text-[#1e1e1e]">Senha</label>
                            <div class="relative flex items-center">
                                <img class="absolute left-3 w-5 h-5 opacity-50"
                                    src="{{ asset('images/auth/cadeado.svg') }}" alt="Ícone Cadeado">
                                <input
                                    class="w-full h-10 pl-10 pr-10 py-2 rounded-lg border border-gray-300 bg-white text-gray-500 placeholder-gray-400 focus:outline-none focus:border-[#098e98] focus:ring-1 focus:ring-[#098e98]"
                                    type="password" placeholder="Digite sua senha">
                                <img class="absolute right-3 w-5 h-5 cursor-pointer opacity-50 hover:opacity-100 transition-opacity"
                                    src="{{ asset('images/auth/olhocego.svg') }}" alt="Ocultar Senha">
                            </div>
                        </div>

                        <!-- Campo Repita sua Senha -->
                        <div class="flex flex-col gap-1">
                            <label class="text-[14px] text-[#1e1e1e]">Repita sua Senha</label>
                            <div class="relative flex items-center">
                                <img class="absolute left-3 w-5 h-5 opacity-50"
                                    src="{{ asset('images/auth/cadeado.svg') }}" alt="Ícone Cadeado">
                                <input
                                    class="w-full h-10 pl-10 pr-10 py-2 rounded-lg border border-gray-300 bg-white text-gray-500 placeholder-gray-400 focus:outline-none focus:border-[#098e98] focus:ring-1 focus:ring-[#098e98]"
                                    type="password" placeholder="Digite sua senha">
                                <img class="absolute right-3 w-5 h-5 cursor-pointer opacity-50 hover:opacity-100 transition-opacity"
                                    src="{{ asset('images/auth/olhocego.svg') }}" alt="Ocultar Senha">
                            </div>
                        </div>

                        <!-- Botão Criar Conta -->
                        <button type="submit"
                            class="w-full h-[45px] mt-2 rounded-full bg-[#098e98] hover:bg-[#066a72] transition-colors flex justify-center items-center">
                            <span class="text-[18px] font-bold text-white">CRIAR CONTA</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
