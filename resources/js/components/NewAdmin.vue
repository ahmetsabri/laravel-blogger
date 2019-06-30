<template>
  <v-container grid-list-md>
<v-content>

  <v-btn round color="indigo" dark @click="newAdminDialoge = true">
    new admin <v-icon>add</v-icon>
  </v-btn>

  <v-dialog
    v-model="newAdminDialoge"
    max-width="500px"
    transition="dialog-transition">
        <v-card>
          <v-card-title primary-title class="green white--text">
              <div class="text-xs-center">
                <h1 class="text-xs-center">Create New Admin</h1>
              </div>
            </v-card-title>
            <div class="text-xs-center">
              <v-btn round dark color="teal" @click="newUser = !newUser">new user</v-btn>
              <v-btn round dark color="teal" @click="newUser = false">current user</v-btn>
            </div>
              <template v-if="newUser">
                <h3 class="text-xs-center">New Admin</h3>
                  <v-form @submit.prevent="createNewAdmin" class="pa-3">
                      <v-text-field placeholder="name" v-model="name"></v-text-field>
                      <v-text-field placeholder="email" v-model="email"></v-text-field>
                      <v-text-field placeholder="password" type="password" v-model="password"></v-text-field>
                      <v-text-field placeholder="password confrim" type="password" v-model="passwordConfirmation"></v-text-field>
                      <v-select
                        :items="roles"
                        item-text="role"
                        item-value="id"
                        v-model="selectedRoles"
                        label="role"
                        multiple
                      ></v-select>
                        <div class="text-xs-center">
                              <v-btn type="submit" :disabled="false" round class="success white--text">
                                create
                              </v-btn>
                              {{selectedRoles}}
                        </div>
                </v-form>
            </template>
            <template v-else>
              <h3 class="text-xs-center">Current Admin</h3>
              <v-form @submit.prevent="addRole" class="pa-4">
                  <v-text-field placeholder="username" v-model="searchName" ></v-text-field>
                  <v-list v-if="!!searchResults">
                    <template v-for="(result,index) in searchResults">
                      <v-list-tile @click="selectUser(index)">
                          {{result.name}}
                      </v-list-tile>
                    </template>
                  </v-list>
                  <template v-if="!!selctedResult">
                  <h3>Name : {{selctedResult.name}}</h3>
                  <h3>Email : {{selctedResult.email}}</h3>
                  <h3>Current Roles</h3>
                  <template v-for="role in selctedResult.roles">
                      <li class="ml-4">                          <h3>{{role.role}}</h3>
                        </li>
                  </template>
                  <v-select
                    :items="roles"
                    item-text="role"
                    item-value="id"
                    v-model="selectedRoles"
                    label="role"
                    multiple
                  ></v-select>
                  </template>
                  <div class="text-xs-center">
                    <v-btn type="submit"
                    :disabled="false"
                    round
                    class="success white--text">
                      Add Role
                    </v-btn>
                  </div>
              </v-form>
            </template>
        </v-card>
  </v-dialog>
      <v-snackbar
        v-model="done"
      >
      <b>      Admin Added Successfully :) </b>
        <v-btn flat color="primary" @click.native="done = false">Close</v-btn>
      </v-snackbar>
</v-content>
</v-container>
</template>

<script>
import axios from 'axios';
export default {
  data(){
    return {
        newAdminDialoge:false,
        newUser:true,
        searchName:'',
        name:'',
        email:'',
        password:'',
        passwordConfirmation:'',
        searchResults:null,
        selctedResult:null,
        roles:[
          {role:'Admin',id:1},
          {role:'Editor',id:2},
        ],
        selectedRoles:[],
        done:false,
    };
  },
    computed:{
      allIsFilled(){
        if (this.name.length > 0 && this.email.length > 0 && this.password.length > 0 && this.passwordConfirmation.length > 0) {
            if (this.passwordConfirmation == this.password) {
                return true;
            }
            else{
              return  false;
            }
        }
        else{
          return false;
        }
      },
    },
    watch:{
      searchName(newValue){
        if (newValue.length >= 3) {
              this.searchUser();
        }
      }
    },
  methods:{
      createNewAdmin(){
        console.log(this.selectedRoles);
          axios.post('/admin/create-admin',{
            name:this.name,
            email:this.email,
            password:this.password,
            password_confirmation:this.passwordConfirmation,
            roles:this.selectedRoles,
          })
          .then((response)=>{
            console.log(response.data);
            this.done = true;
            this.newAdminDialoge = false;
            this.name = '';
            this.email = '';
            this.password = '';
            this.passwordConfirmation = '';
            this.selectedRoles = [];

          })

          .catch((error)=>{
              alert(0);
              console.log(error.response);
          })
      },
      searchUser(){
          axios.post('/admin/search-user',{
            word:this.searchName,
          })
          .then((response)=>{
            console.log(response.data);
            this.searchResults = response.data.results;
          })
          .catch((error)=>{
            console.log(error.response);
          })
      },
      selectUser(index){

        this.selctedResult = this.searchResults[index];
        this.selectedRoles = this.searchResults[index]['roles']
        this.searchResults = null;
        this.word = '';
      },
      addRole(){
        console.log(this.selectedRoles);
          axios.post('/admin/add-role',{
            user_id :this.selctedResult.id,
            roles:this.selectedRoles,
          })
          .then((response)=>{
            this.done = true;
            this.newAdminDialoge = false;

            this.name = '';
            this.email = '';
            this.password = '';
            this.passwordConfirmation = '';

            this.searchResults = null;
            this.selctedResult = null;

            this.searchName = '';
            this.selectedRoles = [];

          })
          .catch((errors)=>{
            alert(0.0);
            console.log(errors.response);
          })
      }
  }

}
</script>

<style lang="css" scoped>
</style>
