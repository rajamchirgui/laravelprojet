import Accueil from './components/accueil.vue';
import Viewsalles from "./components/salles/Viewsalles.vue";
import Addsalle from "./components/salles/Addsalle.vue";
import Editsalle from "./components/salles/Editsalle.vue";
import Addspectacles from "./components/spectacles/Addspectacles.vue";
import Viewspectale from "./components/spectacles/Viewspectale.vue";




export const routes = [
{
name: 'accueil',
path: '/',
component: Accueil
},
{ 
    name:"Addsalle", 
    path:"/addsall/", 
    component:Addsalle
},
{
    name:"Viewsalles",
    path:"/salliste",
    component:Viewsalles
    },
    {
        name:"Editsalle",
        path:"/editsall",
        component:Editsalle
        },
        {
            name:"Addspectacles",
            path:"/spectadd",
            component:Addspectacles
            },
            {
                name:"Viewspectale",
                path:"/spectacl",
                component:Viewspectale
                },
];