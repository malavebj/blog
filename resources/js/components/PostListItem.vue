<template>
    <article class="post">
        <div class="content-post">
            <post-header :post="post"></post-header>
            <h1>{{ post.title }}</h1>
            <div class="divider"></div>
            <p v-text="post.excerpt"></p>
            <footer class="container-flex space-between">
                <div class="read-more">
                    <post-link class="text-uppercase c-green" :post="post">Read More</post-link>
                </div>
                <div class="tags container-flex">
                    <span v-for="tag in post.tags" class="tag c-gray-1 text-capitalize">
                        <tag-link :tag="tag"/>
                    </span>
                </div>
            </footer> 
        </div>
    </article>
</template>
<script>
    export default{
        props:['post']
    }
</script>