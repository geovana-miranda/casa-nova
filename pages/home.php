<?php

require_once __DIR__ . "/templates/header.php";


?>

<main class="bg-amber-100 px-20 py-8 rounded-xl">
    <div class="flex justify-between mb-8">
        <h2 class="text-orange-500 font-bold text-2xl">Seus itens</h2>
        <a href="/newitem" class="px-8 py-2 border-orange-500 rounded-lg bg-orange-500 text-white font-bold">adicionar
            item</a>
    </div>
    <section>
        <ul class="flex items-center !flex-wrap gap-4">
            <li>
                <a href="#" class="p-4 w-52 flex flex-col items-center bg-white rounded-lg">
                    <img src="../teste.jpg" alt="" class="w-48 h-44 object-fit ">
                    <div>
                        <p class="text-orange-500 font-bold">Conjunto de Refratários Celebrity</p>
                        <span class="text-sm">R$9,99</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="p-4 w-52 flex flex-col items-center bg-white rounded-lg">
                    <img src="../teste.jpg" alt="" class="w-48 h-44 object-fit ">
                    <div>
                        <p class="text-orange-500 font-bold">Conjunto de Refratários Celebrity</p>
                        <span class="text-sm">R$9,99</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="p-4 w-52 flex flex-col items-center bg-white rounded-lg">
                    <img src="../teste.jpg" alt="" class="w-48 h-44 object-fit ">
                    <div>
                        <p class="text-orange-500 font-bold">Conjunto de Refratários Celebrity</p>
                        <span class="text-sm">R$9,99</span>
                    </div>
                </a>
            </li>

            <?php foreach ($itemsList as $item): ?>
                <li>
                <a href="/details?id=<?= $item->id ?>" class="p-4 w-52 flex flex-col items-center bg-white rounded-lg">
                    <img src="../teste.jpg" alt="" class="w-48 h-44 object-fit ">
                    <div>
                        <p class="text-orange-500 font-bold"><?= $item->name ?></p>
                        <span class="text-sm">R$<?= $item->value ?></span>
                    </div>
                </a>
            </li>
            <?php endforeach; ?>

        </ul>
    </section>
</main>

<?php

require_once __DIR__ . "/templates/footer.php";

?>