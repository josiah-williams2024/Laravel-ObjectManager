<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import * as NoteController from '@/actions/App/Http/Controllers/NoteController';
import { Label } from '@/components/ui/label';
import type { Note } from '@/types/notes.ts';

const props = defineProps<{
    note: Note;
}>();

console.log(props.note);
console.log(props.note.id);

const form = useForm({
    title: props.note.title,
    body: props.note.body,
});

const submit = () => {
    const action = NoteController.update(props.note);
    form.submit(action.method, action.url);
};
</script>

<template>
    <main class="min-h-screen p-4 md:p-6 lg:p-8">
        <header class="mb-6 space-y-2">
            <h1 class="text-center text-3xl font-bold underline">
                Update Note
            </h1>
        </header>
        <section class="mx-auto max-w-xl space-y-6">
            <form
                class="rounde-lg flex flex-col space-y-4 bg-white p-6 shadow"
                @submit.prevent="submit"
            >
                <Label for="title">Title</Label>
                <input
                    type="text"
                    id="title"
                    v-model="form.title"
                    class="rounde-lg border p-2"
                />

                <Label for="body">Body</Label>
                <textarea
                    id="body"
                    v-model="form.body"
                    class="min-h-40 rounded-lg border p-2"
                ></textarea>

                <button
                    class="rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-400"
                    type="submit"
                    :disabled="form.processing"
                >
                    Update
                </button>
            </form>
        </section>
    </main>
</template>
