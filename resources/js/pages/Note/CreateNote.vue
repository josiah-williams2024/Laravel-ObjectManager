<script setup lang="ts">

import { useForm } from '@inertiajs/vue3';
import * as NoteController from '@/actions/App/Http/Controllers/NoteController';
import { Label } from '@/components/ui/label';

const form = useForm({
    title: '',
    body: '',
});

const submit = () => {
  form.submit(NoteController.store());
};


</script>

<template>
    <main class="min-h-screen p-4 md:p-6 lg:p-8">
        <header class="mb-6 space-y-2">
            <h1 class="font-bold text-3xl text-center underline"> Create Note </h1>
        </header>
        <section class="mx-auto max-w-7-xl space-y-6">
            <form class="flex flex-col space-y-4 rouned-lg border bg-white p-6 shadow" @submit.prevent="submit">

                <Label for="title">Title</Label>
                <input type="text" id="title" v-model="form.title" placeholder="title" required>

                <Label for="body">Body</Label>
                <textarea id="body" v-model="form.body" placeholder="body" required/>

                <button type="submit" :disabled="form.processing" class="rounded bg-blue-500 px-4 py-2 text-white items-end">Create</button>
            </form>
        </section>
    </main>
</template>

