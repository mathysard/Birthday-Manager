<?php

session_start();

$title = "Page d'accueil";

require_once './components/header.php';

?>
    <h1 class="text-center font-semibold text-4xl mt-4">Birthdate Manager</h1>
    <p class="text-center text-slate-500 text-lg">Il n'a jamais été aussi facile de lister les anniversaires de vos proches.</p>
    <div class="flex justify-center mt-8">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8.25v-1.5m0 1.5c-1.355 0-2.697.056-4.024.166C6.845 8.51 6 9.473 6 10.608v2.513m6-4.871c1.355 0 2.697.056 4.024.166C17.155 8.51 18 9.473 18 10.608v2.513M15 8.25v-1.5m-6 1.5v-1.5m12 9.75-1.5.75a3.354 3.354 0 0 1-3 0 3.354 3.354 0 0 0-3 0 3.354 3.354 0 0 1-3 0 3.354 3.354 0 0 0-3 0 3.354 3.354 0 0 1-3 0L3 16.5m15-3.379a48.474 48.474 0 0 0-6-.371c-2.032 0-4.034.126-6 .371m12 0c.39.049.777.102 1.163.16 1.07.16 1.837 1.094 1.837 2.175v5.169c0 .621-.504 1.125-1.125 1.125H4.125A1.125 1.125 0 0 1 3 20.625v-5.17c0-1.08.768-2.014 1.837-2.174A47.78 47.78 0 0 1 6 13.12M12.265 3.11a.375.375 0 1 1-.53 0L12 2.845l.265.265Zm-3 0a.375.375 0 1 1-.53 0L9 2.845l.265.265Zm6 0a.375.375 0 1 1-.53 0L15 2.845l.265.265Z" />
        </svg>
    </div>

    <?php if(!isset($_SESSION["user"])) {
        ?>
        <div class="flex justify-center">
            <p class="text-center text-xl w-1/2 my-8">Avez-vous déjà eu peur d'oublier l'anniversaire d'un proche ? N'ayez plus crainte, maintenant que Birthdate Manager s'en rappelle à votre place !<br><br>Birthdate Manager vous permet d'enregistrer sous forme de tableau la liste d'anniversaire de vos parents, vos amis, vos collègues, et même votre conjoint. Vous pouvez également supprimer ces dates d'anniversaires pour des raisons qui vous regardent uniquement vous.<br><br>Pour pouvoir commencer à utiliser Birthday Manager, veuillez vous connecter ou vous créer un compte et entrez les données de la personne.</p>
        </div><?php
    } else {
        ?>
        <div class="flex justify-center">
            <p class="text-center text-xl w-1/2 my-8">Avez-vous déjà eu peur d'oublier l'anniversaire d'un proche ? N'ayez plus crainte, maintenant que <a href="./birthdays/birthdays.php" class="underline text-blue-700">Birthdate Manager</a/a> s'en rappelle à votre place !<br><br><a href="./birthdays/birthdays.php" class="underline text-blue-700">Birthdate Manager</a> vous permet d'enregistrer sous forme de tableau la liste d'anniversaire de vos parents, vos amis, vos collègues, et même votre conjoint. Vous pouvez également supprimer ces dates d'anniversaires pour des raisons qui vous regardent uniquement vous.<br><br>Pour pouvoir commencer à utiliser <a href="./birthdays/birthdays.php" class="underline text-blue-700">Birthday Manager</a>, veuillez vous connecter ou vous créer un compte et entrez les données de la personne.</p>
        </div><?php
    }?>

    <?php require_once './components/footer.php' ?>