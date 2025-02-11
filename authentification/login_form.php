<?php

session_start();

if(isset($_SESSION["user"])) {
    header("Location: ../index.php?error=Connexion déjà établie.");
}

$title = "BM — Connexion";

require_once '../components/header.php';
?>
    <div>
        <h1 class="text-center font-semibold text-4xl mt-8">Connexion</h1>
        <div class="h-screen flex justify-center items-center">
            <div class="w-full max-w-xs">
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="./login.php">
                    <div class="mb-4">
                        <label class="text-center block text-gray-700 text-sm font-bold mb-2" for="username">
                            Adresse mail
                        </label>
                        <input type="email" name="email" class="placeholder:text-center text-center shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Entrez votre adresse mail">
                        <div class="mb-6"></div>

                        <label class="text-center block text-gray-700 text-sm font-bold mb-2" for="password">
                            Mot de passe
                        </label>
                        <div class="flex border shadow focus:outline-none focus:shadow-outline">
                            <input type="password" id="password" name="password" class="placeholder:text-center text-center appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="******************">
                            <button type="button" id="toggler" onclick="togglePassword()">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </button>
                        </div>
                        <div class="mb-6"></div>
                        <div class="my-6 flex justify-center">
                            <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline active:bg-blue-800 hover:cursor-pointer" value="S'inscrire">
                        </div>
                        <div class="flex justify-center">
                            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800 underline" href="./register_form.php">
                                Vous n'avez pas de compte ?
                            </a>
                        </div>
                    </div>
                </form>
                <p class="text-center text-gray-500 text-xs">
                    &copy;2020 Acme Corp. All rights reserved.
                </p>
            </div>
        </div>
    </div>
    <script>
        function togglePassword() {
            const toggler = document.getElementById("toggler");
            const input = document.getElementById("password");

            if(input.type === "password") {
                toggler.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" /></svg>';
                input.type = "text";
            } else {
                toggler.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /></svg>';
                input.type = "password";
            }
        }
    </script>
</body>
</html>