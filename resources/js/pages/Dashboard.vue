<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <header class="flex-end flex items-center justify-between p-3">
        <div class="shawdow-lx rounded-full bg-gray-300 text-xl">
            <Link >View Notes</Link>
        </div>
        <div class="shawdow-lx rounded-full bg-gray-300 text-xl">
            <Link>Create Notes</Link>
        </div>

    </header>

    <main class="space-around flex gap-3 p-4 justify-center">
        Place Holder For Now
    </main>
</template>
