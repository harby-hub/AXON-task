import { createRouter , createWebHashHistory } from 'vue-router' ;

import routes from '../Pages/Routes'

export default function ( { Application } ) {
    Application.use( createRouter( { routes ,
        history : createWebHashHistory( ) ,
    } ) )
}