<?php

session_start();

if(!isset($_SESSION["user"])) {
    header("Location: ../index.php?error=Connexion échouée ou non-établie");
}


require_once '../functions.php';

$birthdays = selectBirthday($_SESSION["user"]["id"]);


$title = "BM — Anniversaires";

require_once '../components/header.php';

?>
    <h1 class="text-center font-semibold text-4xl mt-8 mb-12">Anniversaires</h1>
    <div class="flex justify-center">
        <a href="./birthday_form.php"><button class="px-4 py-2 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-800 hover:cursor-pointer active:bg-blue-900 shadow-lg">Ajouter un anniversaire</button></a>
    </div>
    <div class="h-screen w-screen flex items-center">
        <div class="flex flex-col w-screen shadow-lg">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-center text-sm font-light text-surface">
                            <thead class="border-b border-neutral-200 font-medium dark:border-white/10 dark:text-neutral-800">
                                <tr>
                                    <th scope="col" class="px-4 py-4">Nom</th>
                                    <th scope="col" class="pr-4 py-4">Anniversaire</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($birthdays !== NULL) {
                                    foreach($birthdays as $birthday) {
                                        ?>
                                        <tr class="border-b border-neutral-200 dark:border-white/10 dark:text-neutral-800">
                                            <td class="whitespace-nowrap px-4 py-4 font-medium"><?= html_entity_decode(mb_strimwidth($birthday["name"], 0, 30, "...")) ?></td>
                                            <?php if($birthday["date"] == date("Y-m-d")) {
                                                ?><td class="whitespace-nowrap pr-4 py-4 font-medium text-green-500"><?= html_entity_decode(mb_strimwidth($birthday["date"], 0, 30, "...")) ?></td><?php
                                            } else {
                                                ?><td class="whitespace-nowrap pr-4 py-4 font-medium"><?= html_entity_decode(mb_strimwidth($birthday["date"], 0, 30, "...")) ?></td><?php
                                            }?>
                                            <td class="whitespace-nowrap py-4"><a href="./birthday_form.php?id=<?= $birthday["id"]?>"><button id="formToggle" type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Modifier</button></a></td>
                                            <td class="whitespace-nowrap py-4"><a href="./birthday_delete.php?id=<?= $birthday["id"]?>"><button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Supprimer</button></a></td>
                                        </tr>
                                        <?php
                                    }
                                }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once '../components/footer.php' ?>