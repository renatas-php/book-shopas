<template>
<div>   
    
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