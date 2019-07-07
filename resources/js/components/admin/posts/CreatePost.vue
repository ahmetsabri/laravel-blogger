<template>

    <v-container grid-list-md>
        <v-content>
            
                <v-layout row wrap>
                    <v-flex xs12>
                            <h1 class="text-xs-center indigo--text">
                                Create A new Post
                            </h1>       
                    </v-flex>

                    <v-flex xs1>
                            <div class="text-xs-center">
                                <v-tooltip top>
                                          <template v-slot:activator="{ on }">
                                 <v-btn icon dark color="indigo" v-on="on">
                                     <v-icon>add_a_photo</v-icon>
                                </v-btn>        
                                          </template>
                                <span>insert image</span>
                                </v-tooltip>
                            </div>
                    </v-flex>


                    <v-flex xs1>
                            <div class="text-xs-center">
                                
                                         <v-tooltip top>
                                          <template v-slot:activator="{ on }">
                                 <v-btn icon dark color="indigo" v-on="on">
                                     <v-icon>format_bold</v-icon>
                                </v-btn>        
                                          </template>                                     <span>Bold</span>  
                                         </v-tooltip>
                            </div>
                    </v-flex>

                    <v-flex xs1>
                            <div class="text-xs-center">
                                
                                         <v-tooltip top>
                                          <template v-slot:activator="{ on }">
                                 <v-btn icon dark color="indigo" v-on="on">
                                    H1
                                </v-btn>        
                                          </template>                                     <span>Heading</span>  
                                         </v-tooltip>
                            </div>
                    </v-flex>

                    <v-flex xs1>
                            <div class="text-xs-center">
                                
                                         <v-tooltip top>
                                          <template v-slot:activator="{ on }">
                                 <v-btn icon dark color="indigo" v-on="on">
                                     h2
                                </v-btn>        
                                          </template>                                     <span>Heading</span>  
                                         </v-tooltip>
                            </div>
                    </v-flex>

                    <v-flex xs1>
                            <div class="text-xs-center">
                                
                                         <v-tooltip top>
                                          <template v-slot:activator="{ on }">
                                 <v-btn icon dark color="indigo" v-on="on">
                                     h3
                                </v-btn>        
                                          </template>                                     <span>Heading</span>  
                                         </v-tooltip>
                            </div>
                    </v-flex>


                    <v-flex xs1>
                            <div class="text-xs-center">
                                    <v-tooltip top>
                            <template v-slot:activator="{ on }">
                                 <v-btn icon dark color="indigo" v-on="on">
                                     <v-icon>format_italic</v-icon>
                                </v-btn>        
                            </template>
                            <span>Italic</span>
                            </v-tooltip>
                            </div>
                    </v-flex>

                    <v-flex xs1>
                            <div class="text-xs-center">
                                <v-tooltip top>
            <template v-slot:activator="{ on }">
                      
                                 <v-btn icon dark color="indigo" v-on="on">
                                     <v-icon>format_list_bulleted</v-icon>
                                </v-btn>        
            </template>
                        <span>unordered list</span>
                                    </v-tooltip>
 
                            </div>
                    </v-flex>


                    <v-flex xs1>
                            <div class="text-xs-center">
                                            <v-tooltip top>
            <template v-slot:activator="{ on }">
                      
                                 <v-btn icon dark color="indigo" v-on="on">
                                     <v-icon>insert_link</v-icon>
                                </v-btn>        
            </template>
                        <span>insert link</span>
                                    </v-tooltip>
      
                            </div>
                    </v-flex>

                      <v-flex xs1>
                            <div class="text-xs-center">
                                              <v-tooltip top>
            <template v-slot:activator="{ on }">
                      
                                 <v-btn icon dark color="indigo" v-on="on">
                                     <v-icon>format_align_right</v-icon>
                                </v-btn>        
            </template>
                        <span>align right</span>
                                    </v-tooltip>
  
                            </div>
                    </v-flex>
                      <v-flex xs1>
                            <div class="text-xs-center">
                                <v-tooltip top>
                              <template v-slot:activator="{ on }">
                      
                                 <v-btn icon dark color="indigo" v-on="on">
                                     <v-icon>format_align_center</v-icon>
                                </v-btn>        
            </template>
                        <span>align center</span>
                                    </v-tooltip>       
                            </div>
                    </v-flex>
                      <v-flex xs1>
                            <div class="text-xs-center">
                                <v-tooltip top>
                             <template v-slot:activator="{ on }">
                      
                                 <v-btn icon dark color="indigo" v-on="on">
                                     <v-icon>format_align_left</v-icon>
                                </v-btn>        
            </template>
                        <span>align left</span>
                                    </v-tooltip>      
                            </div>
                    </v-flex>
                <v-flex xs12>
                                <v-text-field
                                    placeholder="write an amazing post"
                                    textarea
                                    no-resize
                                    height="700px"
                                ></v-text-field>
                                
                                <div class="text-xs-center">
                    <v-btn color="success" round>
                        publish
                    </v-btn>
                    <v-btn color="info" round>
                        preview
                    </v-btn>
                </div>
                
                </v-flex>
                </v-layout>
        </v-content>

    </v-container>

</template>

<script>
export default {
            data(){
                return{
                };
            }
}
</script>

<style scoped>

</style>
