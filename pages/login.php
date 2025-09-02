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
      <form
        class="flex flex-col justify-center items-center my-48 px-12 shadow-2xl bg-white py-20 w-xl rounded-4xl"
      >
        <h2 class="text-4xl text-indigo-900 font-bold mb-2">Login</h2>
        <p class="text-gray-500">
          Não possui conta?
          <a href="./pages/register.php" class="text-indigo-900 hover:underline"
            >Cadastre-se</a
          >
        </p>

        <div class="w-full mt-8 flex flex-col gap-2 text-xl">
          <label class="text-gray-600" for="email">Email:</label>
          <input
            name="email"
            class="border-gray-400 border px-4 py-1 rounded-xl"
            required
            type="email"
            placeholder="Digite seu email"
            id="email"
          />
        </div>

        <div class="flex flex-col gap-2 w-full text-xl my-4">
          <label class="text-gray-600" for="password">Senha:</label>
          <input
            name="password"
            class="border-gray-400 border px-4 py-1 rounded-xl"
            required
            type="password"
            placeholder="Digite sua senha"
            id="password"
          />
        </div>

        <input
          class="my-4 py-2 w-full border rounded-xl bg-indigo-900 text-white font-bold text-xl"
          type="submit"
          value="Entrar"
        />
      </form>
    </main>
  </body>
</html>
