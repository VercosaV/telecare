<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Login Administrador</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">

    <!-- Importação do CSS através do Vite -->
    @vite(['resources/css/app.css'])

</head>

<body class="bg-[#eef7ff] font-['Inter',_sans-serif] m-0 p-0 overflow-hidden">

    <!-- Container Principal com altura fixa da tela -->
    <div class="flex w-full h-screen">

        <!-- Lado Esquerdo: Banner fixo -->
        <div class="hidden md:block md:w-[55%] h-full relative bg-[#95b8a0]">
            <img class="absolute inset-0 w-full h-full object-cover" src="{{ asset('images/auth/banner.png') }}"
                alt="Banner TeleCare">
        </div>

        <!-- Lado Direito: Área do Formulário com scroll independente -->
        <div class="w-full md:w-[45%] h-full overflow-y-auto">

            <div class="min-h-full flex flex-col justify-center items-center p-4 sm:p-8 md:p-12">
                <!-- Cartão Branco Central -->
                <div
                    class="w-full max-w-[430px] bg-white rounded-lg border border-gray-300 p-8 sm:px-10 sm:py-10 shadow-sm flex flex-col gap-8">

                    <!-- Logotipo -->
                    <div class="flex justify-center">
                        <img class="h-[120px] w-auto object-contain" src="{{ asset('images/auth/logotipo.png') }}"
                            alt="Logotipo TeleCare">
                    </div>

                    <form class="flex flex-col gap-5">
                        <!-- Campo Email -->
                        <div class="flex flex-col gap-1">
                            <label class="text-[14px] text-[#1e1e1e]">Email</label>
                            <input
                                class="w-full h-10 px-3.5 py-2 rounded-lg border border-gray-300 bg-white text-gray-500 placeholder-gray-400 focus:outline-none focus:border-[#95b8a0] focus:ring-1 focus:ring-[#95b8a0]"
                                type="email" placeholder="Digite seu email">
                        </div>

                        <!-- Campo Senha -->
                        <div class="flex flex-col gap-1 relative">
                            <label class="text-[14px] text-[#1e1e1e]">Senha</label>
                            <div class="relative flex items-center">
                                <input
                                    class="w-full h-10 pl-3.5 pr-10 py-2 rounded-lg border border-gray-300 bg-white text-gray-500 placeholder-gray-400 focus:outline-none focus:border-[#95b8a0] focus:ring-1 focus:ring-[#95b8a0]"
                                    type="password" placeholder="Digite sua senha">

                                <!-- Ícone do olho -->
                                <img class="absolute right-3 w-5 h-5 cursor-pointer opacity-50 hover:opacity-100 transition-opacity"
                                    src="{{ asset('images/auth/olhocego.svg') }}" alt="Mostrar/Ocultar Senha">
                            </div>
                        </div>

                        <!-- Rodapé do formulário: Lembrar-me e Link -->
                        <div class="flex items-center justify-between mt-1">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox"
                                    class="w-4 h-4 rounded border-gray-300 text-[#95b8a0] focus:ring-[#95b8a0]">
                                <span class="text-[14px] text-[#1e1e1e]">Lembrar-me</span>
                            </label>
                            <a href="forgot-password"
                                class="text-[14px] underline text-[#098e98] hover:text-[#066a72] transition-colors">Esqueci
                                minha senha</a>
                        </div>

                        <!-- Botão Entrar -->
                        <button type="submit"
                            class="w-full h-[45px] mt-4 rounded-full bg-[#95b8a0] hover:bg-[#7a9984] transition-colors flex justify-center items-center shadow-sm">
                            <span class="text-[20px] font-bold text-white">ENTRAR</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
