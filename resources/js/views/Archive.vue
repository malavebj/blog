<template>
	<section class="pages container">
		<div class="page page-archive">
			<h1 class="text-capitalize">archive</h1>
			<p>Nam efficitur, massa quis fringilla volutpat, ipsum massa consequat nisi, sed eleifend orci sem sodales lorem. Curabitur molestie eros urna, eleifend molestie risus placerat sed.</p>
			<div class="divider-2" style="margin: 35px 0;"></div>
			<div class="container-flex space-between">
				<div class="authors-categories">
					<h3 class="text-capitalize">authors</h3>
					<ul class="list-unstyled">
						<li v-for="author in authors" v-text="author.name"></li>
					</ul>
					<h3 class="text-capitalize">categories</h3>
					<ul class="list-unstyled">
						<li v-for="category in categories" class="text-capitalize">
							<category-link :category="category"></category-link>
						</li>
					</ul>
				</div>
				<div class="latest-posts">
					<h3 class="text-capitalize">latest posts</h3>
					<p v-for="post in posts">
						<post-link :post="post">{{post.title}}</post-link>
					</p>
					<h3 class="text-capitalize">posts by month</h3>
					<ul class="list-unstyled">
						<li v-for="posts in archives">
							<router-link :to="{
										name:'home', 
										params:{month:posts.month,year:posts.year}
									}">
								{{posts.monthName}} {{posts.year}} ({{posts.posts}})
							</router-link>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
	export default {
		data(){
            return{
                authors:[],
				categories:[],
				posts:[],
				archives:[]
            }
        },		
		mounted(){
            axios.get('/api/archive')
            .then(res=>{
                this.authors = res.data.authors
				this.categories = res.data.categories
				this.posts = res.data.posts
				this.archives = res.data.archives
            })
            .catch(err=>{
                console.log(err);
            });
        }
	}	

</script>