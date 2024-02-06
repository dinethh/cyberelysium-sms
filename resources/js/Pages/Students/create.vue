<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head , Link} from '@inertiajs/vue3';
</script>

<template>
    <Head title="Students" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Manage Students</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


                <!--                =========-->


                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="flex m-2 p-2">
                        <Link href="/students" class="px-4 py-2 bg-red-500 rounded text-white">Back</Link>
                    </div>
                    <!--                ========-->


                    <!--                ========-->

                </div>


                <!--                ========-->

            </div>
        </div>
    </AuthenticatedLayout>
</template>
