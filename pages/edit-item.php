<?php

require_once __DIR__ . "/templates/header.php";

$pdo = new PDO("mysql:dbname=casanova;host=localhost", "root", "");

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if ($id) {
    $statement = $pdo->prepare("SELECT * FROM items WHERE id = ?");
    $statement->bindParam(1, $id, PDO::PARAM_INT);
    $statement->execute();
    $item = $statement->fetch(PDO::FETCH_ASSOC);
} else {
    header("Location: /");
}

?>

<main class="py-12 rounded-xl">
    <form class="flex flex-col justify-center items-center mx-auto px-12 bg-white py-4 w-xl rounded-2xl shadow-2xl"
        action="../update-item.php?id=<?= $item['id'] ?>" method="post">
        <h2 class="text-2xl text-orange-400 font-bold mb-2">Editar item</h2>

        <div class="w-full my-4 flex flex-col gap-2 text-lg">
            <label class="text-gray-600" for="name">Nome:</label>
            <input name="name" class="border-gray-400 border px-4 py-1 rounded-xl" value="<?= $item['name'] ?>" required
                placeholder="Digite o nome do produto" id="name" />
        </div>

        <div class="w-full flex flex-col gap-2 text-lg">
            <label class="text-gray-600" for="link">Link:</label>
            <input name="link" class="border-gray-400 border px-4 py-1 rounded-xl" value="<?= $item['link'] ?>"
                placeholder="Digite o link do produto" id="link" />
        </div>

        <div class="w-full my-4 flex items-center justify-between gap-2">
            <div class="w-full flex flex-col gap-2 text-lg">
                <label class="text-gray-600" for="category">Categoria:</label>
                <select name="category" id="category" class="border-gray-400 border px-4 py-1 rounded-xl">
                    <option value=""></option>
                    <option value="cozinha">Cozinha</option>
                </select>
            </div>

            <div class="w-full flex flex-col gap-2 text-lg">
                <label class="text-gray-600" for="value">Valor:</label>
                <input name="value" class="border-gray-400 border px-4 py-1 rounded-xl" value="<?= $item['value'] ?>"
                    required placeholder="Digite o valor do produto" id="value" />
            </div>
        </div>
        <!-- 
        <div class="w-full flex flex-col gap-2 text-lg">
            <label class="text-gray-600" for="image">Imagem:</label>
            <input type="file" accept="image/*" name="image" id='image' />
        </div> -->

        <input
            class="my-4 flex self-end px-8 py-2 border rounded-xl bg-orange-400 text-white font-bold text-lg cursor-pointer"
            type="submit" value="Salvar" />
    </form>
</main>

<?php

require_once __DIR__ . "/templates/footer.php";

?>