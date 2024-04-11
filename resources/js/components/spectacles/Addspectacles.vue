<template>
    <div class="col-md-6 offset-md-3 border rounded p-4 mt-2 shadow">
        <h4 align="center">Ajout Speciale</h4>
        <form @submit.prevent="Addspectacle">
          
            <div class="row">
                
                <div class="col-md-6 ms-auto">
                    <label for="spectacle" class="form-label">datespectacle</label>
                    <input type="texte" class="form-control" id="datespectacle" v-model="spectacle.datespectacle">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 ms-auto"> 
        <label for="piece" class="form-label">Piece </label> 
        <select class="form-control" v-model="spectacle.pieceID"> 
          <option v-for="pc in Pieces" :key="pc.id" :value=pc.id>{{pc.titre}}</option> 
       </select>   
 
  
    </div> 
                <div class="col-md-6 ms-auto"> 
        <label for="salle" class="form-label">Salle </label> 
        <select class="form-control" v-model="spectacle.salleID"> 
          <option v-for="sc in Salles" :key="sc.id" :value=sc.id>{{sc.libelle}}</option> 
       </select>   
 
  
    </div> 
            </div>
           
            <br />
            <button type="submit" class="btn btn-outline-primary">
                <i class="fa-solid fa-floppy-disk"></i>Enregister
            </button>
            <router-link to="/spectacl" class="btn btn-outline-danger
mx-2">
                <i class="fa-solid fa-xmark"></i>Cancel
            </router-link>
        </form>
    </div>
</template>

<script setup>
 
import { ref ,onMounted} from "vue"
import { useRouter } from 'vue-router';
import axios from 'axios';
const router = useRouter()
const spectacle = ref({})
const Salles = ref([]); 
const Pieces = ref([]); 
const getsalles=()=>{ 
           
          axios.get('http://localhost:8000/api/salles').then(res => { 
              Salles.value = res.data; 
                  }).catch(error => { 
                      console.log(error) 
                  }); 
       
               } 


const getPieces=()=>{ 
           
          axios.get('http://localhost:8000/api/pieces').then(res => { 
            Pieces.value = res.data; 
                  }).catch(error => { 
                      console.log(error) 
                  }); 
       
               } 
const Addspectacle = async () => {
    await axios.post("http://localhost:8000/api/spectacles/",spectacle.value)
        .then(() => (
            router.push({ name:'Viewspectale' })

        ))
        .catch(err => console.log(err))
}
    onMounted(() => { 
    getsalles(); 
    getPieces();
} 
); 

</script>

<style scoped></style>
