<template>
	<div class="row">
    <div class="col-md-12">
	     <div class="w3-card w3-white w3-padding w3-margin-bottom text-right">
	        <div class="" id="posting">
						<form @submit.prevent method="post">
							<validation-provider name="status" rules="required|min:25|max:250" v-slot="{ errors }">
								 <textarea dir="auto" id="status" name="status" class="form-control w3-right-align user_text" placeholder="شارك استفسارك او مشكلتك التقنية في اقل من 250 حرف" rows="4" v-model="status" ></textarea>
								  	<span v-show="errors[0]" :class="{'form-control': true, 'alert-danger text-right': errors[0] }">
								      {{ errors[0] }}
								    </span>
							 </validation-provider>
							 <input type="hidden" name="_token" :value="csrf">
							 <input type="submit" @click="post_status" class="btn custom-blue-bg w3-padding w3-margin" value="نشر" />
						 </form>
					</div>
	    	</div>
    	</div>
  </div>
</template>


<script>
	export default {
		data() {
			return {
				status: '',
				csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
			}
		},
		methods: {
			post_status(){
				axios.post('/status',{
					status: this.status,
					_token: this.csrf
				}).then((response) => {
					this.status = '';
                    this.$emit('new', response.data);
                    document.getElementById('status').value = '';
                })
			}
		}

	}
</script>


<style>


</style>
