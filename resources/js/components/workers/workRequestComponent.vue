<template>
	<div id="agreement_model" class="w3-modal" style="display: none;">
			<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="">
				<span onclick="document.getElementById('agreement_model').style.display='none'" class="w3-btn w3-display-topleft"> <i class="fa fa-times"></i> </span>
					<div class="w3-margin-right" style="padding-top: 20px">
						<p class="custom-blue-color"> تعرف على اهمية وكيفية تحديد اتفاق العمل من <a class="w3-text-blue" target="_blank" href="/contract/guide"> هنا </a> </p>
					</div>
					<div class="w3-margin row">
							<div class="form-group col-md-6">
								<label for="work_title">اسم تعريفي للمشروع</label>
								<validation-provider name="work_title" rules="required|max:50" v-slot="{ errors }">
									<input type="text" placeholder="اكتب اسم توضيحي لمشروعك" id="work_title" name="work_title" v-model="work_title" class="form-control">
									<span v-show="errors[0]" :class="{'form-control': true, 'alert-danger text-right': errors[0] }">
										{{ errors[0] }}
									</span>
								</Validation-Provider>
							</div>
							<div class="form-group col-md-6">
								<label for="sallery"> تكلفة التطوير - بالدولار </label>
								<validation-provider name="sallery" rules="required" v-slot="{ errors }">
								  <input type="number" placeholder="اقل مبلغ 150 دولار" min="150" class="form-control w3-right-align" name="sallery" id="sallery">
							  </Validation-Provider>
							</div>
							<div class="form-group col-md-6">
								<label for="start_of_agreement"> بداية العمل  </label>
								<validation-provider name="start_of_agreement" rules="required" v-slot="{ errors }">
									<input id="start_of_agreement" type="date" class="form-control w3-right-align" name="start_of_agreement" >
								</Validation-Provider>
							</div>
							<div class="form-group col-md-6">
								<label for="end_of_agreement"> نهاية العمل  </label>
								<validation-provider name="end_of_agreement" rules="required" v-slot="{ errors }">
									<input id="end_of_agreement" type="date" class="form-control w3-right-align" name="end_of_agreement" >
								</Validation-Provider>
							</div>
							<div class="form-group col-md-12">
								<label for="agreement">اكتب اتفاق العمل بالتفصيل </label>
								<validation-provider name="agreement" rules="required|string" v-slot="{ errors }">
									<textarea placeholder="قم بكتابة اتفاق العمل بالتفصيل " id="agreement" name="agreement" class="form-control" v-model="agreement" rows="8" cols="80"></textarea>
									<span v-show="errors[0]" :class="{'form-control': true, 'alert-danger text-right': errors[0] }">
										{{ errors[0] }}
									</span>
								</Validation-Provider>
							</div>
					</div>

					<footer class="w3-container" dir="rtl" style="margin-right: 15px">
							<div class="w3-margin-bottom w3-right">
									<button tabindex="1" title="ارسال" type="submit" id="send_request_btn"  value="ارسال الطلب" class="w3-button w3-card custom-blue-bg" style="padding: 5px 15px">
											<i class="fa fa-send w3-margin-left-8"></i> <span>ارسال </span></span></button>
									<span tabindex="2" title="إلغاء" onclick="document.getElementById('agreement_model').style.display='none'"  class="w3-button w3-card custom-blue-bg" style="padding: 5px 15px;">
											<i class="fa fa-times w3-margin-left-8"></i><span>إلغاء</span></span></button>
							</div>
					</footer>
				</form>

			</div>
	</div>
</template>

<script>
import { ValidationProvider } from 'vee-validate';
// to import datepicker component
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';
// to import slider component
import VueSlider from 'vue-slider-component';
import 'vue-slider-component/theme/antd.css';

	export default{
		components: {
				ValidationProvider,
				DatePicker,
				VueSlider
		},
		props: {
			user : {
				type: Object,
				required: true,
			},
			settings: {
				type: Object,
				required: true
			}
		},
		data(){
			return {
				work_title: '',
				agreement: '',
				range: [],
				sallery: 0,
			}
		},
		mounted() {
            Echo.private(`work-request.${this.user.id}`)
                .listen('workNotification', (e) => {
                    this.hasRequest(e.user);
                });
        },
		methods: {

			hasRequest(user){
				var counter = parseInt(document.getElementById('work_notifi').innerText);
                document.getElementById('work_notifi').innerHTML = counter + 1;
			}
		}
	}
</script>
