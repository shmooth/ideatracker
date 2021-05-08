
<style>
#myTable_filter {
    margin-bottom: 10px;
}
.dataTables_length select{
    width: 70px !important; 
}
</style>

<template>
    <breeze-authenticated-layout ref="breezeauthlayout">
        <!--
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               Home 
            </h2>
        </template>
        -->


    <button @click="hello">Call 'hello()'</button>


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

    <v-tailwind-modal name="ideaModal" v-model="showModal" @confirm="confirm" @cancel="cancel">
      <template v-slot:title>{{modal_title}}</template>
      <p>
        {{modal_body}}
      </p>
    </v-tailwind-modal>

</template>


<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated'
    import VTailwindModal from '@/Components/VTailwindModal.vue' 
    import Inertia from '@inertiajs/inertia'

    // to try 'ref' stuff
    import { onMounted, ref, } from 'vue';

    export default {
      setup() {
        const breezeauthlayout = ref(null);

        // Before the component is mounted, the value
        // of the ref is `null` which is the default
        // value we've specified above.
        onMounted(() => {
          // Logs: `Headline`
          console.log('breezeauthlayout.value: ' + breezeauthlayout);
          console.log(breezeauthlayout);
          console.log('from setup().onMounted() for breezeauthlayout...');
        });

        return {
          // It is important to return the ref, otherwise it won't work.
          breezeauthlayout,
        };
      },
        inheritAttrs: false,
        components: {
            BreezeAuthenticatedLayout,
            VTailwindModal,
            Inertia,
        },
        methods: {
            hello(){
                console.log('hello, world');
            },
            confirm() {
              console.log('We confirmed...');
              this.showModal = false;
            },
            close(){
              console.log('We closed...');
              this.showModal = false;
            },
            cancel(close) { // looks funky
              // some code...
              console.log('We canceled...');
              close()
            },
            doModal(){
                console.log('i am in the doModal() method...');
                this.modal_title='Your Idea';
                this.modal_body='This is where you dynamic message is going to go.... ';
                this.showModal=true;
                //this.$vfm.show('example'); // programmtically show the modal
            },
            hi(){
                console.log('hi(): hi from the hi() method...');

                // try to put this in modal
                //this.$inertia.visit('idea',{});
            }
        },
        created(){
            console.log('we are created! ');
            //console.log('this is: ' + JSON.stringify(this));
            axios
              .get('http://localhost:8000/api/ideas')
              .then(response => (this.info = response))
        },
        data() {
            return {
              showModal: false,
              info: null,
              counter: 0,
              modal_title: '',
              modal_body: '',
            }
          },
        mounted(){
            console.log('mounted(): test from the Dashboard.vue component\'s mounted() method...');
            //console.log(this.$vfm);
            console.log(this.$el);
            this.hello();

            /*
            this.modal_title='Your Idea';
            this.modal_body='This is where you dynamic message is going to go.... ';
            this.$vfm.show('ideaModal', 
                {   modal_title: 'Test Title', modal_body: 'test modal body', userName: 'vue-final-modal' })
                .then(() => {
                    // do something on modal opened
                    console.log('test yo...');
                });
            */

            // load the datatable with data
            var myDataTable = $('#myTable').DataTable( {
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

            console.log('Calling this method from mounted()...');

            // listen for the onClick event on all table rows (tr)
            //$( "#myTable tbody" ).on( "click", "tr", function(event) {
            $( "#myTable tbody" ).on( "click", "tr", {thisArg: this}, function(event) {
                //console.log('this: ' + event.data.this1); // produces '<tr class="even">...</tr>'
                console.log(event.data.thisArg); // produces '<tr class="even">...</tr>'
                //console.log(this); // produces '<tr class="even">...</tr>'
                //this.showModal=true;
                //console.log(this); // produces '<tr class="even">...</tr>'
                //console.log(event.currentTarget); // also produces '<tr class="even">...</tr>'
                //let data = myDataTable.row(event.currentTarget).data();
                //console.log('Idea ID: ' + data.id);
                //this.showModal=true;
                let data = myDataTable.row(this).data();
                event.data.thisArg.modal_title=data.codename;
                event.data.thisArg.modal_body=data.tagline;
                event.data.thisArg.showModal=true;
                event.data.thisArg.hello();
            });

            /*
            $( "#myTable tbody" ).on( "click", "tr", function(event) {
                //console.log(this); // produces 'Proxy {route: ƒ, confirm: ƒ, close: ƒ, cancel: ƒ, …}'
                this.$vfm.showModal=true;
                this.$vfm.doModal();
                console.log('I called doModal()...');
            }.bind(this));
            */

        }
    }

</script>


