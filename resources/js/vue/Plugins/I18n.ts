// import { createI18n } from 'vue-i18n'
// import { Global } from '../stores'
// import messages from '../locale'

export default function ( { Application } ) {
    // const local = createI18n( { messages ,
    //     locale         : Global( ).lang ?? 'en' ,
    //     fallbackLocale : 'en' ,
    // } ) ;
    // Application.use( local )
    // Application.provide( 'local' , ( path : string ) => {
    //     return ( type : string ) : string => {
    //         return local.global.t( path + '.' + type ) ;
    //     }
    // } )
}
declare module '@vue/runtime-core' {
    interface ComponentCustomProperties  {
        local : { ( path : string ) : string ; }
    }
}