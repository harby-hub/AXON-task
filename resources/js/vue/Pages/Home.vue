<template>
    <h1 class="font-semibold"> phone numbers </h1>
    <br>
    <div>
        <span> <select @change="change" v-model="Country" >
            <option :value="null" v-text="'select Country'" />
            <option v-for="Country in Global.country" :value="Country" v-text="Country" />
        </select> </span>
        <span style="margin: 1rem ;" > <select @change="change" v-model="Status" >
            <option :value="null" v-text="'select valid'" />
            <option :value="true" v-text="'valid phone number'" />
            <option :value="false" v-text="'unvalid phone number'" />
        </select> </span>
    </div>
    <br>
    <table >
        <tr>
            <th>Country</th>
            <th>Status</th>
            <th>Code</th>
            <th>Phone</th>
        </tr>
        <tr v-if="table.data.length" v-for="row in table.data" >
            <td v-text="row.Country" />
            <td v-text="row.Status ? 'ok' : 'nok'" />
            <td v-text="row.phone.split( ') ' )[ 0 ].substring( 1 )" />
            <td v-text="row.phone.split( ') ' )[ 1 ]" />
        </tr>
        <tr v-else style="" >
            table empty
        </tr>
    </table>
    <br>
    <div>
        <span v-if="table.links.prev" @click="getData( table.links.prev )" > &lt; Previous </span>
        <span v-if="table.links.next" @click="getData( table.links.next )" > Next > </span>
    </div>
</template>

<style>
    table{
        border:solid 2px #eee;
        text-align: center;
        vertical-align:middle;
    }
</style>

<script setup lang="ts">
    import { inject , ref } from 'vue'
    import axios from 'axios'
    interface coustomer{
        Country : string
        Status   : boolean
        Code    : string
        phone   : string
    }
    let Global  = inject< { country : string[ ] , url : string } >( 'Global' )
    let Country = ref< string | null >( null )
    let Status   = ref< boolean | null >( null )
    let table   = ref< { data : coustomer [ ] , links : { prev : string | null , next :string | null } } >( {
        data : [ ] ,
        links : { prev : null , next : null }
    } )
    async function change( url = null ) : Promise< Void > {
        await getData( )
    }
    async function getData( url = null ) : Promise< Void > {
        table.value = ( await axios.get( url ?? Global.url , { params : {
            Country : Country?.value?.toString( ) ,
            Status   : Status?.value?.toString( )
        } } ) ).data
        console.log( table )
    }
</script>
