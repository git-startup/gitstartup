<template>
		<div>
				<div class="form-group text-right">
            <label for="email">عنوان البريد الالكتروني</label>
						<validation-provider name="email" rules="required|max:25|email" v-slot="{ errors }">
	            <input class="form-control text-right"  placeholder="البريد اللكتروني" type="email" name="email"  v-model="email">
							<span v-show="errors[0]" :class="{'form-control': true, 'alert-danger text-right': errors[0] }">
								{{ errors[0] }}
							</span>
						</validation-provider>
          </div>

          <div class="form-group text-right">
            <label for="password">كلمة المرور</label>
						<validation-provider name="password" rules="required|min:6" v-slot="{ errors }">
	            <input class="form-control text-right"  placeholder="كلمة المرور" type="password" id="password"  name="password" v-model="password">
							<span v-show="errors[0]" :class="{'form-control': true, 'alert-danger text-right': errors[0] }">
								{{ errors[0] }}
							</span>
						</Validation-Provider>
          </div>
    </div>
</template>


<script>
	import { ValidationProvider } from 'vee-validate';
	export default {
		components: {
				ValidationProvider
		},
	}
</script>


<style>


</style>
