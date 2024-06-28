<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family : Poppins, sans-serif;
            background-color: #eeeeee;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Manrope&family=Montserrat:wght@600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <?php if(!isset($_SESSION["user"])) {
            ?>
            <div class="flex justify-end mt-2">
                <a href="../../authentification/login_form.php">
                    <button type="button" class="text-white bg-[#5484cc] hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 hover:cursor-pointer active:bg-blue-900">Se connecter</button>
                </a>
            </div>
            <?php
        } else {
            ?>
            <div class="flex justify-end mt-2">
                <a href="../../authentification/logout.php">
                    <button type="button" class="text-white bg-red-600 hover:bg-red-900 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800 hover:cursor-pointer active:bg-red-900">Se déconnecter</button>
                </a>
            </div>
            <?php
        }