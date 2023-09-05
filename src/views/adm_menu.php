<?php

// <section>
//     <div>
//         <h1 class="flex text-3xl m-4">Dashboard</h1>
//         <div class="w-[95%] mx-4 p-5 rounded-xl shadow-xl">
//             <h1 class="text-xl">Welcome</h1>
//             <p>Select the action you want to perform in the tabs on the left</p>
//         </div>
//     </div>
// </section>

?>
<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . "/src/model/connection.php";

$pagina = 1;

if(isset($_GET['pagina'])){
$pagina = filter_input(INPUT_GET,"pagina",FILTER_VALIDATE_INT);}

if(!$pagina){
$pagina = 1;}

$limite = 9;
$inicio = ($pagina * $limite) - $limite;

$result = $pdo->query("SELECT * FROM permissoes INNER JOIN usuario ON permissoes.id_permissao = usuario.id_permissoes ORDER BY id_usuario LIMIT $inicio, $limite")->fetchAll();
?>
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
            <div>
                <a href="/src/views/adm_menu.php?pagina=1"></a>
                <a href="/src/views/adm_menu.php?pagina=<?= $pagina-1 ?>">primeita</a>
                <?= $pagina ?>
                <a href="/src/views/adm_menu.php?pagina=<?= $pagina+1 ?>">ultima</a>
                <a href="/src/views/adm_menu.php"></a>
            </div>
        </div>
    </div>