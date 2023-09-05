<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/dist/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,400,1,0" />
</head>

<body>
    <div class="bg-[#FFF5D2] w-screen h-screen flex flex-col justify-center items-center">
        <img src="../../public/logo.jpg" alt="logo" class="w-[450px] h-[250px] object-cover">
        <div class="w-[350px] h-[300px] bg-white rounded-xl shadow-2xl my-5 py-6 flex flex-col  items-center">
            <form action="/src/controller/Get_user.php" method="post">
                <div class="flex justify-center items-center">
                    <p class="my-5 text-gray-500">Welcome login with your account</p>
                </div>
                <div class="h-10 shadow-inner rounded-xl flex justify-center items-center">
                    <input name="email" type="email" placeholder="E-mail" class="w-[270px]  outline-none border-0 focus:ring-0">
                    <span class="material-symbols-outlined text-gray-500">
                        mail
                    </span>
                </div>
                <div class="h-10 shadow-inner rounded-xl flex justify-center items-center my-5 w-[320px]">
                    <input name="password" type="password" placeholder="Password" class="outline-none border-0 focus:ring-0 w-[270px]">
                    <input type="button">
                        <span class="material-symbols-outlined text-gray-500">
                            visibility_off
                        </span>
                    </input type="button">
                </div>
                <div class="flex justify-end">
                    <button class='bg-blue-600 text-white active:bg-white active:text-blue-600 w-[150px] p-2 rounded-xl'>Submit</button>
                </div>
            </form>
        </div>

    </div>
</body>

</html>