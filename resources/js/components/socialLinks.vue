<template>
	<div>
		<li><a 
			:href="`https://www.facebook.com/sharer/sharer.php?url=${url}&title=${description}`" 
			target="_blank">
			<img alt="Share on Facebook" 
				src="/img/flat_web_icon_set/Facebook.png">
			</a>
		</li>

		<li><a 
			:href="`https://twitter.com/intent/tweet?url=${url}&text=${description}&via=Zendero`" 
			target="_blank" 
			title="Tweet">
			<img alt="Tweet" 
				src="/img/flat_web_icon_set/Twitter.png">
			</a>
		</li>

		<li><a 
			:href="`https://plus.google.com/share?url=${url}`" 
			target="_blank" 
			title="Share on Google+">
			<img alt="Share on Google+" 
			src="/img/flat_web_icon_set/Google+.png">
			</a>
		</li>

		<li><a 
			:href="`http://pinterest.com/pin/create/button/?url=${url}&description=${description}`" 
			target="_blank" 
			title="Pin it">
			<img alt="Pin it" 
			src="/img/flat_web_icon_set/Pinterest.png">
			</a>
		</li>
	</div>
</template>
<script>
	export default{
		props:['description'],
		computed:{
			url(){
				return document.URL;
			}
		}
	}

</script>