<template>
    <breeze-authenticated-layout>
        <!--
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               Home 
            </h2>
        </template>
        -->

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h1>Codename: {{codename}}</h1>
                    </div>
                    <div class="p-6">

                    <!-- table has gone here -->
                    hello, modal

                    </div>
                </div>
            </div>
        </div>
    </breeze-authenticated-layout>
</template>


<script>
    import BreezeAuthenticatedModalLayout from '@/Layouts/AuthenticatedModal'

    export default {
        components: {
            BreezeAuthenticatedModalLayout,
        },
        mounted(){
            console.log('test from the Dashboard.vue component...');
        }
    }

</script>


