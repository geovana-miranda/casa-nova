<?php

require_once __DIR__ . "/templates/header.php";

?>

<main class="py-12 rounded-xl">
    <form class="flex flex-col justify-center items-center mx-auto px-12 bg-white py-8 w-xl rounded-2xl shadow-2xl"
        method="post" enctype="multipart/form-data">
        <h2 class="text-2xl text-indigo-900 font-bold mb-2"><?= $item->id ? "Editar item" : "Adicionar novo item" ?>
        </h2>

        <div class="w-full my-4 flex flex-col gap-2 text-lg">
            <label class="text-gray-600" for="name">Nome:</label>
            <input name="name" class="border-gray-400 border px-4 py-1 rounded-xl" required value="<?= $item?->name; ?>"
                placeholder="Digite o nome do produto" id="name" />
        </div>

        <div class="w-full flex flex-col gap-2 text-lg">
            <label class="text-gray-600" for="link">Link:</label>
            <input name="link" class="border-gray-400 border px-4 py-1 rounded-xl" value="<?= $item?->link; ?>"
                placeholder="Digite o link do produto" id="link" />
        </div>

        <div class="w-full my-4 flex items-center justify-between gap-2">
            <div class="w-full flex flex-col gap-2 text-lg">
                <label class="text-gray-600" for="category">Categoria:</label>
                <select name="category" id="category" class="border-gray-400 border px-4 py-1 rounded-xl">
                    <option value=""></option>
                    <option value="Cozinha" <?= $item?->category === 'Cozinha' ? 'selected' : '' ?>>Cozinha</option>
                    <option value="Sala" <?= $item?->category === 'Sala' ? 'selected' : '' ?>>Sala</option>
                    <option value="Quarto" <?= $item?->category === 'Quarto' ? 'selected' : '' ?>>Quarto</option>
                    <option value="Banheiro" <?= $item?->category === 'Banheiro' ? 'selected' : '' ?>>Banheiro</option>
                    <option value="Lavanderia" <?= $item?->category === 'Lavanderia' ? 'selected' : '' ?>>Lavanderia
                    </option>
                    <option value="Quintal" <?= $item?->category === 'Quintal' ? 'selected' : '' ?>>Quintal</option>
                    <option value="Outros" <?= $item?->category === 'Outros' ? 'selected' : '' ?>>Outros</option>

                </select>
            </div>

            <div class="w-full flex flex-col gap-2 text-lg">
                <label class="text-gray-600" for="value">Valor:</label>
                <input type="text" name="value" class="border-gray-400 border px-4 py-1 rounded-xl" required id="value"
                    value="<?= number_format($item->value, 2, ",", "."); ?>" placeholder="Ex: 199,99" id="value" />
            </div>
        </div>

        <div class="mb-4 w-full flex flex-col gap-2 text-lg">
            <label class="text-gray-600" for="status">Status:</label>
            <select name="status" id="status" class="border-gray-400 border px-4 py-1 rounded-xl w-1/2">
                <option value="Pendente" <?= $item?->status === 'Pendente' ? 'selected' : '' ?>>Pendente</option>
                <option value="Comprado" <?= $item?->status === 'Comprado' ? 'selected' : '' ?>>Comprado</option>
            </select>
        </div>

        <div class="w-full flex flex-col gap-2 text-lg">
            <label class="text-gray-600" for="image">Imagem:</label>
            <input type="file" accept="image/*" name="image" id='image' />
        </div>

        <input
            class="my-4 flex self-end px-8 py-2 border rounded-xl bg-indigo-900 text-white font-bold text-lg cursor-pointer"
            type="submit" value="<?= $item->id ? "Salvar" : "Adicionar" ?>" />
    </form>
</main>

<script src="https://unpkg.com/imask"></script>
<script>
    const element = document.getElementById('value');
    IMask(element, {
        mask: Number,
        scale: 2, // casas decimais
        thousandsSeparator: '.', // separador de milhar
        radix: ',', // vírgula como separador decimal
        padFractionalZeros: true
    });
</script>

<?php

require_once __DIR__ . "/templates/footer.php";

?>