
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

      <div>
        <p>{{currentDateTime()}}</p>
      </div>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h1 class="text-2xl">My Ideas</h1>
                        <h1 class="text-2xl">My 'Add' Button</h1>
                    </div>
                    <div class="p-6">

                    <table id="myTable" class="mx-auto display table-auto  border-green-400 p-4">
                        <thead>
                            <tr class="p-4 border bg-gray-100">
                                <th class="p-4 border border-gray-400 bg-blue-400 text-black">ID</th>
                                <th class="p-4 border border-gray-400 bg-blue-400 text-black">Codename</th>
                                <th class="p-4 border border-gray-400 bg-blue-400 text-black">Tagline</th>
                                <th class="p-4 border border-gray-400 bg-blue-400 text-black">Last Updated</th>
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


    <v-tailwind-modal name="ideaModal" v-model="showModal" @cancel="cancel" @confirm="confirm" @edit="edit" @save="save">

        <form>
        <p>
            <table id="notMainIdeaTable" class="m-2 p-2 shadow-lg bg-white">
            <!-- <table id="notMainIdeaTable" class="table-fixed grid grid-cols-1 divide-y divide-yellow-500"> -->
              <tr>
                <td class="text-right font-bold w-1/4 bg-blue-100 border text-left px-8 py-4">Codename</td>
                <td class="border px-8 py-4">
                    <span v-if="!showEditFields">{{idea.codename}}</span>
                    <input type="text" v-if="showEditFields" id="codename" name="codename" v-model="idea.codename"/>
                </td>
              </tr>
              <tr>
                <td class="text-right font-bold bg-blue-100 border text-left px-8 py-4">Tagline</td>
                <td class="border px-8 py-4">
                    <span v-if="!showEditFields">{{idea.tagline}}</span>
                    <input type="text" v-if="showEditFields" id="tagline" name="tagline" v-model="idea.tagline"/>
                </td>
              </tr>
              <tr>
                <td class="text-right font-bold bg-blue-100 border text-left px-8 py-4">Description</td>
                <td class="border px-8 py-4">
                    <span v-if="!showEditFields">{{idea.description}}</span>
                    <input type="text" v-if="showEditFields" id="description" name="description" v-model="idea.description"/>
                </td>
              </tr>
              <tr>
                <td class="text-right font-bold bg-blue-100 border text-left px-8 py-4">Updated</td>
                <td class="border px-8 py-4">{{fromNow(idea.updated_at)}}</td>
              </tr>
            </table>
        </p>
        </form>

    </v-tailwind-modal>

</template>


<script>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated'
    import VTailwindModal from '@/Components/VTailwindModal.vue' 
    import Inertia from '@inertiajs/inertia'
    import moment from 'moment'


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
          //console.log('breezeauthlayout.value: ' + breezeauthlayout);
          //console.log(breezeauthlayout);
          //console.log('from setup().onMounted() for breezeauthlayout...');
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
            formatDate(myDatetime) {
                return myDatetime;
            },
            fromNow(datetime){ 
                return window.moment(datetime).fromNow();
            },
            currentDateTime() {
            },
            moment: function () {
                return moment();
            },
            hello(){
                //console.log('hello, world');
            },
            confirm() {
                console.log('We confirmed...');
                this.close();
                this.showModal = false;
            },
            cancel(close) { // looks funky
                // some code...
                //console.log('We canceled...');
                this.close()
            },
            close(){
                //console.log('We closed...');
                this.showModal = false;
                this.showEditFields=false;
                document.getElementById("editsave").innerHTML= 'Edit'; // set back to its original value
            },
            edit(event){
                console.log('we are in the edit(event) method...');
                // if we are coming from the edit state
                if(this.editState===true){

                    // then we must have clicked 'Save'
                    this.editState=false;
                    console.log('Saving...'); 

                    // persist the udated record to the db

                    // show status/'Saved' message

                    // disappear this modal
                    this.showModal = false;
                    // remove the form fields for next modal
                    this.showEditFields=false;
                    // chnage default button to 'Edit' again
                    document.getElementById("editsave").innerHTML= 'Edit'; // do this only after form processed
                }
                else{
                    this.editState=true;
                    console.log('Editing...'); 
                    // we must have clicked 'Edit'
                    this.showEditFields=true;
                    // change the 'Edit' button to say 'Save' now
                    document.getElementById("editsave").innerHTML= 'Save';
                }
            },
            save(){
                this.showModal = false;
                this.close();
                //this.close();
            },
            doModal(){
                console.log('i am in the doModal() method...');
                //this.modal_title='Your Idea';
                //this.modal_body='This is where you dynamic message is going to go.... ';
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
            //console.log('we are created! ');
            //console.log('this is: ' + JSON.stringify(this));
            axios
              .get('http://localhost:8000/api/ideas')
              .then(response => (this.info = response))
        },
        data() {
            return {
                editState: false,
                showEditFields: false,
                showModal: false,
                info: null,
                counter: 0,
                modal_title: '',
                modal_body: '',
                idea: {
                    codename: '',
                    tagline: '',
                    description: '',
                    created_at: '',
                    updated_at: '',  
                } 
            }
          },
        mounted(){
            //console.log('mounted(): test from the Dashboard.vue component\'s mounted() method...');
            //console.log(this.$vfm);
            //console.log(this.$el);
            //this.hello();

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
                  //{ "data" : "description" }, // we are not showing this on this screen
                  { "data" : "updated_at" },
                  //{ "data" : "updated_at_local" },
              ],
              "columnDefs": [
                  { "targets" : 0, "visible": false }, // hide the 'ID' column (user doesn't want/need to see it)
                  { "targets": 3, "data": null, "render": // lame that we have to use this format
                        function ( data, type, row, meta ) { 
                            //return window.moment(data).format('Do MMM YYYY');
                            //console.log('data:');
                            //console.log(data);
                            return window.moment(data).fromNow();
                        }
                    },
                  //{ "targets" : 3, render: $.fn.dataTable.render.moment.utc(d).local().format('DD/MM/YYYY HH:mm:ss')},
              ]
            });

            //console.log('Calling this method from mounted()...');

            // listen for the onClick event on all table rows (tr)
            $( "#myTable tbody" ).on( "click", "tr", {thisArg: this}, function(event) {
                //console.log('this: ' + event.data.this1); // produces '<tr class="even">...</tr>'
                //console.log(event.data.thisArg); // produces '<tr class="even">...</tr>'
                //console.log(this); // produces '<tr class="even">...</tr>'
                let data = myDataTable.row(this).data();
                event.data.thisArg.modal_title=data.codename;
                event.data.thisArg.idea.codename=data.codename;
                event.data.thisArg.idea.tagline=data.tagline;
                event.data.thisArg.idea.description=data.description;
                event.data.thisArg.idea.updated_at=data.updated_at;
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


