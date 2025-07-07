<template>
  <div class="max-w-xl mx-auto mt-10">
    <h2 class="text-xl font-bold mb-4">Editar Contato</h2>
    <form @submit.prevent="submit">
      <input v-model="form.name" placeholder="Nome" class="input" />
      <input v-model="form.email" placeholder="Email" class="input" />
      <input v-model="form.phone" placeholder="Telefone" class="input" />
      <button class="bg-blue-600 text-white px-4 py-2 mt-2 rounded">Atualizar</button>
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
const props = defineProps({ contact: Object });
const form = useForm({
  name: props.contact.name,
  email: props.contact.email,
  phone: props.contact.phone
});
const submit = () => form.put(route('contacts.update', props.contact.id));
</script>
