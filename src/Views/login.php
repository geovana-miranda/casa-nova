<?php

if (isset($_SESSION['form_data'])) {
  $data = $_SESSION['form_data'];
  unset($_SESSION['form_data']);
} else {
  $data = [];
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="../css/output.css" rel="stylesheet" />
  <title>Casa Nova</title>
</head>

<body>
  <main class="flex justify-center items-center bg-gray-300 h-dvh">

    <div class="flex flex-col justify-center items-center shadow-2xl my-48 bg-white py-20 w-xl rounded-4xl px-12">
      <div class="text-center">
        <h2 class="text-4xl text-indigo-900 font-bold mb-2">Login</h2>
          <p class="text-gray-500">
            Não possui conta?
            <a href="/register" class="text-indigo-900 hover:underline">Cadastre-se</a>
          </p>
      </div>

      <?php if (isset($_SESSION["error"])): ?>
        <div class="mx-auto w-3/5 border border-red-600 bg-red-200 py-1 mt-4">
          <p class="text-red-600 text-center"><?= $_SESSION["error"] ?></p>
        </div>
        <?php unset($_SESSION['error']); ?>
      <?php endif; ?>

      <form class="w-full" method="post">
        <div class="w-full mt-8 flex flex-col gap-2 text-xl">
          <label class="text-gray-600" for="email">Email:</label>
          <input name="email" value="<?= $data["email"] ?>" class="border-gray-400 border px-4 py-1 rounded-xl" required type="email"
            placeholder="Digite seu email" id="email" />
        </div>

        <div class="flex flex-col gap-2 w-full text-xl my-4">
          <label class="text-gray-600" for="password">Senha:</label>
          <input name="password" value="<?= $data["password"] ?>" class="border-gray-400 border px-4 py-1 rounded-xl" required type="password"
            placeholder="Digite sua senha" id="password" />
        </div>

        <input class="my-4 py-2 w-full border rounded-xl bg-indigo-900 text-white font-bold text-xl" type="submit"
          value="Entrar" />
      </form>
    </div>
  </main>
</body>

</html>