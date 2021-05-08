
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


    <button @click="doModal">Call 'doModal()'</button>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h1 class="text-2xl">My Ideas</h1>
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
                            <!-- Filled in dynamically by DataTables component -->
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </breeze-authenticated-layout>

    <v-tailwind-modal v-model="showModal" @confirm="confirm" @cancel="cancel">
      <template v-slot:title>Hello, vue-final-modal</template>
      <p>
        Vue Final Modal is a renderless, stackable, detachable and lightweight
        modal component.
      </p>
    </v-tailwind-modal>

<!--
    <vue-final-modal v-model="showModal" name="example">
      This is our modal content...
    </vue-final-modal>
-->

<!--
    <button @click="showModal = true">Launch</button>
-->


</template>


<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated'
    import IdeaModal from '@/Pages/idea.vue' // is this correct??
    import VTailwindModal from '@/Components/VTailwindModal.vue' // is this correct??

    //import VueFinalModal from 'vue-final-modal'

    //import BreezeAuthenticatedLayoutModal from '@/Layouts/AuthenticatedModal'
    // so these imported components -- you just name them whatever you want. awesome.
    //import BreezeAuthenticatedLayoutPeter3 from '@/Layouts/Authenticated'

    import Inertia from '@inertiajs/inertia'


    export default {
        inheritAttrs: false,
        components: {
            BreezeAuthenticatedLayout,
            IdeaModal,
            //BreezeAuthenticatedLayoutModal,
            Inertia,
            //VueFinalModal,
            VTailwindModal,
        },
        methods: {
            confirm() {
              // some code...
              this.showModal = false;
            },
            close(){
              this.showModal = false;
            },
            cancel(close) {
              // some code...
              close()
            },
            doModal(){
                console.log('i am in the doModal() method...');
                this.showModal=true;
                //this.$vfm.show('example');
            },
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
        data() {
            return {
              showModal: false,
              info: null,
              counter: 0,
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
                let data = table.row(this).data();
                //this.$vfm.show('example')
                //document.$vfm.show('example')
                //console.log('Idea ID: ' + Number(data.id));
                console.log('Idea ID: ' + data.id);
            });

        }
    }

</script>


