<template>
	<div>
		<button type="submit" :id="`accept_btn_${work_id}`" class="btn btn-success w3-round" style="padding: 7px 15px">
			<i class="fa fa-check w3-margin-left-8"></i> موافقة
		</button>
		<button :id="`reject_btn_${work_id}`" @click="reject_request()" type="button"  class="btn btn-danger w3-round" style="padding: 7px 15px;">
			<i class="fa fa-close"></i> رفض
		</button> 
		</form>
	</div>
</template>

<script>
	export default{
		props: {
			work_id : {
				required: true,
			},
			user_id: {
				required: true,
			}
		},
		data(){
			return {

			}
		},
		methods: {
			accept_request(){
				axios.post('/workers/accept',{
					work_id: this.work_id,
					user_id: this.user_id,
					_token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
				}).then((response) => {
					document.getElementById('accept_btn_' + this.work_id).innerHTML = 'تم قبول الطلب';
					document.getElementById('accept_btn_' + this.work_id).style.backgroundColor = 'green';
					document.getElementById('reject_btn_' + this.work_id).style.display = 'none';

					var counter = parseInt(document.getElementById('work_notifi').innerText);
	                document.getElementById('work_notifi').innerHTML = counter - 1;
					setTimeout(function(){window.location.href="/workers"},800);
				});
			},
			reject_request(){
				axios.post('/workers/reject',{
					work_id: this.work_id,
					_token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
				}).then((response) => {
					document.getElementById('reject_btn_' + this.work_id).innerHTML = ' تم رفض الطلب  ';
					document.getElementById('accept_btn_' + this.work_id).style.display = 'none';

					var counter = parseInt(document.getElementById('work_notifi').innerText);
	                document.getElementById('work_notifi').innerHTML = counter - 1;
					setTimeout(function(){window.location.href="/workers"},800);
				});
			}
		}
	}
</script>
