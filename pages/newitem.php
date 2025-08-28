<?php

require_once "./templates/header.php";

?>

<main class="py-12 rounded-xl">
    <form class="flex flex-col justify-center items-center mx-auto px-12 bg-white py-4 w-xl rounded-2xl shadow-2xl">
        <h2 class="text-2xl text-orange-400 font-bold mb-2">Adicionar novo item</h2>

        <div class="w-full my-4 flex flex-col gap-2 text-lg">
            <label class="text-gray-600" for="name">Nome:</label>
            <input name="name" class="border-gray-400 border px-4 py-1 rounded-xl" required
                placeholder="Digite o nome do produto" id="name" />
        </div>

        <div class="w-full flex flex-col gap-2 text-lg">
            <label class="text-gray-600" for="link">Link:</label>
            <input name="link" class="border-gray-400 border px-4 py-1 rounded-xl" required
                placeholder="Digite o link do produto" id="link" />
        </div>

        <div class="w-full my-4 flex items-center justify-between gap-2">
            <div class="w-full flex flex-col gap-2 text-lg">
                <label class="text-gray-600" for="category">Categoria:</label>
                <select name="category" id="category" class="border-gray-400 border px-4 py-1 rounded-xl">
                    <option value=""></option>
                    
                </select>
            </div>

            <div class="w-full flex flex-col gap-2 text-lg">
                <label class="text-gray-600" for="value">Valor:</label>
                <input name="value" class="border-gray-400 border px-4 py-1 rounded-xl" required
                    placeholder="Digite o valor do produto" id="value" />
            </div>
        </div>

        <div class="w-full flex flex-col gap-2 text-lg">
            <label class="text-gray-600" for="image">Imagem:</label>
            <input type="file" accept="image/*" name="image" id='image' />
        </div>

        <input class="my-4 flex self-end px-8 py-2 border rounded-xl bg-orange-400 text-white font-bold text-lg cursor-pointer" type="submit"
            value="Adicionar" />
    </form>
</main>

<?php

require_once "./templates/footer.php";

?>