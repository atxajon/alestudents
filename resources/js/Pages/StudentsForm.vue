<template>
    <app-layout title="Student form">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                New student
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                  <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <form class="w-full max-w-lg" @submit.prevent="submit">
                      <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            First Name
                          </label>
                          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Name" v-model="form.name">
                          <p class="text-red-500 text-xs italic" v-if="errors.name">Please fill out this field.</p>
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Surname
                          </label>
                          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Surname..." v-model="form.surname">
                          <p class="text-red-500 text-xs italic" v-if="errors.surname">Please fill out this field.</p>
                        </div>
                      </div>
                      <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-dob">
                            Date of birth
                          </label>
                          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-dob" placeholder="Date of birth...">
                          <p class="text-red-500 text-xs italic" v-if="errors.dob">Please fill out this field.</p>
                        </div>
                      </div>
                        <div class="md:flex md:items-center">
                        <div class="md:w-1/3"></div>
                        <div class="md:w-2/3">
                          <button class="shadow bg-blue-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                            Add student
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
  components: {
    AppLayout,
  },
  props: {
    errors: Object,
  },
  data() {
    return {
      form: {
        name: null,
        surname: null,
        dob: null,
      },
    };
  },
  methods: {
    submit() {
      this.$inertia.post(route('students.store'), this.form);
    },
  },
};
</script>
