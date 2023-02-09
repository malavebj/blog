<template>
    <section class="post image-w-text container">
    <div class="content-post">      
      <post-header :post="post"></post-header>
      <h1>{{post.title}}</h1>
      <div class="divider"></div>
      <figure class="block-left"><img src="/img/img-post-2.png" alt=""></figure>
      <div>
        {{post.body}}
      </div>
      </div>

        <footer class="container-flex space-between">
          <div class="buttons-social-media-share">
            <ul class="share-buttons">
              <social-links :descripcion="post.name" />
            </ul>
          </div>
          <span v-for="tag in post.tags" class="tag c-gray-1 text-capitalize">
              <tag-link :tag="tag"/>
          </span>
      </footer>
      <div class="comments">
        <div class="divider"></div>
        <disqus-comments />
      </div><!-- .comments -->
    </div>
  </section>
</template>

<script type="text/javascript">
  export default{
    data(){
      return{
          post:{
            owner:{},
            category:{}
          }
      }
    },
    props:['url'],
    mounted(){
      axios.get(`/api/blog/${this.url}`)
      .then(res=>{
        this.post=res.data;
      })
      .catch(err=>{
        console.log(err);
      });
    }
  }
</script>