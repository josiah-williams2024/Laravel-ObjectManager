<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import * as NoteController from '@/actions/App/Http/Controllers/NoteController';
import type { Note } from '@/types/notes.ts';

const props = defineProps<{
    note: Note;
}>();
</script>

<template>
    <main class="min-h-screen p-4 md:p-6 lg:p-8">
        <header class="mb-6 space-y-2">
            <h1 class="text-3xl font-bold text-center underline">View Note</h1>
        </header>
        <section class="mx-auto max-w-7xl space-y-6">
            <article class="flex flex-col space-y-4 rounded-lg border bg-white p-4 shadow">

            <p>Title: {{ note.title }}</p>
            <p>Body: {{ note.body }}</p>
            <p>Created At: {{ note.created_at }}</p>
            <p>Updated At: {{ note.updated_at }}</p>
                <footer class="flex justify-between">
                    <Link :href="NoteController.edit(props.note.id)"> Edit </Link>
                    <Link  :href="NoteController.destroy(props.note.id)">Delete</Link>
                </footer>
            </article>
        </section>
    </main>
</template>

<style scoped></style>
