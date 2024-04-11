<template>
 <div>
        <div v-if="isLoading">
            <h2> Loading .... </h2>
        </div>
        <div v-else class="py-6">
            <nav class="navbar navbar-expand-lg navbar-dark bg-success">
                <div class="container-fluid">
                    <router-link :to="{ name: 'Viewspectale' }" class="btn btn-outline-light">
                        <i ></i> Retour Liste des Spectacles
                    </router-link>
                </div>
            </nav>
            <nav class="navbar navbar-expand-lg navbar-dark bg-success">
                <div class="container-fluid">
                    <router-link :to="{ name: 'Addsalle' }"class="btn btn-outline-light">
                        <i class="fa-solid fa-square-plus"></i> New salle
                    </router-link>
                </div>
            </nav>
      
          <table class="table table-striped shadow">
              <thead>
                  <tr>
                      <th scope="col">Libelle</th>
                      <th scope="col">Adresse</th>
                      <th scope="col">modification</th>
                      <th scope="col">suppression</th>
                  </tr>
              </thead>
              <tbody>
                <tr v-for="sall in salles" :key="sall.id">

                      <td>{{sall.libelle}}</td>
                      <td>{{sall.adresse}}</td>
                  
                      <td> 
<router-link :to="{name:'Editsalle', params:
{id:sall.id }}" 
class="btn btn-outline-warning mx-2"> 
<i class="fa-solid fa-pen-to-square"></i> 
Modifier 
</router-link> 

</td> 
                      <td><button class="btn btn-outline-danger mx-2" @click="deletesalle(sall.id)">
                              <i class="fa-solid fa-trash-can"></i>
                              Delete
                          </button></td>
                  </tr>
              </tbody>
          </table>
      </div>
  </div>
</template>
  
<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
const salles = ref([])
const isLoading = ref(true)
const getsalles = async () => {
    await axios.get("http://localhost:8000/api/salles")
        .then(res => {
            salles.value = res.data
            isLoading.value = false
        })
        .catch(error => {
            console.log(error)
        })
}
onMounted(() => {
    console.log(salles)
    getsalles();
});
const deletesalle = async (id) => {
    if (window.confirm("Etes-vous sûr de vouloir supprimer ?")) {
        try {
            await axios.delete(`http://localhost:8000/api/salles/${id}`)
            getsalles()
        } catch (error) {
            console.log(error)
        }
    }
}
</script>
<style lang="scss" scoped></style>