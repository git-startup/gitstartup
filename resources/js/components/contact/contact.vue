<template>

    <div class="col-md-5 text-right">
        <h2>تواصل معنا</h2>
        <p>ايي استفسار او تساؤل لا تتردد في التواصل معنا الان</p>
        <div id="success" class="alert alert-success" style="display: none;">تم ارسال الرسالة بنجاح</div>
        <form action="/feedback" method="post" @submit.prevent>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="phone" v-model="phone" v-validate="'required|min:10|max:15'" placeholder="رقم الهاتف" class="form-control text-right">
                    <span v-show="errors.has('phone')" :class="{'form-control': true, 'alert-danger': errors.has('phone') }">
                      {{ errors.first('phone') }}
                    </span>
                </div>
                <div class="col-md-6">
                    <input type="text" name="fullname" v-model="fullname" v-validate="'required|min:3|max:20'" placeholder="الاسم كاملا" class="form-control text-right">
                    <span v-show="errors.has('fullname')" :class="{'form-control': true, 'alert-danger': errors.has('fullname') }">
                      {{ errors.first('fullname') }}
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <textarea name="message" v-model="message" v-validate="'required'" placeholder="الرسالة" class="form-control text-right" rows="8"></textarea>
                    <span v-show="errors.has('message')" :class="{'form-control': true, 'alert-danger': errors.has('message') }">
                      {{ errors.first('message') }}
                    </span>
                </div>
            </div>
            <div class="">
                <input type="hidden" name="_token" :value="csrf">
                <button type="submit" name="send" @click="send_feedback" class="w3-button custom-blue-bg w3-card w3-text-white w3-opacity w3-opacity w3-round-max">ارسال الرسالة</button>
            </div>
        </form>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                fullname:  '',
                phone:     '',
                message:   '',
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        methods: {
            send_feedback(){
                this.$validator.validateAll().then( () => {
                    axios.post('/feedback',{
                        fullname: this.fullname,
                        phone: this.phone,
                        message: this.message
                    }).then((response) => {
                        document.getElementById('success').style.display="block";
                    });
                });
            }
        }
    }
</script>


<style>

</style>
