import './bootstrap.js' ;

import { createApp } from 'vue'

import Application from './vue/Application.vue'
import Plugins     from './vue/Plugins'

const Vue = createApp( Application ) ;

Plugins.map( Plugin => Plugin( { Application : Vue } ) )

Vue.mount( '#Application' )