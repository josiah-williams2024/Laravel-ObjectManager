<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import * as NoteController from '@/actions/App/Http/Controllers/NoteController';
import { Label } from '@/components/ui/label';

const form = useForm({
    body: '',
});

const submit = () => {
    form.submit(NoteController.store());
};
</script>

<template>
    <section class="flex min-h-screen items-center justify-center">
        <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-lg">
            <h3 class="mb-4 text-center text-2xl font-bold underline">
                Create A Note
            </h3>
        <form @submit.prevent="submit" class="flex flex-col gap-4">

            <Label for="body">Note</Label>
            <textarea type="text" id="body" v-model="form.body" class="rounded-lg border p-2" placeholder="Enter your note here"/>

            <button type="submit" :disabled="form.processing" class="rounded bg-blue-500 px-4 py-2 text-white">Submit</button>
        </form>
        </div>
    </section>
</template>
