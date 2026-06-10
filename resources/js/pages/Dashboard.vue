<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import * as NoteController from '@/actions/App/Http/Controllers/NoteController';
import * as ItemController from '@/actions/App/Http/Controllers/ItemController';
import * as GameController from '@/actions/App/Http/Controllers/GameController';
import * as SportsController from '@/actions/App/Http/Controllers/SportsController';
import * as CarController from '@/actions/App/Http/Controllers/CarController';
</script>

<template>
    <Head title="Dashboard" />
    <main class="mx-auto max-w-7xl p-8">
        <h1 class="flex mb-8 text-3xl font-bold justify-center">Object Manager Dashboard</h1>
        <section
            class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-3"
        >
            <Link
                :href="NoteController.index()"
                class="p-6 rounded-xl border bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-lg"
            >
                <p class="mt-2 text-gray-600">View and Manage Notes</p>
            </Link>

            <Link
                :href="ItemController.index()"
                class="rounded-xl border bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg"
            >
                <p class="mt-2 text-gray-600">View and Manage Items</p>
            </Link>

            <Link
                :href="SportsController.index()"
                class="rounded-xl border bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg"
            >
                <p class="mt-2 text-gray-600">View and Manage Sports</p>
            </Link>

            <Link
                :href="GameController.index()"
                class="rounded-xl border bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg"
            >
                <p class="mt-2 text-gray-600">View and Manage Games</p>
            </Link>

            <Link
                :href="CarController.index()"
                class="rounded-xl border bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg"
            >
                <p class="mt-2 text-gray-600">View and Manage Cars</p>
            </Link>
        </section>
    </main>
</template>
