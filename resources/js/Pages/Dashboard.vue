
<style>
#myTable_filter {
    margin-bottom: 10px;
}
.dataTables_length select{
    width: 70px !important; 
}
</style>

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


<!--
{{ info }}
-->


<button @click="hi">Hi</button>

                    </div>
                    <div class="p-6">


                    <table id="myTable" class="mx-auto display table-auto  border-green-400 p-4">
                        <thead>
                            <tr class="p-4 border bg-gray-100">
                                <th class="p-4 border border-gray-400 bg-blue-400 text-black">ID</th>
                                <th class="p-4 border border-gray-400 bg-blue-400 text-black">Codename</th>
                                <th class="p-4 border border-gray-400 bg-blue-400 text-black">Brief Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--
                            <tr>
                                <td class="p-4 border border-green-800">AskABiker.com</td>
                                <td class="p-4 border border-green-800">Simple, funny Q&A about bikers</td>
                            </tr>
                            <tr>
                                <td class="p-4 border border-green-800">SimpleWalkr</td>
                                <td class="p-4 border border-green-800">Simple walking app with audio announcements</td>
                            </tr>
                            -->
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
    import Inertia from '@inertiajs/inertia'


    export default {
        components: {
            BreezeAuthenticatedLayout,
            Inertia
        },
        methods: {
            hi(){
                console.log('hi from the hi() \'methods:\' function...');
                //console.log(this);

                // try to put this in modal
                this.$inertia.visit('idea',{});
            }
        },
        created(){
            console.log('we are created! ');
            //console.log('this is: ' + JSON.stringify(this));
            axios
              .get('http://127.0.0.1:8000/api/ideas')
              .then(response => (this.info = response))
        },
        data () {
            return {
              info: null
            }
          },
        mounted(){
            console.log('test from the Dashboard.vue component...');

            //var table = $('#myTable').DataTable(this.info);

            // load the datatable with data
            var table = $('#myTable').DataTable( {
              "ajax": {
                "url": "/api/ideas",
                "dataSrc":"",
              },
              "columns" : [
                  { "data" : "id" },
                  { "data" : "codename" },
                  { "data" : "tagline" },
              ],
              "columnDefs": [
                  { "targets" : 0, "visible": false } // hide the 'ID' column (user doesn't want/need to see it)
              ]
            });


            // listen for the onClick event on all table rows (tr)
            $( "#myTable tbody" ).on( "click", "tr", function() {
                //this.hi(); // say hi
                let data = table.row(this).data();
                console.log(data.id);
            });
            //}.bind(this));


/*
                 $('#myTable tbody').on('click', 'tr', function () {
                     var data = table.row( this ).data();
                     alert( 'You clicked on '+data[0]+'\'s row' );
                 } );
*/


        }
    }

</script>


