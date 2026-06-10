<script setup lang="ts">
import { router } from '@inertiajs/vue3';
import NoteController from '@/actions/App/Http/Controllers/NoteController';
import type { Note } from '@/types/notes';

const props = defineProps<{
    notes: Note[];
}>();

const formattedDate = (date: string) => {
    return new Date(date).toLocaleDateString();
};

const deleteNote = (id: number) => {
    router.delete(NoteController.destroy(id).url);
}

const editNote = (id: number) => {
    router.get(NoteController.edit(id).url);
}
</script>

<template>
    <h3 class="flex justify-center p-2 text-2xl underline">
        View The Current Notes
    </h3>
    <section class="md:gride-cols-2 grid grid-cols-1 gap-4 p-4 lg:grid-cols-3">
        <div
            class="rounded-lg border border-b-gray-400 bg-white p-4 shadow"
            v-for="note in props.notes"
            :key="note.id"
        >
            <h2 class="mb-2 text-lg font-semibold">Note ID : {{ note.id }}</h2>
            <h2 class="mb-3 break-words whitespace-pre-wrap text-gray-700">
                {{ note.body }}
            </h2>
            <div class="mt-auto flex flex-col gap-1 text-sm text-gray-500">
                <div class="flex justify-between">
                    <p>Created : {{ formattedDate(note.created_at) }}</p>
                    <button @click="editNote(note.id)" class="text-blue-500 hover:underline">Edit</button>
                </div>

                <div class="flex justify-between">
                    <p>Update : {{ formattedDate(note.updated_at) }}</p>
                    <button @click="deleteNote(note.id)" class="text-blue-500 hover:underline">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </section>
</template>
