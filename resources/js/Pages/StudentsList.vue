<template>
    <app-layout title="Student list">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Students list
            </h2>
        </template>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                  <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <table class="divide-y divide-gray-300">
                      <thead class="bg-gray-50">
                        <tr>
                          <th>
                            Name
                          </th>
                          <th>
                            Surname
                          </th>                          
                          <th>
                            Edit
                          </th>                          
                          <th>
                            Delete
                          </th>
	                      </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-300">
                        <tr v-for="student in students" :key="student.id" class="whitespace-nowrap">
                          <td class="px-6 py-4 text-sm text-gray-500">
                            {{ student.name }}
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-500">
                            {{ student.surname }}
                          </td>
                          <td class="px-6 py-4">
                                <jet-nav-link :href="route('students.edit', student.id)" as="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </jet-nav-link>
                            </td>
                            <td class="px-6 py-4">
                                <jet-nav-link method="delete" :href="route('students.destroy', student.id)" as="button">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </jet-nav-link>
                            </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>


<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import JetNavLink from '@/Jetstream/NavLink.vue'

    export default {
        props: {
          students: Array,
        },
        components: {
            AppLayout,
            JetNavLink,
        },
    }
</script>
