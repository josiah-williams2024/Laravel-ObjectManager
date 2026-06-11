<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import * as NoteController from '@/actions/App/Http/Controllers/NoteController';
import type { Note } from '@/types/notes.ts';

const props = defineProps<{
    note: Note,
}>();


console.log(props.note);
console.log(props.note.id);
</script>

<template>
    <p>You've arrived at the View note page</p>
    {{props.note}}
    <Link :href="NoteController.edit(props.note.id)"> Edit </Link>
</template>

<style scoped></style>
