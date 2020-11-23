<template>
	<!-- status section -->
      <!-- To Output Users Status -->
	      <div class="row">
	        <div v-for="status in statuses" :key="status.id" class="col-lg-12">



	          <div class="w3-card w3-white w3-padding w3-margin-top" :id="`status_${status.id}`">
              <div style="width: 55px;margin-left: 15px;" class="disable_float_and_width_on_small_screen">
    	           <a :href="`/profile/${ status.user.username }`">
    	              <img v-if="status" :src="status.user.image" class="w3-circle" height="55" width="55" alt="user avatar">
                    <p class="w3-text-blue">{{ status.user.name }}</p>
                  </a>
  	          </div>
	            <span class="w3-left w3-opacity" dir="auto"> {{ moment(status.created_at).fromNow() }}  </span>

	            <br>
	            <p dir="auto" class="w3-right-align user_text">{{ status.body }}</p>

	            <a href="javascript:void(0)" @click="like( status.id )" class="w3-left w3-text-blue"><span class="fa fa-thumbs-o-up"></span> Like </a>
              <span class="fa fa-comment-o custom-color w3-left w3-margin-left" style="padding-top: 3px;" @click="comment_section( status.id )" id="social_send_message"></span>

	            <span dir="auto" :id="`likes-${ status.id }`" class="badge badge-default btn w3-right" style="display: block;">
	            	{{ status.likes }} Likes
	            </span>


	            <!-- comments section -->
	            <div :id="`commentfor-${status.id}`" class="comments-wrap" style="display: none;">
	            	<div v-for="comment in status.comments" id="comment-box" :key="comment.id" class="w3-light-grey w3-margin-bottom w3-card w3-padding">
		            	 <div class="w3-right">
	                    <a :href="`/profile/${ comment.user.username }`">
	                     <img :src="comment.user.image" id="comment_userImage" :value="comment.user.image" class="w3-circle" height="55" width="55" :alt="comment.user.name">
	                     <p class="w3-text-blue" id="comment_userName">{{ comment.user.name}}</p>
	                    </a>
		                </div>
                    <div class="w-left" style="position: absolute;left:60px">
                      <span dir="auto">{{ moment(comment.created_at).fromNow() }} </span>
                    </div>
                    <div class="w3-clear">
                        <p dir="auto" class="w3-right-align user_text">{{ comment.content }}</p>
                    </div>
	                </div>
                  <br>
                  <div class="bg-white post_comment">
                    <form action="/social" method="post" @submit.prevent>
                      <validation-provider rules="required|min:3|max:150" v-slot="{ errors }">
                        <textarea dir="auto" class="form-control w3-right-align w3-margin-bottom" placeholder="اترك تعليقك في اقل من 150 حرف" :name="comment" v-model="comment" id="comment"></textarea>
                        <span v-show="errors[0]" :class="{'form-control': true, 'alert-danger w3-margin-bottom text-right': errors[0] }">
                          {{ errors[0] }}
                        </span>
                       </validation-provider>
                       <input  type="submit" name="btn_comment" class='btn custom-blue-bg w3-card w3-right w3-margin-bottom' value="نشر " @click="post_comment( status.id, status.user_id )">
                    </form>
                  </div>
  	            </div>
                <br>
	             </div>

	        </div>
	      </div>

</template>

<script>

	var moment = require('moment');

	export default {
		props: {
			statuses: {
				type: Array,
				required: true
			},
            likes: {
                type: Number,
            }
        },
		data() {
			return {
				moment: moment,
				likes: '',
				comment: '',
				csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
			}
		},
		methods: {
			pushComment(comment,status_id){
				var comment_div = document.getElementById('commentfor-'+status_id);
				var commentText = document.getElementById('comment');

			    let newComment = document.createElement('div');
			    newComment.classList.add('comment');
			    newComment.innerHTML = `
              <div class="w3-light-grey w3-margin-bottom w3-card w3-padding">
			    	    <div class="w3-right">
		              <img src="${comment.user.image}" class="w3-circle" height="55" width="55" alt="${comment.user.username}">
		              <p class="w3-text-blue" id="comment_userName"> <a href="/profile/${comment.user.username}">${comment.user.name}</a></p>
		            </div>
                <div class="w-left" style="position: absolute;left:60px">
                  <span style="font-size: 14px" dir="auto"> 1 min ago </span>
                </div>
                <div class="w3-clear">
                    <p dir="auto" class="w3-right-align user_text">${comment.content}</p>
                </div>
              </div>`;
			    comment_div.parentElement.appendChild(newComment);
			    commentText.value = '';
			},
			post_comment(status_id,user_id){
				axios.post('/status/'+status_id+'/comment',{
					content: this.comment,
					status_id: status_id,
					user_id: user_id,
					_token: this.csrf
				}).then((response) => {
					this.pushComment(response.data,status_id);
				});
			},
			like(status_id){
				axios.get('/status/' + status_id + '/like',{

				}).then((response) => {
					this.likes = response.data;
					if(response.data > 0){
						document.getElementById('likes-' + status_id ).innerHTML = response.data + ' Likes';
					}
				});
			},
			comment_section(statusId){
		      var commentSection = document.getElementById("commentfor-" + statusId);
		      if (commentSection.style.display === 'block') {
		          commentSection.style.display = 'none';
		      } else {
		          commentSection.style.display = 'block';
		      }
		    }
		},
		mounted() {
		}

	}
</script>


<style>


</style>
