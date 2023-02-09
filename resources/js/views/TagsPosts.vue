<template>
    <paginator componentName="post-list" :url="`/api/tags/${this.tag}`"></paginator>
</template>


<script>
    
    export default{
        props:['tag']
    }   
</script>