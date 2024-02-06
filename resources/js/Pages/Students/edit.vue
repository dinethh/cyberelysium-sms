<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link, router, useForm} from '@inertiajs/vue3';

const props = defineProps({
    student: Object,
    image: String,
})

const form = useForm({
    name: props.student.name,
    image: null,
    age: props.student.age,
    status: props.student.status,
})

function updateStudent() {
    router.put(`/students/${props.student.id}`, {
        _method: 'put',
        name:form.name,
        image: form.image,
        age:form.age,
        status:form.status,
    })
}

</script>

<template>
    <Head title="Students"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Update Students</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="flex m-2 p-2">
                        <Link class="px-4 py-2 bg-black font-bold rounded text-white" href="/students">Back</Link>
                    </div>

                    <div class="flex shadow-black">
                        <form class="max-w-sm mx-auto" @submit.prevent="updateStudent">
                            <div class="mb-5">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Student Name</label>
                                <input id="name" v-model="form.name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" type="text">
                            </div>

                            <div class="mb-5">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Image</label>
                                <div class="m-2 p-2">
                                    <img :src="image" class="h-32 w-32">
                                </div>
                                <input
                                    id="image"
                                    aria-describedby="user_avatar_help"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    type="file"
                                    @input="form.image = $event.target.files[0]">
                            </div>

                            <div class="mb-5">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Student
                                    Age</label>
                                <input id="age" v-model="form.age"
                                       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                       type="text">
                            </div>


                            <div class="mb-5">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Student Status</label>
                                <select id="status" v-model="form.status"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>


                            <button
                                class=" mb-5 text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="submit">
                                Update
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>


