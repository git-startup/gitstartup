<template>
		<div class="w3-white w3-padding w3-round w3-card" style="padding-top: 30px!important">
			<div class="row">
				<div class="form-group col-md-6 text-right">
						<validation-provider name="name" rules="required|min:3|max:25|string" v-slot="{ errors }">
							<input class="form-control text-right"  placeholder="الاسم" type="text" name="name"  v-model="name">
							<span v-show="errors[0]" :class="{'form-control': true, 'alert-danger text-right': errors[0] }">
								{{ errors[0] }}
							</span>
						</validation-provider>
					</div>

					<div class="form-group  col-md-6 text-right">
							<validation-provider name="username" rules="required|min:3|max:25|string" v-slot="{ errors }">
								<input class="form-control text-right" @mousedown="check_if_unique()" @change="check_if_unique()"  placeholder="اسم الاستخدام" type="text" name="username"  v-model="username">
								<span v-show="errors[0]" :class="{'form-control': true, 'alert-danger text-right': errors[0] }">
									{{ errors[0] }}
								</span>
									<span v-hide="errors[0]" class="form-control alert-danger alert-margin-top text-right" style="display: none" id="username_error"></span>
							</validation-provider>
						</div>

					<div class="form-group col-md-6 text-right">
							<validation-provider name="email" rules="required|max:25|email" v-slot="{ errors }">
		            <input class="form-control text-right"  placeholder="البريد اللكتروني" type="email" name="email"  v-model="email">
								<span v-show="errors[0]" :class="{'form-control': true, 'alert-danger text-right': errors[0] }">
									{{ errors[0] }}
								</span>
							</validation-provider>
	          </div>

						<div class="form-group col-md-6 text-right">
							<validation-provider name="phone" rules="required|max:15|min:10" v-slot="{ errors }">
		            <input class="form-control text-right"  placeholder="رقم الهاتف" type="text" name="phone"  v-model="phone">
								<span v-show="errors[0]" :class="{'form-control': true, 'alert-danger text-right': errors[0] }">
									{{ errors[0] }}
								</span>
							</validation-provider>
	          </div>

	          <div class="form-group col-md-6 text-right">
							<validation-provider name="password" rules="required|min:6" v-slot="{ errors }">
		            <input class="form-control text-right"  placeholder="كلمة المرور" type="password" id="password"  name="password" v-model="password">
								<span v-show="errors[0]" :class="{'form-control': true, 'alert-danger text-right': errors[0] }">
									{{ errors[0] }}
								</span>
							</Validation-Provider>
	          </div>

						<div class="form-group col-md-6 text-right">
							<validation-provider name="password_confirmation" rules="required|min:6" v-slot="{ errors }">
		            <input class="form-control text-right"  placeholder="اعد كتابة كلمة المرور" type="password" id="password_confirmation"  name="password_confirmation" v-model="password_confirmation">
								<span v-show="errors[0]" :class="{'form-control': true, 'alert-danger text-right': errors[0] }">
									{{ errors[0] }}
								</span>
							</Validation-Provider>
	          </div>

						<div class="form-group col-md-12 text-right">
							<lable for="type" class="w3-text-grey"> نوع الحساب </lable>
							<validation-provider id="type" name="type" rules="required" v-slot="{ errors }">
								<select class="form-control text-right" name="type" v-model="type">
									<option value="1">رائد اعمال</option>
									<option value="2">مبرمج / مطور</option>
								</select>
								<span v-show="errors[0]" :class="{'form-control': true, 'alert-danger text-right': errors[0] }">
									{{ errors[0] }}
								</span>
							</Validation-Provider>
						</div>

						<div class="form-group col-md-12 text-right">
							<p class="gender">
									<label for="male" >ذكر</label>
									<input class="w3-border w3-right-align" type="radio" name="gender" id="male" value="male" checked>
									<label for="female">انثى</label>
									<input class="w3-border w3-right-align" type="radio" name="gender" id="female" value="female">
							</p>
					</div>

				</div>


				<div class="form-group">
					<button type="submit" class="btn custom-blue-bg w3-right w3-margin-bottom">انشاء حساب</button>
					<!--
					<p class="w3-right w3-margin"> بانشاء حساب فانت توافق على  <a class="w3-text-blue" href="/policy">سياسة الاستخدام</a> </p>
					-->
				</div>

				<div class="w3-clear"></div>
    </div>
</template>


<script>
	import { ValidationProvider } from 'vee-validate';
	export default {
		components: {
				ValidationProvider
		},
		data(){
			return {
				username: '',
				csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
			}
		},
		methods: {
			check_if_unique(){
				axios.post('/validate/unique/user',{
					_token: this.csrf,
					model: this.model,
					username: this.username
				}).then((response) => {
					console.log(response.data)
					if(response.data.success == 'false'){
						document.getElementById('username_error').style.display = 'block';
						document.getElementById('username_error').innerHTML = 'هذا الاسم محجوز مسبقا';
					}else{
						document.getElementById('username_error').style.display = 'none';
					}
				});
			}
		}
	}
</script>


<style>


</style>
