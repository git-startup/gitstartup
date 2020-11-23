<template>
    <div>
        <div class="alert alert-info col-md-12 text-center" id="feedback_check" style="display: none;">
          <span>your feedback has been send</span>
        </div>
        <form action="" method="post" role="form" @submit.prevent class="contactForm">
          <div class="form-row">
          <div class="form-group col-md-6">
            <input type="email" class="form-control text-right" v-model="email" name="email" id="email" placeholder="الايميل" data-rule="email" data-msg="Please enter a valid email" />
            <div class="validation"></div>
          </div>
          <div class="form-group col-md-6">
            <input type="text" name="name" class="form-control text-right" v-model="name" id="name" placeholder="الاسم" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
            <div class="validation"></div>
          </div>
        </div>
        <div class="form-group">
          <input type="text" class="form-control text-right" v-model="subject" name="subject" id="subject" placeholder="الغرض" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
          <div class="validation"></div>
        </div>
        <div class="form-group">
          <textarea class="form-control text-right" v-model="message" id="message" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="الرسالة"></textarea>
          <div class="validation"></div>
        </div>
        <div class="text-center"><button type="submit" @click="send()">ارسال رسالة</button></div>
      </form>
    </div>
</template>

<script>
    export default {
        data() { 
            return {
                name:   '',
                email:   '',
                subject: '',
                message: '',
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content') 
            }
        }, 
        methods: {
            send(){
                axios.post("/feedback.send",{
                    name:       this.name,
                    email:      this.email,
                    content:    this.message,
                    subject:    this.subject,
                    csrf:       this.csrf
                }).then((response) => {
                    document.getElementById('email').value = '';
                    document.getElementById('name').value = '';
                    document.getElementById('subject').value = '';
                    document.getElementById('message').value = '';
                    document.getElementById('feedback_check').style.display = 'block';
                });
            }
        }
    }
</script>
