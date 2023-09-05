<?php session_start();
if (!isset($_SESSION['permicao'])) {
    header('location: ../index.php');
} else {
?>
    <!doctype html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="/dist/output.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,400,1,0" />
        <script src="../../js/main.js" defer></script>
    </head>

    <body>
        <div class="w-screen h-screen flex">
            <div class="bg-slate-800 w-1/6">
                <div class="w-[250px] h-[50px] flex items-center p-4 object-contain">
                    <img src="../../public/logo.jpg" alt="logo" class="w-[40px] h-[40px]  rounded-full shadow-sm ">
                    <h1 class="text-white text-[23px] mx-3">Universidad</h1>
                </div>
                <div class=" flex flex-col border-slate-800 border-y-slate-600 border-2">
                    <h2 class="flex text-white p-2 mx-5 text-xl"><?= $_SESSION['user']['apelido']; ?></h2>
                    <h2 class="flex text-white p-2 mx-5"><?= $_SESSION['permicao']['perm']; ?></h2>
                </div>
                <div>
                    <div class=" w-full flex flex-col justify-center items-center">
                        <h1 class="text-white text-sm my-3">MENU <?= $_SESSION['permicao']['menu']; ?></h1>
                    </div>
                    <div class="flex flex-col text-white my-3 mx-5">
                        <a class="flex text-white my-1" href="">
                            <span class="mx-2 material-symbols-outlined">
                                manage_accounts
                            </span>Permisos</a>
                        <a class="flex text-white my-1" href="">
                            <span class="mx-2 material-symbols-outlined">
                                <span class="material-symbols-outlined">
                                    interactive_space
                                </span>
                            </span>Maestros</a>
                        <a class="flex text-white my-1" href="">
                            <span class="mx-2 material-symbols-outlined">
                                school
                            </span>Alumnos</a>
                        <a class="flex text-white my-1" href="">
                            <span class="mx-2 material-symbols-outlined">
                                monitor
                            </span>Clases</a>
                    </div>
                </div>
            </div>
            <div class="w-5/6">
                <nav class="w-full h-[50px] shadow-md flex items-center justify-between ">
                    <div class="flex item-center">
                        <span class="material-symbols-outlined text-gray-400 te">
                            density_medium
                        </span>
                        <a class="text-gray-400 mx-3" href="#">Home</a>
                    </div>
                    <div class="mx-5">
                        <ul>
                            <li class="">
                                <a id="dropMenu" href="#" class="flex items-center"><?= $_SESSION['permicao']['perm']; ?>
                                    <span class="material-symbols-outlined">
                                        expand_more
                                    </span>
                                </a>
                                <div id="menuLat" class="bg-white transition duration-300 absolute top-14 right-5 flex-col w-32 border-2 p-5 py-2  hidden shadow-xl">
                                    <a href="#" class="flex text-gray-400 mb-5">
                                        <span class="material-symbols-outlined text-gray-400">
                                            account_circle
                                        </span>
                                        Perfil
                                    </a>
                                    <a href="../controller/logout.php" class="flex text-red-500">
                                        <span class="material-symbols-outlined text-red-500">
                                            door_open
                                        </span>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <?php include('adm_menu.php') ?>
                <footer>
                </footer>
            </div>
        </div>
        
    </body>

    </html>

<?php
}
?>