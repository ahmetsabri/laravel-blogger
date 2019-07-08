<template>

    <v-container grid-list-md>
        <v-content>
            
                <v-layout row wrap>
                    <v-flex xs12>
                            <h1 class="text-xs-center indigo--text">
                                Create A new Post
                            </h1>       
                    </v-flex>
                        <v-flex xs12>
                            {{activeFeatures}}
                        </v-flex>
                        <template v-if="!preview">
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
                                 <v-btn @click="activeFeature('font-weight:bold;')" icon dark color="indigo" v-on="on">
                                     <v-icon>format_bold</v-icon>
                                </v-btn>        
                                          </template>                                     <span>Bold</span>  
                                         </v-tooltip>
                <h5 v-show="activeFeatures.indexOf('font-weight:bold;') > -1">active</h5>
                            </div>
                    </v-flex>

                    <v-flex xs1>
                            <div class="text-xs-center">
                                
                                         <v-tooltip top>
                                          <template v-slot:activator="{ on }">
                                 <v-btn @click="activeFeature('font-size:36px;')" icon dark color="indigo" v-on="on">
                                    H1
                                </v-btn>        
                                          </template>                                     <span>Heading</span>  
                                         </v-tooltip>
                <h5 v-show="activeFeatures.indexOf('font-size:36px;') > -1">active</h5>

                            </div>
                    </v-flex>

                    <v-flex xs1>
                            <div class="text-xs-center">
                                
                                         <v-tooltip top>
                                          <template v-slot:activator="{ on }">
                                 <v-btn  @click="activeFeature('font-size:28px;')" icon dark color="indigo" v-on="on">
                                     h2
                                </v-btn>        
                                          </template>                                     <span>Heading</span>  
                                         </v-tooltip>
                                           <h5 v-show="activeFeatures.indexOf('font-size:28px;') > -1">active</h5>
 
                            </div>
                    </v-flex>

                    <v-flex xs1>
                            <div class="text-xs-center">
                                
                                         <v-tooltip top>
                                          <template v-slot:activator="{ on }">
                                 <v-btn  @click="activeFeature('font-size:20px;')" icon dark color="indigo" v-on="on">
                                     h3
                                </v-btn>        
                                          </template>                                     <span>Heading</span>  
                                         </v-tooltip>
                                        <h5 v-show="activeFeatures.indexOf('font-size:20px;') > -1">active</h5>

                            </div>
                    </v-flex>


                    <v-flex xs1>
                            <div class="text-xs-center">
                                    <v-tooltip top>
                            <template v-slot:activator="{ on }">
                                 <v-btn  @click="activeFeature('font-style:italic;')" icon dark color="indigo" v-on="on">
                                     <v-icon>format_italic</v-icon>
                                </v-btn>        
                            </template>
                            <span>Italic</span>
                            </v-tooltip>
                <h5 v-show="activeFeatures.indexOf('font-style:italic;') > -1">active</h5>

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
                      
                                 <v-btn  @click="activeFeature('text-align:right;')" icon dark color="indigo" v-on="on">
                                     <v-icon>format_align_right</v-icon>
                                </v-btn>        
            </template>
                        <span>align right</span>
                                    </v-tooltip>
                  <h5 v-show="activeFeatures.indexOf('text-align:right;') > -1">active</h5>

                            </div>
                    </v-flex>
                      <v-flex xs1>
                            <div class="text-xs-center">
                                <v-tooltip top>
                              <template v-slot:activator="{ on }">
                      
                                 <v-btn @click="activeFeature('text-align:center;')" icon dark color="indigo" v-on="on">
                                     <v-icon>format_align_center</v-icon>
                                </v-btn>        
            </template>
                        <span>align center</span>
                                    </v-tooltip> 
            <h5 v-show="activeFeatures.indexOf('text-align:center;') > -1">active</h5>
      
                            </div>
                    </v-flex>
                      <v-flex xs1>
                            <div class="text-xs-center">
                                <v-tooltip top>
                             <template v-slot:activator="{ on }">
                      
                                 <v-btn @click="activeFeature('text-align:left;')" icon dark color="indigo" v-on="on">
                                     <v-icon>format_align_left</v-icon>
                                </v-btn>        
                            </template>
                        <span>align left</span>
                                    </v-tooltip>      
    <h5 v-show="activeFeatures.indexOf('text-align:left;') > -1">active</h5>

                            </div>
                    </v-flex>
                        </template>
                    <v-flex xs12>
                        <div class="text-xs-center">
                              <v-btn color="info" round @click="preview = !preview">
                        {{preview ? 'back to edit' : 'preview' }}
                    </v-btn>
                        </div>
                    </v-flex>
                <v-flex xs12>
                    <v-textarea
                        placeholder="write an amazing post"
                        outline
                        no-resize
                        v-show="!preview"
                        height="400px"
                        v-model="post"
                    ></v-textarea>
                    
                                <div class="text-xs-center">
                    <v-btn color="success" round v-show="!preview">
                        publish
                    </v-btn>
                  
                </div>
                </v-flex>
                <v-flex xs12 v-show="preview">
                    <div v-html="postArray.join('')">
                    </div>
                </v-flex>
                </v-layout>
        </v-content>

    </v-container>

</template>

<script>
import { log } from 'util';
import { stringify } from 'querystring';
export default {
            data(){
                return{
                        preview:false,
                        postArray:[],
                        post : '',
                        activeFeatures:[],
                        startPoint:0,
                        endPoint:0,
                        stylo:'',
               };
            },
            
            computed:{

            },

            watch:{

                        post(n,o){


                            console.log(this.startPoint)
                        
                        },

                        activeFeatures(n,o){
                            
                            
                        },



            },

            methods:{
                   
                   activeFeature(feature){

                        let isActive = this.activeFeatures.indexOf(feature) > -1;
                        if(isActive){
                            let index = this.activeFeatures.indexOf(feature);
                            this.activeFeatures.splice(index,1);        
                        }
                        else{
                            
                       this.activeFeatures.push(feature);
                       let stylo = this.activeFeatures.join('');
                       console.log(stylo);
                                               }

                   }

            },


}
</script>

<style scoped>

</style>
