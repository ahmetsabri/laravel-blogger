require('./bootstrap');
import Vue from 'vue';
import Vuetify from 'vuetify';
import newRole from './components/NewRole.vue';
import newAdmin from './components/NewAdmin.vue';
Vue.use(Vuetify);

 new Vue({
   el:'#app',
   data(){
     return {
       drawer:false,
     };
   },
   components:{
     newRole,
     newAdmin,
   }
 }
  )
