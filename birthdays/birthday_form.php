<?php

session_start();

if(!isset($_SESSION["user"])) {
    header("Location: ../index.php?error=Connexion échouée ou non-établie");
}

require_once '../functions.php';

if(isset($_GET["id"])) {
    $birthday = selectSpecificBirthday($_GET["id"]);
    $title = "BM — Modification de " . $birthday["name"];
} else {
    $title = "BM — Création d'anniversaire";
}

require_once '../components/header.php'

?>
    <h1 class="text-center font-semibold text-4xl mt-8"><?= mb_strimwidth($title, 5, 100, "...") ?></h1>
    <div class="flex justify-center h-screen items-center">
        <div>
            <?php if(isset($_GET["id"])) { ?><form action="./birthday_update.php?id=<?= $_GET["id"]?>" method="post"><?php } else { ?><form action="./birthday_create.php" method="post"><?php }?>
            <?php if(isset($_GET["id"])) {?>
                <input type="text" name="name" class="border rounded-full py-2 placeholder:text-center text-center" placeholder="Nom" value="<?= $birthday["name"];?>"><?php
            } else {?>
                <input type="text" name="name" class="border rounded-full py-2 placeholder:text-center text-center" placeholder="Nom"><?php
            }?>
                <br><br>
                <div class="flex justify-center">
                <?php if(isset($_GET["id"])) {?>
                    <input type="date" class="border rounded-full py-2 text-center" name="date" value="<?= $birthday["date"]?>"><?php
            } else {?>
                    <input type="date" class="border rounded-full py-2 text-center" name="date"><?php
            }?>
                </div>
                <br><br>
                <div class="flex justify-center">
                    <input type="submit" class="text-white bg-blue-700 hover:bg-blue-800 hover:cursor-pointer active:bg-blue-900 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" value="Soumettre">    
                </div>
            </form>
        </div>
    </div>
<?php require_once '../components/footer.php' ?>