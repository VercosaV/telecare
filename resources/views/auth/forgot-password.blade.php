<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha - TeleCare</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap">

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

        <!-- Lado Direito: Formulário com scroll independente -->
        <div class="w-full md:w-[45%] h-full overflow-y-auto">

            <div class="min-h-full flex flex-col justify-center items-center p-4 sm:p-8 md:p-12">
                <div
                    class="w-full max-w-[430px] bg-white rounded-lg border border-gray-300 p-8 sm:px-10 sm:py-10 shadow-sm flex flex-col gap-6">

                    <div class="flex flex-col items-center gap-4 text-center">
                        <img class="h-[100px] w-auto object-contain" src="{{ asset('images/auth/logotipo.png') }}"
                            alt="Logotipo TeleCare">

                        <h2 class="text-[28px] font-bold text-[#0c7b85] mt-2 leading-none">
                            Esqueceu sua senha?
                        </h2>

                        <p class="text-[14px] font-medium text-black leading-tight px-2">
                            Digite o e-mail associado à sua conta e enviaremos as instruções para recuperação da sua
                            senha
                        </p>
                    </div>

                    <form class="flex flex-col gap-5 mt-2">
                        <!-- Email -->
                        <div class="flex flex-col gap-1">
                            <label class="text-[14px] text-[#1e1e1e]">Email</label>
                            <div class="relative flex items-center">
                                <img class="absolute left-3 w-5 h-5 opacity-50"
                                    src="{{ asset('images/auth/people.svg') }}" alt="Ícone Email">
                                <input
                                    class="w-full h-10 pl-10 pr-3.5 py-2 rounded-lg border border-gray-300 bg-white text-gray-500 placeholder-gray-400 focus:outline-none focus:border-[#95b8a0] focus:ring-1 focus:ring-[#95b8a0]"
                                    type="email" placeholder="Digite seu email">
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full h-[45px] mt-2 rounded-full bg-[#95b8a0] hover:bg-[#7a9984] transition-colors flex justify-center items-center shadow-sm">
                            <span class="text-[18px] font-bold text-white">ENVIAR LINK</span>
                        </button>

                        <a href="/login"
                            class="flex justify-center items-center gap-2 mt-4 hover:opacity-80 transition-opacity">
                            <img class="w-[25px] h-[25px]" src="{{ asset('images/auth/setaVoltar.svg') }}"
                                alt="Seta Voltar">
                            <span class="text-[18px] font-bold text-[#0c7b85]">Voltar para o Login</span>
                        </a>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
