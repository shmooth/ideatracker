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
                        <h1>My Ideas</h1>
                    </div>
                    <div class="p-6">


                    <table id="myTable" class="mx-auto display table-auto border border-green-800 p-4">
                        <thead>
                            <tr class="p-4">
                                <th class="p-4 border border-green-800">Codename</th>
                                <th class="p-4 border border-green-800">Brief Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-4 border border-green-800">AskABiker.com</td>
                                <td class="p-4 border border-green-800">Simple, funny Q&A about bikers</td>
                            </tr>
                            <tr>
                                <td class="p-4 border border-green-800">SimpleWalkr</td>
                                <td class="p-4 border border-green-800">Simple walking app with audio announcements</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </breeze-authenticated-layout>
</template>


<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated'

    export default {
        components: {
            BreezeAuthenticatedLayout,
        },
        mounted(){
            console.log('test from the Dashboard.vue component...');
            $(document).ready( function () {
                console.log('going to load a datatable...');
                console.log(new Date());
                var table = $('#myTable').DataTable();
                console.log('presumably we got a ref to the datatable...now what?');

                $('#myTable tbody').on('click', 'tr', function () {
                    var data = table.row( this ).data();
                    alert( 'You clicked on '+data[0]+'\'s row' );
                } );
            });
        }
    }

</script>


