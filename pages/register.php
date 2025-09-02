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
    <form class="flex flex-col justify-center items-center shadow-2xl my-48 px-12 bg-white py-20 w-xl rounded-4xl"
      action="/new-user.php" method="post">
      <h2 class="text-4xl text-indigo-900 font-bold mb-2">Cadastre-se</h2>
      <p class="text-gray-500">
        Já possui conta?
        <a href="../login.php" class="text-indigo-900 hover:underline">Faça login</a>
      </p>

      <div class="w-full mt-8 mb-4 flex flex-col gap-2 text-xl">
        <label class="text-gray-600" for="name">Nome:</label>
        <input name="name" class="border-gray-400 border px-4 py-1 rounded-xl" required placeholder="Digite seu nome"
          id="name" />
      </div>

      <div class="w-full flex flex-col gap-2 text-xl">
        <label class="text-gray-600" for="email">Email:</label>
        <input name="email" class="border-gray-400 border px-4 py-1 rounded-xl" required type="email"
          placeholder="Digite seu email" id="email" />
      </div>

      <div class="flex flex-col gap-2 w-full text-xl my-4">
        <label class="text-gray-600" for="password">Senha:</label>
        <input name="password" class="border-gray-400 border px-4 py-1 rounded-xl" required type="password"
          placeholder="Digite sua senha" id="password" />
      </div>

      <div class="flex flex-col gap-2 w-full text-xl mb-4">
        <label class="text-gray-600" for="confirm-password">Confirmar senha:</label>
        <input name="confirm-password" class="border-gray-400 border px-4 py-1 rounded-xl" required type="password"
          placeholder="Digite sua senha novamente" id="confirm-password" />
      </div>

      <input class="my-4 py-2 w-full border rounded-xl bg-indigo-900 text-white font-bold text-xl cursor-pointer" type="submit"
        value="Cadastrar" />
    </form>
  </main>
</body>

</html>