<template>
    <header class="container-flex space-between">
        <div class="date">
            <span class="c-gray-1">{{post.published_date}} / {{post.owner.name}}</span>
        </div>
        <div class="post-category">
            <span class="category text-capitalize">
                <category-link :category="post.category"></category-link>
            </span>
        </div>
    </header>
</template>

<script>
    export default{
        props:['post']
    }
</script>