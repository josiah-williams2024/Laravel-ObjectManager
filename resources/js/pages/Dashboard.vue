<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import * as NoteController from '@/actions/App/Http/Controllers/NoteController';
</script>

<template>
    <Head title="Dashboard" />

    <header class="flex-end flex items-center justify-between p-3">
        <div class="shawdow-lx rounded-full bg-gray-300 text-xl">
            <Link :href="NoteController.index()">View Notes</Link>
        </div>
        <div class="shawdow-lx rounded-full bg-gray-300 text-xl">
            <Link :href="NoteController.create()">Create Notes</Link>
        </div>

    </header>

    <main class="space-around flex gap-3 p-4 justify-center">
        Place Holder For Now
    </main>
</template>
