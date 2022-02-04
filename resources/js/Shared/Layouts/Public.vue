<template>
    <slot />

    <section class="bg-white container mx-auto max-w-7xl">
        <div class="container flex flex-row mx-auto py-12">
            <h2>Enllaços d'interès</h2>
            <ul>
                <li>Consell Comarcal</li>
            </ul>
        </div>
        
    </section>

    <section class="bg-gray-800 text-white">
        <div class="container mx-auto max-w-7xl py-2">
            © 2022- {{ year }} TicTac ® Tots els drets reservats.
        </div>
    </section>

</template>

<script>

    export default {
        data() {
            return {

                year: new Date().getFullYear(),
            }
        }
    };

</script>