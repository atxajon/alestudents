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
                    <table class="table-auto">
                      <thead>
                        <tr>
                          <th>
                            Name
                          </th>
                          <th>
                            Surname
                          </th>                          
                          <th>
                            Action
                          </th>
	                      </tr>
                      </thead>
                      <tbody>
                        <tr v-for="student in students" :key="student.id">
                          <td>
                            {{ student.name }}
                          </td>
                          <td>
                            {{ student.surname }}
                          </td>
                          <td>
                            <inertia-link :href="route('students.edit', student.id)">
                              Edit
                            </inertia-link>
                          </td>
                          <td>
                            <inertia-link
                              method="delete"
                              :href="route('students.destroy', student.id)">
                              Delete
                            </inertia-link>
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

    export default {
        props: {
          students: Array,
        },
        components: {
            AppLayout,
        },
    }
</script>
