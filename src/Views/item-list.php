<?php

require_once __DIR__ . "/templates/header.php";

?>

<main class="px-20 py-8 rounded-xl">
    <div class="flex justify-between mb-8">
        <h2 class="text-indigo-900 font-bold text-2xl">Seus itens</h2>
        <a href="/newitem" class="px-8 py-2 border-indigo-900 rounded-lg bg-indigo-900 text-white font-bold">adicionar
            item</a>
    </div>
    <section>
        <ul class="flex items-center justify-around !flex-wrap gap-4">
            <?php foreach ($itemsList as $item): ?>
                <li>
                    <a href="/details?id=<?= $item->id ?>" class="p-4 w-52 flex flex-col bg-white rounded-lg shadow-lg">
                        <img src="<?= $item->image ? '/img/' . $item->image : '/img/noimage.jpg' ?>" alt="<?= $item->name ?>"
                            class="w-48 h-44 object-fit ">
                        <div class="flex flex-col flex-start py-1">
                            <p class="text-indigo-900 font-bold"><?= $item->name ?></p>
                            <p class="text-sm font-bold text-green-700">R$<?= $item->value ?></p>
                            <p class="self-end text-gray-400 text-sm"><?= $item->status ?></p>
                        </div>
                    </a>
                </li>
            <?php endforeach; ?>

        </ul>
    </section>
</main>

<?php

require_once __DIR__ . "/templates/footer.php";