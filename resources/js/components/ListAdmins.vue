<template>
  <div>
    <v-btn @click="fetchAdmins" color="teal darken-3" dark round>
      refresh
      <v-icon right>
        autorenew
      </v-icon>
    </v-btn>
  <v-data-table
      v-if="!!allAdmins"
    :headers="headers"
    :items="allAdmins"
    hide-actions
    class="elevation-1"
    item-key="id">
    <template v-slot:items="props">
       <td class="text-xs-center">{{ props.item.name }}</td>
       <td class="text-xs-center">
         <div class="text-xs-center">
          <v-btn small dark round color="info" @click="showAdminRoles(props.item.id)">show role</v-btn>
       </div>
       </td>
       <td class="text-xs-center">
         <div class="text-xs-center">

         <v-btn small dark round @click="editAdmin(props.item.id)" color="teal">
           Edit
         </v-btn>

         <v-btn small dark round @click="deleteAdmin(props.item.id)" color="error">
           Delete
         </v-btn>

       </div>
       </td>
     </template>
  </v-data-table>
    <v-dialog
      v-if="showRoles"
      v-model="showRoles"
      max-width="300px"
      transition="tab-reverse-transition">
        <v-card width="300px">
              <v-card-title primary-title class="teal">
                  <h1 class="white--text">{{selectedAdmin.data.name}}'s Roles</h1>
              </v-card-title>
                  <div class=" mt-2 text-xs-center">
              <template v-for="(role,index) in selectedAdmin.roles">
                <h2 :key="index">{{role.role}}</h2>
              </template>
            </div>
        </v-card>
    </v-dialog>
    <v-dialog
      v-if="!!editRoles"
      v-model="editRoles"
      max-width="300px"
      transition="dialog-transition">
        <v-card width="300px">
              <v-card-title primary-title class="teal">
                  <h1 class="white--text">Edit {{selectedAdmin.data.name}}'s Roles</h1>
              </v-card-title>
            <div class="ma-3 text-xs-center">
              <v-form @submit.prevent="applyEditRoles(selectedAdmin.data.id)">

                  <v-text-field
                    label="name"
                    v-model="username"
                  ></v-text-field>
                  
                  <v-text-field
                    label="Email"
                    v-model="email" 
                  ></v-text-field>

                  <v-text-field
                    label="Password"
                    v-model="password"
                  ></v-text-field>

                  <v-text-field
                    label="Confirm Password"
                    class="input-group--focused"
                    single-line
                    v-model="passwordConfirmation"
                  ></v-text-field>
                  <v-select
                  :items="allRoles"
                  v-model="selectedRoles"
                  item-text="role"
                  item-value="id"
                  label="roles"
                  multiple
                ></v-select>

                   <div class="text-xs-center">
                <v-btn
                round
                dark
                class="teal darken-3"
                type="submit">
                    Update
                </v-btn>
            </div>
              </v-form>
          
            </div>
         
        </v-card>
    </v-dialog>
    <v-snackbar
      v-model="done"
    >
      <b>Data Updated Successfully :) </b>
      <v-btn flat color="teal" @click.native="done = false">Close</v-btn>
    </v-snackbar>
</div>

</template>

<script>
export default {
  data(){
    return {

        username:'',
        email:'',
        password:'',
        passwordConfirmation:'',
        headers:[
          {text:'Name',value:'name',align:'center'},
          {text:'Role',value:'id',align:'center'},
          {text:'Action',value:'id',align:'center'},

        ],
        allAdmins:null,
        allRoles: [
            {role:'Admin',id:1},
            {role:'Editor',id:2},
          ],
        showRoles:false,
        editRoles:false,
        selectedRoles:[],
        done:false,
        selectedAdmin:{
          roles:null,
          data:null,
        },
    };
  },
  created(){
    this.fetchAdmins();
  },
  watch:{
        editRoles(n,o){
     
              if(n == false){
                     this.selectedRoles = [];
          this.selectedAdmin.roles = null;
          this.selectedAdmin.data = null;
          this.showRoles=false;
          this.editRoles=false;
              }
        }
  },
  methods:{
    fetchAdmins(){
      axios.post('/admin/list-admins',{})
      .then((response)=>{
          console.log(response.data.admins);
          this.allAdmins = response.data.admins;
      })
      .catch((errors)=>{
          alert('err in fetch');
          console.log(errors.response);
      })
    },
    editAdmin(id){
        
        let index = this.allAdmins.findIndex((val,index)=>{
            return val.id == id;
        });
      this.selectedAdmin.data = this.allAdmins[index];
      this.selectedAdmin.roles = this.allAdmins[index]['roles'];
      this.username = this.selectedAdmin.data.name;
      this.email = this.selectedAdmin.data.email;
      let roles  = this.allAdmins[index]['roles'];
      for (var i = 0; i < roles.length; i++) {
        this.selectedRoles.push(roles[i]['id']);
      }
      this.editRoles = true;
    },

    applyEditRoles(id){
        axios.post('/admin/edit-admin',{
          name:this.username,
          email:this.email,
          password:this.password,
          password_confirmation:this.passwordConfirmation,
          user_id:id,
          roles:this.selectedRoles,
        })
        .then((response)=>{
          console.log(123);
          console.log(response.data);
          this.selectedRoles = [];
          this.selectedAdmin.roles = null;
          this.selectedAdmin.data = null;
          this.showRoles=false;
          this.editRoles=false;
          this.done = true;
        })
        .catch((errors)=>{
            alert('error in editing');
          console.log(errors.response);
        })
    },
    showAdminRoles(id){
        let index = this.allAdmins.findIndex((val,index)=>{
            return val.id == id;
        });
      this.selectedAdmin.data = this.allAdmins[index];
      this.selectedAdmin.roles = this.allAdmins[index]['roles'];
      this.showRoles = true;

    },

    deleteAdmin(id){
        let sure  = confirm("Are you sure ?");
    if (sure) {
        axios.post('/admin/delete-admin',{
          user_id:id,
        })
        .then((response)=>{

            console.log(response.data);
            this.selectedRoles = [];
            this.selectedAdmin.roles = null;
            this.selectedAdmin.data = null;
            this.showRoles=false;
            this.editRoles=false;
              let index =this.allAdmins.findIndex((val)=>{
                return val.id == id;
              });
              this.allAdmins.splice(index,1);
            this.done = true;
        })
        .catch((errors)=>{
          alert('deleting err')
          console.log(errors.response);

        })

    }

    }

  }
}
</script>

<style lang="css" scoped>
</style>
