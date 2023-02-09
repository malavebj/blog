<template>
   <section class="posts container">
        <post-list-item v-for="post in items" :post="post" :key="post.id"></post-list-item>
        <article v-if="!items.length" class="post">
            <div class="content-post">
                <h1> Not Posts yet for this Category </h1>
            </div>
        </article>
    </section><!-- fin del div.posts.container -->
</template>



<script>
    export default{
        props:['items']
    }
</script>