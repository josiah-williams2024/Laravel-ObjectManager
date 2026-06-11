<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import * as NoteController from '@/actions/App/Http/Controllers/NoteController';
import type { Note } from '@/types/notes.ts';

const props = defineProps<{
    notes: Array<Note>,
}>();

</script>

<template>
    <main class="min-h-screen p-4 md:p-6 lg:p-8">
        <header class="mb-8">
            <h1 class="text-center text-3xl font-bold">Notes</h1>
        </header>

        <section class="mx-auto mb-8 max-w-3xl">
            <Link
                class="inline-flex items-center rounded-full bg-blue-500 px-6 py-3 font-medium text-white transition hover:bg-blue-400 hover:shadow-2xl"
                :href="NoteController.create()"
            >
                Create Note
            </Link>
        </section>

        <section
            class="mx-auto grid max-w-6xl gap-4 md:grid-cols-2 lg:grid-cols-3"
        >
            <div v-if="props.notes?.length > 0">
                <article
                    v-for="note in props.notes"
                    :key="note.id"
                    class="rounded-lg border border-gray-200 bg-white p-5 shadow-sm hover:shadow-md"
                >
                    <Link
                        class="block p-5"
                        :href="NoteController.show(note.id)"
                    >
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-lg font-semibold">
                                    {{ note.title }}
                                </h2>

                                <p class="mt-2 line-clamp-3 text-gray-600">
                                    {{ note.body }}
                                </p>
                            </div>
                        </div>
                    </Link>
                </article>
            </div>

            <div v-else>There are no notes to view</div>
        </section>
    </main>
</template>
