<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="favicon" href="favicon.ico" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Andrews Costa Chiozo</title>
</head>
<body class="bg-gray-900 text-white font-mono p-4">
    
    <header class="p-4 min-h-[50vh] bg-gray-800 opacity-80 rounded justify-center items-center relative flex flex-col">
        <video autoplay muted loop class="absolute inset-0 w-full h-full object-cover z-[-1] opacity-10">
            <source src="wdbl.mp4" type="video/mp4">
        </video>
        <h1 class="text-8xl font-bold self-center text-center h-full">Portfolio</h1>
        <nav class="absolute bottom-4 right-4">
            <ul class="flex space-x-4">
                <li><a href="#portfolio" class="text-amber-400 font-bold">Portfolio</a></li>
                <li><a href="#curriculo" class="text-white font-bold hover:text-amber-400">Eu sou recrutador</a></li>
            </ul>
        </nav>
    </header>


    <main id="app" class="h-full">
        <section id="portfolio">
            <h2 class="text-2xl font-bold mb-4 text-gray-400 p-4">Portfolio</h2>
            <div class="grid grid-cols-3 gap-4">

                <article class="relative overflow-hidden rounded h-100 bg-gray-800">
                    <div class="absolute inset-0">
                        <img src="portfolio.jpg" class="w-full h-full object-fill opacity-50" alt="Admin Dash">
                    </div>
                    <div class="absolute inset-0  bg-gray-800 opacity-0 p-4 h-100 hover:opacity-90 flex items-center justify-center">
                        <div class="text-center">
                            <h3 class="text-2xl font-bold mb-2">Admin Dash</h3>
                            <p class="text-sm text-gray-300">Dashboard desenvolvido com Vue.js e TailwindCSS para a tomada de decisões no setor financeiro.</p>
                        </div>
                        <a href="#" class="mt-4 bg-amber-400 px-4 py-2 rounded font-bold hover:bg-amber-500 absolute bottom-2 right-2">Experimentar</a>
                    </div>
                </article>

                <article class="relative overflow-hidden rounded h-100 bg-gray-800">
                    <div class="absolute inset-0">
                        <img src="portfolio.jpg" class="w-full h-full object-fill opacity-50" alt="Admin Dash">
                    </div>
                    <div class="absolute inset-0  bg-gray-800 opacity-0 p-4 h-100 hover:opacity-90 flex items-center justify-center">
                        <div class="text-center">
                            <h3 class="text-2xl font-bold mb-2">Meu Pedido</h3>
                            <p class="text-sm text-gray-300">Gestão de Integração de Pedidos entre plataformas SuasVendas, Tray, MercadoLivre, Olist</p>
                        </div>
                        <a href="#" class="mt-4 bg-amber-400 px-4 py-2 rounded font-bold hover:bg-amber-500 absolute bottom-2 right-2">Experimentar</a>
                    </div>
                </article>

                <article class="relative overflow-hidden rounded h-100 bg-gray-800">
                    <div class="absolute inset-0">
                        <img src="portfolio.jpg" class="w-full h-full object-fill opacity-50" alt="Admin Dash">
                    </div>
                    <div class="absolute inset-0  bg-gray-800 opacity-0 p-4 h-100 hover:opacity-90 flex items-center justify-center">
                        <div class="text-center">
                            <h3 class="text-2xl font-bold mb-2">Enforce Security</h3>
                            <p class="text-sm text-gray-300">Gestão inteligente de câmeras públicas</p>
                        </div>
                        <a href="#" class="mt-4 bg-amber-400 px-4 py-2 rounded font-bold hover:bg-amber-500 absolute bottom-2 right-2">Experimentar</a>
                    </div>
                </article>

            </div>
        </section>
    </main>
</body>
</html>
