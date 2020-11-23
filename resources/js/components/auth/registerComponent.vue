<template>
		<div class="w3-margin-top row" dir="rtl">
			<div class="form-group  col-md-12 text-right">
					<validation-provider name="name" rules="required|max:25|string" v-slot="{ errors }">
						<input class="form-control text-right"  placeholder="الاسم" type="text" name="name"  v-model="name">
						<span v-show="errors[0]" :class="{'form-control': true, 'alert-danger alert-margin-top text-right': errors[0] }">
							{{ errors[0] }}
						</span>
					</validation-provider>
				</div>

				<div class="form-group  col-md-12 text-right">
						<validation-provider name="username" rules="required|max:25|string" v-slot="{ errors }">
							<input class="form-control text-right" @mousedown="check_if_unique()" @change="check_if_unique()"  placeholder="اسم الاستخدام" type="text" name="username"  v-model="username">
							<span v-show="errors[0]" :class="{'form-control': true, 'alert-danger alert-margin-top text-right': errors[0] }">
								{{ errors[0] }}
							</span>
							<span v-hide="errors[0]" class="form-control alert-danger alert-margin-top text-right" style="display: none" id="username_error"></span>
						</validation-provider>
					</div>

				<div class="form-group col-md-12 text-right">
						<validation-provider name="email" rules="required|max:25|email" v-slot="{ errors }">
	            <input class="form-control text-right"  placeholder="البريد اللكتروني" type="email" name="email"  v-model="email">
							<span v-show="errors[0]" :class="{'form-control': true, 'alert-danger alert-margin-top text-right': errors[0] }">
								{{ errors[0] }}
							</span>
						</validation-provider>
          </div>

					<div class="form-group col-md-12 text-right">
							<validation-provider name="phone" rules="required|max:15" v-slot="{ errors }">
		            <input class="form-control text-right"  placeholder="رقم الهاتف" type="text" name="phone"  v-model="phone">
								<span v-show="errors[0]" :class="{'form-control': true, 'alert-danger alert-margin-top text-right': errors[0] }">
									{{ errors[0] }}
								</span>
							</validation-provider>
	          </div>

          <div class="form-group col-md-12 text-right">
						<validation-provider name="password" rules="required" v-slot="{ errors }">
	            <input class="form-control text-right"  placeholder="كلمة المرور" type="password" id="password"  name="password" v-model="password">
							<span v-show="errors[0]" :class="{'form-control': true, 'alert-danger alert-margin-top text-right': errors[0] }">
								{{ errors[0] }}
							</span>
						</Validation-Provider>
          </div>

					<div class="form-group col-md-12 text-right">
						<validation-provider name="password_confirmation" rules="required" v-slot="{ errors }">
	            <input class="form-control text-right"  placeholder="اعد كتابة كلمة المرور" type="password" id="password_confirmation"  name="password_confirmation" v-model="password_confirmation">
							<span v-show="errors[0]" :class="{'form-control': true, 'alert-danger alert-margin-top text-right': errors[0] }">
								{{ errors[0] }}
							</span>
						</Validation-Provider>
          </div>

					<div class="form-group col-md-12 text-right">
						<validation-provider name="type" rules="required" v-slot="{ errors }">
							<label for="type"> نوع الحساب </label>
							<select id="type" class="form-control text-right" name="type" v-model="type">
								<option value="1">رائد اعمال</option>
								<option value="2">مبرمج / مطور</option>
							</select>
							<span v-show="errors[0]" :class="{'form-control': true, 'alert-danger alert-margin-top text-right': errors[0] }">
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
</template>


<script>
	import { ValidationProvider } from 'vee-validate';
	export default {
		components: {
				ValidationProvider
		},
		data(){
			return {
				model: 'User',
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
