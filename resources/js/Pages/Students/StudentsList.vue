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
                    <jet-nav-link :href="route('students.create')" class="bg-blue-500  text-white rounded px-8 pt-2 pb-1 mb-8">
                        Add new
                    </jet-nav-link>
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
                                <button @click="deleteRow(student)" class="font-bold py-2 px-4 rounded"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg></button>
                            </td>
                        </tr>
                      </tbody>
                    </table>

                    <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400" v-if="isOpen">
                      <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 transition-opacity">
                          <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                              
                              <button @click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Cancel
                              </button>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>


<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import JetNavLink from '@/Jetstream/NavLink.vue'
import { Inertia } from '@inertiajs/inertia'

    export default {
        props: {
          students: Array,
        },
        data() {
            return {
                editMode: false,
                isOpen: false,
            }
        },
        methods: {
            openModal() {
                this.isOpen = true;
            },
            closeModal() {
                this.isOpen = false;
                this.editMode=false;
            },
            deleteRow(student) {
                if (!confirm('Are you sure want to remove?')) return;
                const url = '/students/' + student.id;
                Inertia.visit(url, { method: 'delete' })
                this.closeModal();
            },
        },
        components: {
            AppLayout,
            JetNavLink,
        },
    }
</script>
