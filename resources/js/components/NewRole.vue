<template>
  <v-container grid-list-md>
      <v-btn class="info" round @click="role.newRoleDialoge = true">new role <v-icon>add</v-icon> </v-btn>
      <v-dialog
        v-model="role.newRoleDialoge"
        max-width="500px"
        transition="dialog-transition">
          <v-card>
            <v-card-title primary-title class="green">
              <h1 class="white--text">
                New Role
                </h1>

            </v-card-title>

              <div class="text-xs-center pa-4">
                <v-form @submit.prevent="createNewRole">
                      <v-text-field v-model="role.name" outline label="new role name">
                      </v-text-field>
                <div class="text-xs-center">
                    <v-btn round type="submit" color="primary" :disabled="role.name.length == 0"> add </v-btn>
                </div>
                </v-form>
              </div>
          </v-card>
      </v-dialog>
    <v-snackbar
      v-model="role.done"
    >
    <h3 class="white--text">
       Role add successfully :)
     </h3>
      <v-btn flat color="primary" class="success--text" @click.native="role.done = false">Close</v-btn>
    </v-snackbar>
  </v-container>
</template>

<script>
    export default {
      data(){
        return {
          role:{
            newRoleDialoge:false,
            name:'',
            done:false,
          }
        };
      },
      methods:{
        createNewRole(){
          axios.post('/admin/create-role',{
            role:this.role.name
          })
          .then((response)=>{
            console.log(response.data);
            this.role.done= true;
            this.role.newRoleDialoge = false;
            this.role.name='';
          })
          .catch((error)=>{
            alert('error in adding');
            console.log(error.response);
          })
        }
      }

    }
</script>
