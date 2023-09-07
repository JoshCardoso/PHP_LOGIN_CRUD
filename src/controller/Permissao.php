<?php session_start();
if (!isset($_SESSION['permicao'])) {
    header('location: ../index.php');
} else {

    require_once ($_SERVER["DOCUMENT_ROOT"]) . "/src/model/connection.php";

    $pagina = 1;

    if (isset($_GET['pagina'])) {
        $pagina = filter_input(INPUT_GET, "pagina", FILTER_VALIDATE_INT);
    }

    if (!$pagina) {
        $pagina = 1;
    }

    $limite = 9;
    $inicio = ($pagina * $limite) - $limite;

    $registros = $pdo->query("SELECT COUNT(id_usuario) count FROM usuario")->fetch()["count"];
    $result = $pdo->query("SELECT * FROM permissoes INNER JOIN usuario ON permissoes.id_permissao = usuario.id_permissoes ORDER BY id_usuario LIMIT $inicio, $limite")->fetchAll();

    $paginas = ceil($registros / $limite);

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
            <div class="bg-slate-800 bg- w-1/6">
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
                                <div></div>
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
                                    <?php foreach ($result as $row) {
                                        if ($row['status_user'] === "activo") {
                                            $activo = "bg-green-700 flex justify-center text-white rounded-xl border-white px-2";
                                        } else {
                                            $activo = "bg-red-700 flex justify-center text-white rounded-xl border-white px-2";
                                        }
                                        if ($row['tipo'] === "admin") {
                                            $tipo = "bg-yellow-400 rounded-xl px-2";
                                        }
                                        if ($row['tipo'] === "teacher") {
                                            $tipo = "bg-blue-400 text-white rounded-xl px-2";
                                        }
                                        if ($row['tipo'] === "students") {
                                            $tipo = "bg-gray-400 text-white rounded-xl px-2";
                                        }

                                    ?>
                                        <tr>

                                            <td class="border-2 p-1 border-gray-400 ">
                                                <div class="flex justify-center">
                                                    <p><?= $row['id_usuario']; ?></p>
                                                </div>
                                            </td>
                                            <td class="border-2 p-1 border-gray-400 ">
                                                <div class="flex justify-center">
                                                    <p><?= $row['email']; ?></p>
                                                </div>
                                            </td>
                                            <td class="border-2 p-1 border-gray-400 ">
                                                <div class="flex justify-center ">
                                                    <p class="<?= $tipo ?>"><?= $row['tipo']; ?></p>
                                                </div>
                                            </td>
                                            <td class="border-2 p-1 border-gray-400 ">
                                                <div class="flex justify-center ">
                                                    <p class="<?= $activo ?>"><?= $row['status_user']; ?></p>
                                                </div>
                                            </td>
                                            <td class="border-2 p-1 border-gray-400">
                                                <a class="show_modalPerm" value="">
                                                    <div class="flex justify-center">
                                                        <span class="material-symbols-outlined text-blue-400 ">
                                                            edit_note
                                                        </span>
                                                    </div>
                                                </a>
                                            </td>
                                            <div class="h-screen w-screen fixed left-0 top-0 justify-center items-center bg-black bg-opacity-50 hidden modal_perm">
                                                <div class="bg-white w-[350px] rounded-2xl">
                                                    <div class="flex justify-between">
                                                        <h1 class="flex text-3xl m-2 ">Edit Permission</h1>
                                                        <div class="flex text-xl text-gray-400 m-3 show_modalPerm cursor-pointer">
                                                            <span class="material-symbols-outlined">
                                                                close
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <form action="/src/controller/Edit_perm.php" method="post" class="flex flex-col m-5">
                                                        <div>
                                                            <label for="" class=" font-bold mt-4">Email</label>
                                                            <input type="text" class="border-2 border-gray-400 w-11/12" value="<?= $row['email']; ?>">
                                                            <input type="text" class="hidden" name="id" value="<?= $row['id_usuario']; ?>">
                                                            <div class="flex flex-col">
                                                                <label for="" class=" font-bold ">User role</label>
                                                                <Select class="border-2 border-gray-400 w-11/12 ">
                                                                    <option value="" class="flex justify-center w-full">Admin</option>
                                                                    <option value="" class="flex justify-center w-full">Teacher</option>
                                                                    <option value="" class="flex justify-center w-full">Student</option>
                                                                </Select>
                                                            </div>
                                                        </div>
                                                        <div class="flex justify-end m-6">
                                                            <p class="text-white rounded-xl p-1 bg-gray-400 mx-2 show_modalPerm cursor-pointer">Close</p>
                                                            <button class="text-white rounded-xl p-1 bg-sky-400">Save Edit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="flex justify-end my-2">
                                <a class="flex justify-center mx-1 border-2 bg-slate-800 active:bg-white text-white text-base active:text-slate-800 border-gray-400 px-2" href="/src/controller/Permissao.php?pagina=1">First</a>
                                <?php if ($pagina > 1) { ?>
                                    <a class="flex justify-center mx-1 border-2 bg-slate-800 active:bg-white text-white text-base active:text-slate-800 border-gray-400 w-8 " href="/src/controller/Permissao.php?pagina=<?= $pagina - 1 ?>">&lt;&lt;</a>
                                <?php } ?>
                                <a class="flex justify-center mx-1 border-2 bg-slate-800 active:bg-white text-white text-base active:text-slate-800 border-gray-400 w-8 " href="/src/controller/Permissao.php?pagina=<?= $pagina ?>"><?= $pagina ?></a>
                                <?php if ($pagina < $paginas) { ?>
                                    <a class="flex justify-center mx-1 border-2 bg-slate-800 active:bg-white text-white text-base active:text-slate-800 border-gray-400 w-8 " href="/src/controller/Permissao.php?pagina=<?= $pagina + 1 ?>">&gt;&gt;</a>
                                <?php } ?>
                                <a class="flex justify-center mx-1 border-2 bg-slate-800 active:bg-white text-white text-base active:text-slate-800 border-gray-400 px-2" href="/src/controller/Permissao.php?pagina=<?= $paginas ?>">Last</a>
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