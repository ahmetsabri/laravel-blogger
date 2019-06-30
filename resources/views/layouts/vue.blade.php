<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
  <div id="app">
    <v-app>
      <v-content>
      @include('includes.toolbar')
      @yield('content')
    </v-content>
    </v-app>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.js"></script>

  <script>
      new Vue({
        el:'#app',
        data(){
          return {
            drawer:false,
          };
        },
        methods:{
          hello(){
            alert();
          },
          createNewRole(){
            this.$http.get('/').then((re)=>{console.log(re);}).catch((er)=>{console.log(er);});
          }
        },
      },

    )
    </script>
</body>
</html>
