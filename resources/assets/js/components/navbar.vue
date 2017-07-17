<template>
    <button>hello</button>
</template>

<script>
    var blah = function () {
        if(this.surveyData == "false")
            this.dropdown_text = "damn";
        else
            this.dropdown_text = "dn";
    };

    export default {
        props: ['surveyData'],
        data(){
           return{
               'dropdown_text':this.surveyData,
               'title':'hello'
           }
        },
        mounted() {

        },
        computed: {
            // a computed getter
        },
        watch: {
            // whenever question changes, this function will run

            surveyData: blah
        },

    }
</script>
<style lang="sass">
    
</style>
