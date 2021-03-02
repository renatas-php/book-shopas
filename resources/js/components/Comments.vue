<template>
<div>   
    <div class="n" v-for="comment in comments">
		<div class="comment" >
			<div class="comment-author">
				<img src="">
				<h2>{{ comment.user_id }}</h2>
			</div>
			<div class="user-rating">
                {{ comment.rating }}
			</div>
			<div class="actual-comment">
			<p>{{ comment.comment }}<span></span></p>
			</div>
            
		</div>
    </div>
</div>
</template>

<script>
    export default {
        data() {
            return {
                comments: [],
            }
        },

        mounted() {
           	axios.get('./comments')
				.then(response => {
                    console.log(response.data);
					this.comments = response.data;
				});
        },

        methods: {
		// Our method to GET results from a Laravel endpoint
        }
    }
</script>