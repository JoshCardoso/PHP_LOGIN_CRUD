<?php session_start();
if (!isset($_SESSION['permicao'])) {
    header('location: ../index.php');
} else {

require_once ($_SERVER["DOCUMENT_ROOT"]) . "/src/model/connection.php";

$pagina = 1;

if(isset($_GET['pagina'])){
$pagina = filter_input(INPUT_GET,"pagina",FILTER_VALIDATE_INT);}

if(!$pagina){
$pagina = 1;}

$limite = 9;
$inicio = ($pagina * $limite) - $limite;

$registros = $pdo->query("SELECT COUNT(id_usuario) count FROM usuario")->fetch()["count"];
$result = $pdo->query("SELECT * FROM permissoes INNER JOIN usuario ON permissoes.id_permissao = usuario.id_permissoes ORDER BY id_usuario LIMIT $inicio, $limite")->fetchAll();

$paginas = ceil($registros/$limite);

$pagDois = $pagina + 1;
$pagoTres = $pagina

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
                    <h1 class="text-white text-[15px] mx-3">Universidad</h1>
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
                <section>
                    <div>
                        <h1 class="flex text-3xl m-4">Permission List</h1>
                        <div class="w-[95%] mx-4 p-5 rounded-xl shadow-xl">
                            <h2>Authorization Information</h2>
                            <div class="flex justify-between">
                                <div class="flex bg-slate-600 w-80 h-5">
                                </div>
                                <div>
                                    <form action="">
                                        <label for="seach">Seach: </label>
                                        <input type="text" name="seach" id="seach">
                                    </form>
                                </div>
                            </div>
                            <table class="w-full border-collapse">
                                <thead>
                                    <tr>
                                        <th class="border-2 p-2 border-gray-400 bg-slate-800 text-white">#</th>
                                        <th class="border-2 p-2 border-gray-400 bg-slate-800 text-white">Email/Usuario</th>
                                        <th class="border-2 p-2 border-gray-400 bg-slate-800 text-white">Permission</th>
                                        <th class="border-2 p-2 border-gray-400 bg-slate-800 text-white">Status</th>
                                        <th class="border-2 p-2 border-gray-400 bg-slate-800 text-white">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($result as $row) { ?>
                                        <tr>
                                            <td class="border-2 p-1 border-gray-400 ">
                                                <div class="flex justify-center"><?= $row['id_usuario']; ?></div>
                                            </td>
                                            <td class="border-2 p-1 border-gray-400 ">
                                                <div class="flex justify-center"><?= $row['email']; ?></div>
                                            </td>
                                            <td class="border-2 p-1 border-gray-400 ">
                                                <div class="flex justify-center"><?= $row['tipo']; ?></div>
                                            </td>
                                            <td class="border-2 p-1 border-gray-400 ">
                                                <div class="flex justify-center"><?= $row['status_user']; ?></div>
                                            </td>
                                            <td class="border-2 p-1 border-gray-400">
                                                <a href="#">
                                                    <div class="flex justify-center">
                                                        <span class="material-symbols-outlined text-blue-400">
                                                            edit_note
                                                        </span>
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="flex justify-end my-2">
                                
                                <a class="flex justify-center mx-1 border-2 border-gray-400 px-2" href="/src/views/home.php?pagina=<?= $pagina - 1 ?>">Previous</a>
                                
                                <a class="flex justify-center mx-1 border-2 border-gray-400 w-8" href="/src/views/home.php?pagina=<?= $pagina ?>"><?= $pagina ?></a>

                                <a class="flex justify-center mx-1 border-2 border-gray-400 w-8" href="/src/views/home.php?pagina=<?= $pagina + 1 ?>"><?= $pagina + 1?></a>

                                <a class="flex justify-center mx-1 border-2 border-gray-400 w-8" href="/src/views/home.php?pagina=<?= $pagina + 2 ?>"><?= $pagina + 2 ?></a>

                                <a class="flex justify-center mx-1 border-2 border-gray-400 px-2" href="/src/views/home.php?pagina=<?= $pagina + 1 ?>">Next</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </body>

    </html>

<?php
}
?>