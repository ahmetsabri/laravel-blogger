<v-toolbar app>
<v-toolbar-side-icon @click="drawer=!drawer"></v-toolbar-side-icon>
<v-toolbar-title>admin panel</v-toolbar-title>
<v-spacer></v-spacer>
<v-toolbar-items class="hidden-sm-and-down">
</v-toolbar-items>
</v-toolbar>
<v-navigation-drawer
v-model="drawer"
app
class="white--text"
dark>
<v-list>
<v-list-tile href="/admin/new-role">
  <h1>Roles</h1>
</v-list-tile>
<v-list-tile href="/admin/new-admin">
  <h1>Admins</h1>
</v-list-tile>
<v-list>
<v-list-tile href="/admin/posts">
  <h1>Users</h1>
</v-list-tile>
<v-list>
<v-list-tile  href="/">
  <h1>Categories</h1>
</v-list-tile>
<v-list>
<v-list-tile  href="/admin/new-post">
    <h1>Post</h1>
</v-list-tile>
</v-list>
</v-navigation-drawer>
