<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { dashboard } from '@/routes';

</script>

<template>
    <Head title="Dashboard" />

    <header class="flex-end flex items-center justify-between p-3">
        <div class="shawdow-lx rounded-full bg-gray-300 text-xl">
            <Link class="">Create Notes</Link>
        </div>
        <div class="shawdow-lg rounded-full bg-gray-300 text-xl">
            <Link>Update Note</Link>
        </div>
    </header>

    <main class="space-around flex gap-3 p-4">

    </main>
</template>
