<template>
  <div class="max-w-4xl mx-auto mt-10">
    <div class="flex justify-between mb-4">
      <h1 class="text-2xl font-bold">Contatos</h1>
      <Link :href="route('contacts.create')" class="bg-blue-500 px-4 py-2 text-white rounded">Novo</Link>
    </div>

    <table class="w-full border">
      <thead>
        <tr class="bg-gray-100">
          <th class="p-2 text-left">Nome</th>
          <th class="p-2 text-left">Email</th>
          <th class="p-2 text-left">Telefone</th>
          <th class="p-2 text-right">Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="c in contacts" :key="c.id">
          <td class="p-2">{{ c.name }}</td>
          <td class="p-2">{{ c.email }}</td>
          <td class="p-2">{{ c.phone }}</td>
          <td class="p-2 text-right space-x-2">
            <Link :href="route('contacts.edit', c.id)" class="text-blue-600">Editar</Link>
            <form :action="route('contacts.destroy', c.id)" method="POST" class="inline">
              <input type="hidden" name="_method" value="DELETE" />
              <input type="hidden" name="_token" :value="$page.props.csrf_token" />
              <button class="text-red-500">Excluir</button>
            </form>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3';
const props = defineProps(['contacts']);
</script>
