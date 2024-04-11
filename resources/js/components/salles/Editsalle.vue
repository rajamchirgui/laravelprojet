<template> 
    <div class="col-md-6 offset-md-3 border rounded p-4 mt-2 shadow">      
        <h4 align="center">Modifier Salle</h4> 
<form @submit.prevent="modifierproduit">         
    <div class="row">
                <div class="col-md-6">.
                    <label for="libelle" class="form-label">Libelle</label>
                    <input type="text" class="form-control" id="libelle" v-model="salle.libelle">
                </div>
                <div class="col-md-6 ms-auto">
                    <label for="adresse" class="form-label">Adresse</label>
                    <input type="texte" class="form-control" id="adresse" v-model="salle.adresse">
                </div>
            </div>
                 
  
 
<div class="row"> 
<file-pond 
name="test" 
ref="pond" 
class-name="my-pond" 
label-idle="Drop files here..." 
allow-multiple="false" 
accepted-file-types="image/jpeg, image/png" 
v-bind:files="myFiles" 
v-on:init="handleFilePondInit" 
:server="serverOptions()" 
/> 
</div> 
<br/> 
<button type="submit" className="btn btn-outline-primary"> 
  <router-link to="/salliste">
<i class="fa-solid fa-floppy-disk"></i>Enregister 
</router-link>
</button> 
<router-link to="/salliste" class="btn btn-outline-danger mx-2"> 
<i class="fa-solid fa-xmark"></i>Cancel 
</router-link> 
</form> 
</div>     
</template> 
<script setup> 
import { ref,onMounted } from "vue" ;
import { useRouter,useRoute } from 'vue-router'; 
//import vueFilePond from 'vue-filepond'; 
//import 'filepond/dist/filepond.min.css'; 
//import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
 
//const FilePond = vueFilePond(FilePondPluginImagePreview); 
const myFiles = ref([]); 
const router = useRouter() ; 
const route = useRoute(); 
import axios from 'axios'; 
const salle = ref({}); 
const fetchArticle= async()=> { 
  await 
axios.get(`http://localhost:8000/api/salles/${route.params.id}`).then((res) => 
{ 
                    salle.value = res.data; 
                    }) 
                .catch((err) => {console.error(err)})   
                } 
                onMounted(() => { 
    fetchArticle() ;
            } 
);
       
const  modifierproduit=()=>{    
     axios.put(`http://localhost:8000/api/salles/${route.params.id}`,salle
 .value) 
          .then(() => { 
                router.push('/salliste')}) 
          .catch(error => { 

 
             console.error("There was an error!", error);}) 
} 


 
const serverOptions = () => { console.log('server pond'); 
return { 
    load: (source, load, error, progress, abort, headers) => { 
                    var myRequest = new Request(source); 
                    fetch(myRequest).then(function(response) { 
                      response.blob().then(function(myBlob) { 
                        load(myBlob); 
                      }); 
                    }); 
                  }, 
process: (fieldName, file, metadata, load, error, progress, abort) => { 
const data = new FormData(); 
data.append('file', file); 
data.append('upload_preset', 'GLID5IIT'); 
data.append('cloud_name', 'esps'); 
data.append('public_id', file.name); 
axios.post('https://api.cloudinary.com/v1_1/esps/upload',data) 

 

.catch((error) => { 
console.error('Error uploading file:', error); 
error('Upload failed'); 
abort(); 
}); 
}, 
}; 
}; 
</script> 
<style scoped> 
 
</style>