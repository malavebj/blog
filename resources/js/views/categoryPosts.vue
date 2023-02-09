<template>
    <paginator componentName="post-list" :url="`/api/categories/${this.category}`"></paginator>
</template>


<script>
    
    export default{
        props:['category'],
    }   
</script>