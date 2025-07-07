<template>
  <div class="max-w-xl mx-auto mt-10">
    <h2 class="text-xl font-bold mb-4">Novo Contato</h2>
    <form @submit.prevent="submit">
      <input v-model="form.name" placeholder="Nome" class="input" />
      <input v-model="form.email" placeholder="Email" class="input" />
      <input v-model="form.phone" placeholder="Telefone" class="input" />
      <button class="bg-green-600 text-white px-4 py-2 mt-2 rounded">Salvar</button>
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
const form = useForm({ name: '', email: '', phone: '' });
const submit = () => form.post(route('contacts.store'));
</script>
