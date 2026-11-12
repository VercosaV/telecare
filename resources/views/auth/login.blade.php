<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - TeleCare</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

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
                    class="w-full max-w-[430px] bg-white rounded-lg border border-gray-300 p-8 sm:px-10 sm:py-10 shadow-sm flex flex-col gap-6">

                    <!-- Logotipo -->
                    <div class="flex justify-center">
                        <img class="h-[200px] w-auto object-contain" src="{{ asset('images/dash/logotipo.png') }}"
                            alt="Logotipo TeleCare">
                    </div>

                    <!-- Mensagens de Erro de Validação/Autenticação -->
                    @if ($errors->any())
                        <div class="p-3 text-sm text-red-700 bg-red-100 rounded-lg">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Mensagem de status (ex: reset de senha enviado) -->
                    @if (session('status'))
                        <div class="p-3 text-sm text-green-700 bg-green-100 rounded-lg">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-5">
                        @csrf

                        <!-- Campo Email -->
                        <div class="flex flex-col gap-1">
                            <label class="text-[14px] text-[#1e1e1e]">Email</label>
                            <input
                                class="w-full h-10 px-3.5 py-2 rounded-lg border border-gray-300 bg-white text-gray-500 placeholder-gray-400 focus:outline-none focus:border-[#95b8a0] focus:ring-1 focus:ring-[#95b8a0]"
                                type="email" name="email" value="{{ old('email') }}" placeholder="Digite seu email" required autofocus>
                        </div>

                        <!-- Campo Senha -->
                        <div class="flex flex-col gap-1 relative">
                            <label class="text-[14px] text-[#1e1e1e]">Senha</label>
                            <div class="relative flex items-center">
                                <input
                                    class="w-full h-10 pl-3.5 pr-10 py-2 rounded-lg border border-gray-300 bg-white text-gray-500 placeholder-gray-400 focus:outline-none focus:border-[#95b8a0] focus:ring-1 focus:ring-[#95b8a0]"
                                    type="password" name="password" placeholder="Digite sua senha" required>

                                <!-- Ícone do olho -->
                                <img class="absolute right-3 w-5 h-5 cursor-pointer opacity-50 hover:opacity-100 transition-opacity"
                                    src="{{ asset('images/auth/olhocego.svg') }}" alt="Mostrar/Ocultar Senha">
                            </div>
                        </div>

                        <!-- Rodapé do formulário: Lembrar-me e Link -->
                        <div class="flex items-center justify-between mt-1">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="remember"
                                    class="w-4 h-4 rounded border-gray-300 text-[#098e98] focus:ring-[#066a72]">
                                <span class="text-[14px] text-[#1e1e1e]">Lembrar-me</span>
                            </label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                    class="text-[14px] underline text-[#098e98] hover:text-[#066a72] transition-colors">Esqueci minha senha</a>
                            @endif
                        </div>

                        <!-- Botão Entrar -->
                        <button type="submit" class="w-full h-[45px] mt-4 rounded-full bg-[#098e98] hover:bg-[#066a72] transition-colors flex justify-center items-center shadow-sm">
                            <span class="text-[20px] font-bold text-white">Entrar</span>
                        </button>

                        <a href="register" class="w-full h-[45px] mt-1 rounded-full bg-transparent border-2 border-[#098e98] text-[#098e98] hover:bg-[#098e98]/10 transition-colors flex justify-center items-center text-[20px] font-bold">
                            Criar Nova Conta
                        </a>
                    </form>

                </div>
            </div>
        </div>

    </div>
</body>

</html>