<template>
	<div class="form-contact">
		<div v-if="sent">Message was found</div>
		<transition name="fade" mode="out-in"> 
			<form @submit.prevent="submit" v-if="!sent">
				<div class="input-container container-flex space-between">
					<input type="text" v-model="form.name"placeholder="Your Name" class="input-name">
					<input type="email" v-model="form.email" placeholder="Email" class="input-email">
				</div>
				<div class="input-container">
					<input v-model="form.subject" type="text" placeholder="Subject" class="input-subject">
				</div>
				<div class="input-container">
					<textarea v-model="form.message" cols="30" rows="10" placeholder="Your Message"></textarea>
				</div>
				<div class="send-message">
					<button class="text-uppercase c-green">send message</button>
				</div>
			</form>
		</transition>
	</div>
</template>
<script>
	export default{
		data(){
			return{
				sent:false,
				form:{
					name:'Jesus',
					email:'jesus@gmail.com',
					subject:'ayuda',
					message:'solicito ayuda'
				}
			}
		},
		methods:{
			submit(){
				axios.post('api/message',this.form)
				.then(res=>{
					this.sent=true;
				})
				.catch(error=>{
					this.sent=false;
				});
			}
		}
	}
</script>