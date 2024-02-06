<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link} from '@inertiajs/vue3';

const props = defineProps({
    students: Array
})
</script>

<template>
    <Head title="Students"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Manage Students</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


                <!--                =========-->


                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="flex justify-end m-2 p-2">
                        <Link class="px-4 py-2 bg-blue-500 font-bold hover:bg-blue-600 rounded text-white"
                              href="/students/create">Add Student
                        </Link>
                    </div>

                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="p-4" scope="col">
                                <div class="flex items-center">
                                    <input id="checkbox-all-search" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                           type="checkbox">
                                    <label class="sr-only" for="checkbox-all-search">checkbox</label>
                                </div>
                            </th>
                            <th class="px-6 py-3" scope="col">
                                ID
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Image
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Name
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Age
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Status
                            </th>
                            <th class="px-6 py-3" scope="col">
                                Action
                            </th>
                        </tr>
                        </thead>

                        <tbody>

                        <tr v-for="students in students"
                            :key="students.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                            <td class="px-6 py-4">

                            </td>

                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    {{ students.id }}
                                </div>
                            </td>


                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <img :src="students.image" class="w-12 h-12 rounded">
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    {{ students.name }}
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    {{ students.age }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div>
                                    {{ students.status }}
                                </div>
                            </td>


                            <td class="px-6 py-4">
                                <Link
                                    :href="`/students/${students.id}`"
                                    method="delete" as="button" type="button"
                                    class="font-medium p-2 bg-red-500 rounded mr-2 text-white hover:bg-red-600"
                                >Delete
                                </Link>

                                <Link
                                    :href="`/students/${students.id}/edit`"
                                    class="font-medium p-2 bg-green-500  text-white  rounded hover:bg-green-600"
                                >Update
                                </Link>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
