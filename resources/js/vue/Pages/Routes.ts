export default [ { path : '/' , component : ( ) => import( '../layouts/layout.vue' ) , children : [
    { path : '/' , name : 'Home' , component : ( ) => import( './Home.vue' ) } ,
] } ]