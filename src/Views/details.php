<?php

require_once __DIR__ . "/templates/header.php";

?>

<main class="py-12 rounded-xl">
    <section class="flex flex-col justify-center items-center mx-auto px-12 bg-white py-8 w-xl rounded-2xl shadow-2xl">
        <h2 class="text-indigo-900 font-bold text-2xl mb-12">Detalhes do item</h2>

        <div class="flex justify-start gap-12">
            <img src="<?= $item->image ? '/img/' . $item->image : '/img/noimage.jpg' ?>" alt="<?= $item->name ?>"
                class="w-48 h-44 object-fit">
            <div class="my-2 flex flex-col justify-between">
                <div>
                    <h3 class="text-indigo-900 font-bold text-xl"><?= $item->name ?></h3>
                    <p class="value text-lg font-bold text-green-700"><?= $item->value ?></p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Categoria:
                        <span class="text-sm text-gray-500"><?= $item->category ?></span>
                    </p>
                    <p class="text-sm text-gray-500">Status:
                        <span class="text-sm text-gray-500"><?= $item->status ?></span>
                    </p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Link:
                        <a href="<?= $item->link ?>" class="font-bold text-indigo-900 hover:underline">Clique aqui <i
                                class="fa-solid fa-up-right-from-square text-xs "></i></a>
                    </p>
                </div>

            </div>
        </div>
        <div class="mt-12 flex justify-center items-center gap-4">
            <a href="/edit-item?id=<?= $item->id ?>" class="bg-indigo-900 px-8 py-1 text-white rounded-lg">Editar</a>
            <a href="/delete-item?id=<?= $item->id ?>" class="bg-red-900 px-8 py-1 text-white rounded-lg">Excluir</a>
        </div>
    </section>
</main>

<script>
    const value = document.querySelector(".value");
    const formattedValue = parseFloat(value.textContent).toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL'
    });
    value.textContent = formattedValue;
</script>

<?php

require_once __DIR__ . "/templates/footer.php";

?>