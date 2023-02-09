<template>
	<nav class="custom-wrapper" id="menu">
	    <div class="pure-menu"></div>
	    <ul class="container-flex list-unstyled">
	        <li>
	            <router-link :to="{name:'home'}" class="text-uppercase">Home</router-link>
	        </li>
	        <li>
	            <router-link :to="{name:'about'}" class="text-uppercase">About</router-link>
	        </li>
	        <li>
	            <router-link :to="{name:'archive'}" class="text-uppercase">Archive</router-link>
	        </li>
	        <li>
	            <router-link :to="{name:'contact'}" class="text-uppercase">Contact</router-link>
	        </li>
	    </ul>
	</nav>
</template>