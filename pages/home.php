<?php

require_once "./templates/header.php";

?>

<main class="bg-amber-100 px-20 py-8 rounded-xl">
    <div class="flex justify-between mb-8">
        <h2 class="text-orange-500 font-bold text-2xl">Seus itens</h2>
        <a href="./newitem.php" class="px-8 py-2 border-orange-500 rounded-lg bg-orange-500 text-white font-bold">adicionar
            item</a>
    </div>
    <section>
        <ul class="flex items-center gap-4">
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

        </ul>
    </section>
</main>

<?php

require_once "./templates/footer.php";

?>