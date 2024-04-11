<template>
  
  <div>
    <div v-if="isLoading">
      <h2>Loading ....</h2>
    </div>
    <div v-else class="py-6">
      <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
          <router-link :to="{ name: 'Viewsalles' }" class="btn btn-outline-light">
            <i ></i> Liste des  Salle
          </router-link>
        </div>
      </nav>
      <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
          <router-link :to="{ name: 'Addspectacles' }" class="btn btn-outline-light">
            <i class="fa-solid fa-square-plus"></i> New Spectacle
          </router-link>
        </div>
      </nav>

      <table class="table table-striped shadow">
        <thead>
          <tr>
            <th scope="col">Date Spectacle</th>
            <th scope="col">Piece</th>
            <th scope="col">Salle</th>
            <th scope="col">Supprimer</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(spectac, index) in spectacles" :key="index">
            <td>{{ spectac.datespectacle }}</td>
            <td>{{ pieceNames[index] }}</td>
            <td>{{ salleNames[index] }}</td>
            <!-- <td>
              <button class="btn btn-outline-warning mx-2" @click="editerspectacle(spectac.id)">
                <i class="fa-solid fa-pen-to-square"></i>
                Editer
              </button>
            </td> -->
            <td>
              <button class="btn btn-outline-danger mx-2" @click="deletespectacle(spectac.id)">
                <i class="fa-solid fa-trash-can"></i>
                Supprimer
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const spectacles = ref([]);
const pieceNames = ref([]);
const salleNames = ref([]);

const isLoading = ref(true);


const gespectacles = () => {
axios.get('http://localhost:8000/api/spectacles')
  .then(res => {
    spectacles.value = res.data;
    const promises = res.data.map(spectac => getPieceName(spectac.pieceID));
    const sallePromises = res.data.map(spectac => getsalleName(spectac.salleID));

    Promise.all([...promises, ...sallePromises]) // Combine les deux tableaux de promesses
      .then(names => {
        pieceNames.value = names.slice(0, res.data.length); // Utiliser la longueur correcte
        salleNames.value = names.slice(res.data.length); // Mettre à jour salleNames avec la valeur correcte

        isLoading.value = false;
      })
      .catch(error => {
        console.error(error);
        isLoading.value = false;
      });
  })
  .catch(error => {
    console.error(error);
    isLoading.value = false;
  });
};

const getPieceName = async function(pieceID) {
  try {
    const response = await axios.get(`http://localhost:8000/api/pieces/${pieceID}`);
    return response.data.titre;
  } catch (error) {
    console.error(error);
    return 'Pièce introuvable';
  }
};
const getsalleName = async function(salleID) {
  try {
    const response = await axios.get(`http://localhost:8000/api/salles/${salleID}`);
    return response.data.libelle;
  } catch (error) {
    console.error(error);
    return 'salle$ introuvable';
  }
};

const editerSpectacle = async (spectacleID) => {
  // Logique pour éditer un spectacle
};

const deletespectacle = async (spectacleID) => {
  // Logique pour supprimer un spectacle
};

onMounted(() => {
  gespectacles();
});
</script>

<style lang="scss" scoped>
/* Styles spécifiques pour ce composant */
</style>