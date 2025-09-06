<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Casa Nova</title>
</head>

<body class="max-w-7xl mx-auto bg-gray-300">
    <header class="flex justify-between mt-4 mb-8 py-4 px-8 text-xl text-white font-bold bg-indigo-900 rounded-xl">
        <a href="/" class="flex items-center gap-2"> <i class="fa-solid fa-house"></i>Casa Nova</a>
        <nav class="flex gap-12 ">
            <a href="/" class="hover:underline">home</a>
            <!-- <a href="/" class="hover:underline">categorias</a> -->
            <a href="/logout" class="hover:underline">sair</a>
        </nav>
    </header>

    <?php if (isset($_SESSION["error"])): ?>
        <div class="mx-auto w-3/5 border border-red-600 bg-red-200 py-1">
            <p class="text-red-600 text-center"><?= $_SESSION["error"] ?></p>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION["success"])): ?>
        <div class="mx-auto w-3/5 border border-green-700 bg-green-200 py-1">
            <p class="text-green-700 text-center"><?= $_SESSION["success"] ?></p>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>